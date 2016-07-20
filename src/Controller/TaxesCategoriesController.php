<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TaxesCategories Controller
 *
 * @property \App\Model\Table\TaxesCategoriesTable $TaxesCategories
 */
class TaxesCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Taxes', 'Categories']
        ];
        $taxesCategories = $this->paginate($this->TaxesCategories);

        $this->set(compact('taxesCategories'));
        $this->set('_serialize', ['taxesCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Tax Categories id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taxCategories = $this->TaxesCategories->get($id, [
            'contain' => ['Taxes', 'Categories']
        ]);

        $this->set('taxCategories', $taxCategories);
        $this->set('_serialize', ['taxCategories']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taxCategories = $this->TaxesCategories->newEntity();
        if ($this->request->is('post')) {
            $taxCategories = $this->TaxesCategories->patchEntity($taxCategories, $this->request->data);
            if ($this->TaxesCategories->save($taxCategories)) {
                $this->Flash->success(__('The tax categories has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tax categories could not be saved. Please, try again.'));
            }
        }
        $taxes = $this->TaxesCategories->Taxes->find('list', ['limit' => 200]);
        $categories = $this->TaxesCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('taxCategories', 'taxes', 'categories'));
        $this->set('_serialize', ['taxCategories']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tax Categories id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $taxCategories = $this->TaxesCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taxCategories = $this->TaxesCategories->patchEntity($taxCategories, $this->request->data);
            if ($this->TaxesCategories->save($taxCategories)) {
                $this->Flash->success(__('The tax categories has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tax categories could not be saved. Please, try again.'));
            }
        }
        $taxes = $this->TaxesCategories->Taxes->find('list', ['limit' => 200]);
        $categories = $this->TaxesCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('taxCategories', 'taxes', 'categories'));
        $this->set('_serialize', ['taxCategories']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tax Categories id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taxCategories = $this->TaxesCategories->get($id);
        if ($this->TaxesCategories->delete($taxCategories)) {
            $this->Flash->success(__('The tax categories has been deleted.'));
        } else {
            $this->Flash->error(__('The tax categories could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
