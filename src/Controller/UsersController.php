<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Network\Http\Client;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $users = $this->paginate($this->Users);
        
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
        
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Groups', 'Immovables']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set('user', $user);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Groups']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Username or password incorrect.');
        }
    }

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout', 'add']);
    }

    public function logout() {
        $this->Flash->success('You are offline.');
        return $this->redirect($this->Auth->logout());
    }

    public function subscribe() {

        $prices = Configure::read('Site.prices');
        $this->set('prices', $prices);

        if (!$this->Auth->user('id')) {
            throw new NotFoundException();
        }


        if (!empty($this->request->data)) {


            $duration = $this->request->data()['duration'];
            $uid = $this->Auth->User('id');




            if (Configure::read("Site.prices." . $duration)) {


                $custom = "action=subscribe&uid=$uid&duration=$duration";

                $price = number_format(Configure::read("Site.prices." . $duration), 2);

                $item_name = __("Subscription for {0,plural, =1{1 month} other{# mouths} }  ", [$duration]);

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
                    'L_BUTTONVAR0' => 'business=' . Configure::read('Paypal.mail'),
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
                    if($array['ACK']==='Success'){
                        
                        //redirect to paypal website from link provide by response
                        return $this->redirect($array['EMAILLINK']);
                        die();
                    }else {
                    $this->Flash->error('There is trouble with your request, please retry later.');
                    return $this->redirect(['action' => 'subscribe']);
                    }
                               
                    
                    
                } else {
                    $this->Flash->error('There is trouble with your request, please retry later.');
                    return $this->redirect(['action' => 'subscribe']);
                }
            }
//            } else {
//                $this->Flash->error('There is trouble with your request, please retry later.');
//                return $this->redirect(['action' => 'subscribe']);
//            }
            //return $this->redirect(['action' => 'subscribe']);
        }
    }
}
