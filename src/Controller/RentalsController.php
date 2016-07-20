<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rentals Controller
 *
 * @property \App\Model\Table\RentalsTable $Rentals
 */
class RentalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Immovables']
        ];
        $rentals = $this->paginate($this->Rentals);

        $this->set(compact('rentals'));
        $this->set('_serialize', ['rentals']);
    }

    /**
     * View method
     *
     * @param string|null $id Rental id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rental = $this->Rentals->get($id, [
            'contain' => ['Immovables', 'Rents']
        ]);

        $this->set('rental', $rental);
        $this->set('_serialize', ['rental']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rental = $this->Rentals->newEntity();
        if ($this->request->is('post')) {
            $rental = $this->Rentals->patchEntity($rental, $this->request->data);
            if ($this->Rentals->save($rental)) {
                $this->Flash->success(__('The rental has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rental could not be saved. Please, try again.'));
            }
        }
        $immovables = $this->Rentals->Immovables->find('list', ['limit' => 200]);
        $this->set(compact('rental', 'immovables'));
        $this->set('_serialize', ['rental']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rental id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rental = $this->Rentals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rental = $this->Rentals->patchEntity($rental, $this->request->data);
            if ($this->Rentals->save($rental)) {
                $this->Flash->success(__('The rental has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rental could not be saved. Please, try again.'));
            }
        }
        $immovables = $this->Rentals->Immovables->find('list', ['limit' => 200]);
        $this->set(compact('rental', 'immovables'));
        $this->set('_serialize', ['rental']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rental id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rental = $this->Rentals->get($id);
        if ($this->Rentals->delete($rental)) {
            $this->Flash->success(__('The rental has been deleted.'));
        } else {
            $this->Flash->error(__('The rental could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
