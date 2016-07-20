<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tenants Controller
 *
 * @property \App\Model\Table\TenantsTable $Tenants
 */
class TenantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tenants = $this->paginate($this->Tenants);

        $this->set(compact('tenants'));
        $this->set('_serialize', ['tenants']);
    }

    /**
     * View method
     *
     * @param string|null $id Tenant id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tenant = $this->Tenants->get($id, [
            'contain' => ['Immovables']
        ]);

        $this->set('tenant', $tenant);
        $this->set('_serialize', ['tenant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tenant = $this->Tenants->newEntity();
        if ($this->request->is('post')) {
            $tenant = $this->Tenants->patchEntity($tenant, $this->request->data);
            if ($this->Tenants->save($tenant)) {
                $this->Flash->success(__('The tenant has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tenant could not be saved. Please, try again.'));
            }
        }
        $immovables = $this->Tenants->Immovables->find('list', ['limit' => 200]);
        $this->set(compact('tenant', 'immovables'));
        $this->set('_serialize', ['tenant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tenant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tenant = $this->Tenants->get($id, [
            'contain' => ['Immovables']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tenant = $this->Tenants->patchEntity($tenant, $this->request->data);
            if ($this->Tenants->save($tenant)) {
                $this->Flash->success(__('The tenant has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tenant could not be saved. Please, try again.'));
            }
        }
        $immovables = $this->Tenants->Immovables->find('list', ['limit' => 200]);
        $this->set(compact('tenant', 'immovables'));
        $this->set('_serialize', ['tenant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tenant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tenant = $this->Tenants->get($id);
        if ($this->Tenants->delete($tenant)) {
            $this->Flash->success(__('The tenant has been deleted.'));
        } else {
            $this->Flash->error(__('The tenant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
