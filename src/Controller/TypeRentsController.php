<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypeRents Controller
 *
 * @property \App\Model\Table\TypeRentsTable $TypeRents
 */
class TypeRentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $typeRents = $this->paginate($this->TypeRents);

        $this->set(compact('typeRents'));
        $this->set('_serialize', ['typeRents']);
    }

    /**
     * View method
     *
     * @param string|null $id Type Rent id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typeRent = $this->TypeRents->get($id, [
            'contain' => []
        ]);

        $this->set('typeRent', $typeRent);
        $this->set('_serialize', ['typeRent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typeRent = $this->TypeRents->newEntity();
        if ($this->request->is('post')) {
            $typeRent = $this->TypeRents->patchEntity($typeRent, $this->request->data);
            if ($this->TypeRents->save($typeRent)) {
                $this->Flash->success(__('The type rent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The type rent could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('typeRent'));
        $this->set('_serialize', ['typeRent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Type Rent id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typeRent = $this->TypeRents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeRent = $this->TypeRents->patchEntity($typeRent, $this->request->data);
            if ($this->TypeRents->save($typeRent)) {
                $this->Flash->success(__('The type rent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The type rent could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('typeRent'));
        $this->set('_serialize', ['typeRent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Type Rent id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeRent = $this->TypeRents->get($id);
        if ($this->TypeRents->delete($typeRent)) {
            $this->Flash->success(__('The type rent has been deleted.'));
        } else {
            $this->Flash->error(__('The type rent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
