<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Network\Http\Client;
use Cake\Routing\Router;
use Cake\Log\Log;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property string $transaction_name
 * @property int $price
 * @property int $taxe
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Transaction extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    public function requestPaypal($price, $item_name, $custom) {

        //Create parameters for paypal post request.
        $parameter = [
            'METHOD' => 'BMCreateButton',
            'VERSION' => '204.0',
            'USER' => Configure::read('Paypal.USER'),
            'PWD' => Configure::read('Paypal.PWD'),
            'SIGNATURE' => Configure::read('Paypal.SIGNATURE'),
            'BUTTONCODE' => 'HOSTED',
            'BUTTONTYPE' => 'BUYNOW',
            'BUTTONSUBTYPE' => 'SERVICES',
            'L_BUTTONVAR0' => 'business=' . Configure::read('Paypal.email'),
            'L_BUTTONVAR1' => "item_name=$item_name",
            'L_BUTTONVAR2' => "amount=$price",
            'L_BUTTONVAR3' => 'currency_code=EUR',
            'L_BUTTONVAR4' => 'no_note=1',
            'L_BUTTONVAR5' => "notify_url=" . Router::url('/paypals/notify', true),
            'L_BUTTONVAR6' => 'return=' . Router::url('/paypals/success', true),
            'L_BUTTONVAR7' => 'cancel=' . Router::url('/paypals/cancel', true),
            'L_BUTTONVAR8' => "custom=$custom"
        ];


        // Send a POST request with application/x-www-form-urlencoded encoded data using cake http client
        $http = new Client();
        $address = "https://api-3t." . Configure::read('Paypal.sandbox') . "paypal.com/nvp";

        $response = $http->post($address, $parameter);

        if ($response->isOk()) {

            // Parse response in array
            parse_str($response->body, $array);

            //check from response if action request success
            if ($array['ACK'] === 'Success') {

                //return the url to paypal website from link provide by response
                return $array['EMAILLINK'];
            } else {
            Log::write(LOG_ERR, $array);
            return false;
            }
        } else {
            Log::write(LOG_ERR, $array);
            return false;
        }
    }

}
