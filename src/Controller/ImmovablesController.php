<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Immovables Controller
 *
 * @property \App\Model\Table\ImmovablesTable $Immovables
 */
class ImmovablesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
//         $immovable = $this->Immovables->find('all');
//         debug ($immovable);
//         exit(); 
        ///////////
        $this->paginate = [
            'contain' => ['Users']
        ];
        //find the user's id
        $user = $this->Auth->user('id');
        //select immovables 
        $immo = $this->Immovables->find ('all', array ('conditions' => array ('Immovables.user_id' => $user)));

        $immovables = $this->paginate($immo);
        

        $this->set(compact('immovables'));
        $this->set('_serialize', ['immovables']);
    }

    /**
     * View method
     *
     * @param string|null $id Immovable id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
         
        ///////////
        $immovable = $this->Immovables->get($id, [
            'contain' => ['Users', 'Tenants', 'Rentals', 'Taxes']
        ]);

        $this->set('immovable', $immovable);
        $this->set('_serialize', ['immovable']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $immovable = $this->Immovables->newEntity();
        if ($this->request->is('post')) 
        {
            $immovable = $this->Immovables->patchEntity($immovable, $this->request->data);
            $immovable->user_id = $this->Auth->user('id');
            if ($this->Immovables->save($immovable)) 
            {
                $this->Flash->success(__('The immovable has been saved.'));

                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error(__('The immovable could not be saved. Please, try again.'));
            }
        }
        $users = $this->Immovables->Users->find('list', ['limit' => 200]);
        $tenants = $this->Immovables->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('immovable', 'users', 'tenants'));
        $this->set('_serialize', ['immovable']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Immovable id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $immovable = $this->Immovables->get($id, [
            'contain' => ['Tenants']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $immovable = $this->Immovables->patchEntity($immovable, $this->request->data);
            if ($this->Immovables->save($immovable)) {
                $this->Flash->success(__('The immovable has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The immovable could not be saved. Please, try again.'));
            }
        }
        $users = $this->Immovables->Users->find('list', ['limit' => 200]);
        $tenants = $this->Immovables->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('immovable', 'users', 'tenants'));
        $this->set('_serialize', ['immovable']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Immovable id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $immovable = $this->Immovables->get($id);
        if ($this->Immovables->delete($immovable)) {
            $this->Flash->success(__('The immovable has been deleted.'));
        } else {
            $this->Flash->error(__('The immovable could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
//     public function isAuthorized($user)
//     {
//         $action = $this->request->params['action'];
// 
//         
//         // Tout autre action nécessite un id.
//         if (empty($this->request->params['pass'][0])) 
//         {
//             return false;
//         }
// 
// //         // Vérifie que le bookmark appartient à l'utilisateur courant.
//         $id = $this->request->params['pass'][0];
//         $immovable = $this->Immovables->get($id);
//         
//         if ($immovable->user_id == $user['id']) 
//         {
//             return true;
//         }
//         
//         if (in_array($this->request->action, ['edit', 'delete', 'view', 'add'])) 
//         {
//                 $immovable = (int)$this->request->params['pass'][0];
//     
//                 if ($this->Immovables->isOwnedBy($immovable, $user['id'])) 
//                 {
//                     return true;
//                 }
//         }
//         return parent::isAuthorized($user);
//     }
    
    
    public function isAuthorized($user)
    {
        // Tous les utilisateurs enregistrés peuvent ajouter des articles
        if ($this->request->action === 'add') 
        {
            return true;
        }

        if (in_array($this->request->action, ['edit', 'delete', 'view'])) 
        {
            $immoId = (int)$this->request->params['pass'][0];
            $immovable = $this->Immovables->find('all');
                
            if ($this->Immovables->isOwnedBy($immovable['user_id'], $user['id'])) 
            {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }



}
