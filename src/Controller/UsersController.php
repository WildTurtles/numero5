<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use App\Model\Entity\Transaction;
use Cake\Log\Log;

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
            Log::write(LOG_ERR, $this->request->data);

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

//        if (!$this->Auth->user('id')) {
//            throw new NotFoundException();
//        }


        if (!empty($this->request->data)) {

            $duration = $this->request->data()['duration'];
            if (Configure::read("Site.prices." . $duration)) {

                $uid = $this->Auth->User('id');
                $custom = "action=subscribe&uid=$uid&duration=$duration";

                $price = number_format(Configure::read("Site.prices." . $duration), 2);

                $item_name = __("Subscription for {0,plural, =1{1 month} other{# months} }  ", [$duration]);


                $transaction = new Transaction();
                $url = $transaction->requestPaypal($price, $item_name, $custom);
                if ($url) {
                    $this->redirect($url);
                } else {
                    $this->Flash->error('There is trouble with your request, please retry later.');
                    return $this->redirect(['action' => 'subscribe']);
                }
            } else {
                $this->Flash->error('There is trouble with your request, please retry later.');
                //return $this->redirect(['action' => 'subscribe']);
            }
            //return $this->redirect(['action' => 'subscribe']);
        }
    }

}
