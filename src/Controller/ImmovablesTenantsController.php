<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ImmovablesTenants Controller
 *
 * @property \App\Model\Table\ImmovablesTenantsTable $ImmovablesTenants
 */
class ImmovablesTenantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Immovables', 'Tenants']
        ];
        $immovablesTenants = $this->paginate($this->ImmovablesTenants);

        $this->set(compact('immovablesTenants'));
        $this->set('_serialize', ['immovablesTenants']);
    }

    /**
     * View method
     *
     * @param string|null $id Immovables Tenant id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $immovablesTenant = $this->ImmovablesTenants->get($id, [
            'contain' => ['Immovables', 'Tenants']
        ]);

        $this->set('immovablesTenant', $immovablesTenant);
        $this->set('_serialize', ['immovablesTenant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $immovablesTenant = $this->ImmovablesTenants->newEntity();
        if ($this->request->is('post')) {
            $immovablesTenant = $this->ImmovablesTenants->patchEntity($immovablesTenant, $this->request->data);
            if ($this->ImmovablesTenants->save($immovablesTenant)) {
                $this->Flash->success(__('The immovables tenant has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The immovables tenant could not be saved. Please, try again.'));
            }
        }
        $immovables = $this->ImmovablesTenants->Immovables->find('list', ['limit' => 200]);
        $tenants = $this->ImmovablesTenants->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('immovablesTenant', 'immovables', 'tenants'));
        $this->set('_serialize', ['immovablesTenant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Immovables Tenant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $immovablesTenant = $this->ImmovablesTenants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $immovablesTenant = $this->ImmovablesTenants->patchEntity($immovablesTenant, $this->request->data);
            if ($this->ImmovablesTenants->save($immovablesTenant)) {
                $this->Flash->success(__('The immovables tenant has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The immovables tenant could not be saved. Please, try again.'));
            }
        }
        $immovables = $this->ImmovablesTenants->Immovables->find('list', ['limit' => 200]);
        $tenants = $this->ImmovablesTenants->Tenants->find('list', ['limit' => 200]);
        $this->set(compact('immovablesTenant', 'immovables', 'tenants'));
        $this->set('_serialize', ['immovablesTenant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Immovables Tenant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $immovablesTenant = $this->ImmovablesTenants->get($id);
        if ($this->ImmovablesTenants->delete($immovablesTenant)) {
            $this->Flash->success(__('The immovables tenant has been deleted.'));
        } else {
            $this->Flash->error(__('The immovables tenant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
