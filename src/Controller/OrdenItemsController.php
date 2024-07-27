<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrdenItems Controller
 *
 * @property \App\Model\Table\OrdenItemsTable $OrdenItems
 *
 * @method \App\Model\Entity\OrdenItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdenItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articulos', 'OrdenPedidos'],
        ];
        $ordenItems = $this->paginate($this->OrdenItems);

        $this->set(compact('ordenItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Orden Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordenItem = $this->OrdenItems->get($id, [
            'contain' => ['Articulos', 'OrdenPedidos'],
        ]);

        $this->set('ordenItem', $ordenItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordenItem = $this->OrdenItems->newEntity();
        if ($this->request->is('post')) {
            $ordenItem = $this->OrdenItems->patchEntity($ordenItem, $this->request->getData());
            if ($this->OrdenItems->save($ordenItem)) {
                $this->Flash->success(__('The orden item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orden item could not be saved. Please, try again.'));
        }
        $articulos = $this->OrdenItems->Articulos->find('list', ['limit' => 200]);
        $ordenPedidos = $this->OrdenItems->OrdenPedidos->find('list', ['limit' => 200]);
        $this->set(compact('ordenItem', 'articulos', 'ordenPedidos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orden Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordenItem = $this->OrdenItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordenItem = $this->OrdenItems->patchEntity($ordenItem, $this->request->getData());
            if ($this->OrdenItems->save($ordenItem)) {
                $this->Flash->success(__('The orden item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orden item could not be saved. Please, try again.'));
        }
        $articulos = $this->OrdenItems->Articulos->find('list', ['limit' => 200]);
        $ordenPedidos = $this->OrdenItems->OrdenPedidos->find('list', ['limit' => 200]);
        $this->set(compact('ordenItem', 'articulos', 'ordenPedidos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orden Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordenItem = $this->OrdenItems->get($id);
        if ($this->OrdenItems->delete($ordenItem)) {
            $this->Flash->success(__('The orden item has been deleted.'));
        } else {
            $this->Flash->error(__('The orden item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
