<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Routing\Router;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use App\Model\Entity\Transaction;
use App\Model\Entity\User;
use Cake\ORM\Table;

/**
 * Paypals Controller
 *
 * @property \App\Model\Table\PaypalsTable $Paypal
 */
class PaypalsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['notify']);
    }

    public function success() {
        //$this->Flash->success(__('The subsciption has been saved.'));
    }

    public function notify() {

        if ($this->request->is('post')) {
            Log::write(LOG_ERR, "=====================================");
            Log::write(LOG_ERR, "Request is post");


            $data = $this->request->data();


            Log::write(LOG_ERR, "Données envoyées");
            Log::write(LOG_ERR, $data);


            $email_account = Configure::read('Paypal.email');


            $req = 'cmd=_notify-validate';
            foreach ($_POST as $key => $value) {
                $value = urlencode(stripslashes($value));
                $req .= "&$key=$value";
            }

            Log::write(LOG_ERR, "Données récupérées sur la variable post");
            Log::write(LOG_ERR, $req);


            $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
            $header .= "Host: www." . Configure::read('Paypal.sandbox') . "paypal.com\r\n";
            $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
            $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
            $fp = fsockopen('ssl://www.' . Configure::Read(Configure::read('Paypal.sandbox')) . 'paypal.com', 443, $errno, $errstr, 30);

            $item_name = $data['item_name'];
            $item_number = $data['item_number'];
            $payment_status = $data['payment_status'];
            $payment_amount = $data['mc_gross'];
            $payment_tax = $data['tax'];
            $payment_witout_tax = $payment_amount - $payment_tax;
            $payment_amount = $data['mc_gross'];
            $payment_currency = $data['mc_currency'];
            $txn_id = $data['txn_id'];
            $receiver_email = $data['receiver_email'];
            $payer_email = $data['payer_email'];
            parse_str($data['custom'], $custom);
            Log::write(LOG_ERR, $custom);



            if (!$fp) {
                Log::write(LOG_ERR, "Socket non ouvert");
            } else {
                Log::write(LOG_ERR, "Socket ouvert");
                fputs($fp, $header . $req);
                while (!feof($fp)) {
                    $res = fgets($fp, 1024);
                    //if (strcmp($res, "VERIFIED") == 0) {
                    Log::write(LOG_ERR, "Action a clarifier verified");
                    // vérifier que payment_status a la valeur Completed
                    if ($payment_status == "Completed") {
                        Log::write(LOG_ERR, "Paiement completed");

                        if ($email_account == $receiver_email) {
                            Log::write(LOG_ERR, "Email correspondent");

                            if ($custom['action'] == 'subscribe') {
                                Log::write(LOG_ERR, "L'action est bien subscribe");
                                $duration = $custom['duration'];
                                $uid = $custom['uid'];
                                if ($payment_witout_tax == Configure::read("Site.prices.$duration")) {
                                    Log::write(LOG_ERR, "Le montant  correspond à un montant existant.");

                                    $this->loadModel('Users');
                                    $this->loadModel('Transactions');

                                    $transaction = new Transaction([
                                        'transaction_name' => $txn_id,
                                        'price' => $payment_amount,
                                        'taxe' => "$payment_tax",
                                        'user_id' => "$uid",
                                    ]);

                                    Log::write(LOG_ERR, "Transaction " . $transaction);

                                    $user = new User();
                                    $user = $this->Users->get($uid);


                                    Log::write(LOG_ERR, "Utilisateur " . $user);

                                    $time = new Time();

                                    if (!$user->subcribes()) {
                                        $time = Time::now();
                                    } else {
                                        $time = $user->get('end_subcription');
                                    }
                                    Log::write(LOG_ERR, "Date avant : " . $time);
                                    $time->i18nFormat('yyyy-MM-dd HH:mm:ss');
                                    Log::write(LOG_ERR, "Mois a ajouter : " . $duration);
                                    $time->addMonth($duration);
                                    Log::write(LOG_ERR, "Date après application de l'abo : " . $time);


                                    $user->set('end_subcription', $time);

                                    //Log::write(LOG_ERR, $this->request->data);

                                    if ($this->Users->save($user) && $this->Transactions->save($transaction)) {
                                           die();
                                    } else {
                                        $this->Flash->error(__('The user could not be saved. Please, try again.'));
                                    }
                                } else {
                                    Log::write(LOG_ERR, "Le montant ne correspond pas un montant existant.");
                                }
                            } else {
                                Log::write(LOG_ERR, "L'action n'est pas subscribe");
                            }
                        } else {
                            Log::write(LOG_ERR, "Email ne correspondent pas");
                        }
                    } else {
                        // Statut de paiement: Echec
                        Log::write(LOG_ERR, "Paiement invalid");
                    }
                    //exit();
                    //} else if (strcmp($res, "INVALID") == 0) {
                    // Transaction invalide
                    //Log::write(LOG_ERR, "Action a clarifier INVALID");
                    //}
                }


                fclose($fp);
            }
        }
    }

}
