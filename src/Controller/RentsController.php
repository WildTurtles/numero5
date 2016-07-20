<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rents Controller
 *
 * @property \App\Model\Table\RentsTable $Rents
 */
class RentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypeRents', 'Rentals']
        ];
        $rents = $this->paginate($this->Rents);

        $this->set(compact('rents'));
        $this->set('_serialize', ['rents']);
    }

    /**
     * View method
     *
     * @param string|null $id Rent id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rent = $this->Rents->get($id, [
            'contain' => ['TypeRents', 'Rentals']
        ]);

        $this->set('rent', $rent);
        $this->set('_serialize', ['rent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rent = $this->Rents->newEntity();
        if ($this->request->is('post')) {
            $rent = $this->Rents->patchEntity($rent, $this->request->data);
            if ($this->Rents->save($rent)) {
                $this->Flash->success(__('The rent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rent could not be saved. Please, try again.'));
            }
        }
        $typeRents = $this->Rents->TypeRents->find('list', ['limit' => 200]);
        $rentals = $this->Rents->Rentals->find('list', ['limit' => 200]);
        $this->set(compact('rent', 'typeRents', 'rentals'));
        $this->set('_serialize', ['rent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rent id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rent = $this->Rents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rent = $this->Rents->patchEntity($rent, $this->request->data);
            if ($this->Rents->save($rent)) {
                $this->Flash->success(__('The rent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rent could not be saved. Please, try again.'));
            }
        }
        $typeRents = $this->Rents->TypeRents->find('list', ['limit' => 200]);
        $rentals = $this->Rents->Rentals->find('list', ['limit' => 200]);
        $this->set(compact('rent', 'typeRents', 'rentals'));
        $this->set('_serialize', ['rent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rent id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rent = $this->Rents->get($id);
        if ($this->Rents->delete($rent)) {
            $this->Flash->success(__('The rent has been deleted.'));
        } else {
            $this->Flash->error(__('The rent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
