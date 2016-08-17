<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Routing\Router;
use Cake\Log\Log;

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
        //return $this->redirect(['action' => 'success']);
    }

    public function notify() {


        if ($this->request->is('post')) {
            Log::write(LOG_ERR, $this->request->data);
        }


        $email_account = Configure::read('Paypal.email');
        Log::write(LOG_ERR, $email_account);
        Log::write(LOG_ERR, $_POST);


//        $req = 'cmd=_notify-validate';
//        foreach ($_POST as $key => $value) {
//            $value = urlencode(stripslashes($value));
//            $req .= "&$key=$value";
//        }
//        $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
//        $header .= "Host: www.". Configure::read('Paypal.sandbox').".paypal.com\r\n";
//        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
//        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
//        $fp = fsockopen('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
//        $item_name = $_POST['item_name'];
//        $item_number = $_POST['item_number'];
//        $payment_status = $_POST['payment_status'];
//        $payment_amount = $_POST['mc_gross'];
//        $payment_currency = $_POST['mc_currency'];
//        $txn_id = $_POST['txn_id'];
//        $receiver_email = $_POST['receiver_email'];
//        $payer_email = $_POST['payer_email'];
//        parse_str($_POST['custom'], $custom);



        die();

        if (!$fp) {
            
        } else {
            fputs($fp, $header . $req);
            while (!feof($fp)) {
                $res = fgets($fp, 1024);
                if (strcmp($res, "VERIFIED") == 0) {
                    // vérifier que payment_status a la valeur Completed
                    if ($payment_status == "Completed") {
                        if ($email_account == $receiver_email) {
                            /**
                             * C'EST LA QUE TOUT SE PASSE
                             * PS : tjrs penser à vérifier la somme !!
                             */
                            /**
                             * FIN CODE
                             */
                        }
                    } else {
                        // Statut de paiement: Echec
                    }
                    exit();
                } else if (strcmp($res, "INVALID") == 0) {
                    // Transaction invalide
                }
            }
            fclose($fp);
        }
    }

}
