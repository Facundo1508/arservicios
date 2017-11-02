<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Calles Controller
 *
 * @property \App\Model\Table\CallesTable $Calles
 *
 * @method \App\Model\Entity\Calle[] paginate($object = null, array $settings = [])
 */
class CallesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $calles = $this->paginate($this->Calles);

        $this->set(compact('calles'));
        $this->set('_serialize', ['calles']);
    }

    /**
     * View method
     *
     * @param string|null $id Calle id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $calle = $this->Calles->get($id, [
            'contain' => ['Direccions']
        ]);

        $this->set('calle', $calle);
        $this->set('_serialize', ['calle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $calle = $this->Calles->newEntity();
        if ($this->request->is('post')) {
            $calle = $this->Calles->patchEntity($calle, $this->request->getData());
            if ($this->Calles->save($calle)) {
                $this->Flash->success(__('The calle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calle could not be saved. Please, try again.'));
        }
        $this->set(compact('calle'));
        $this->set('_serialize', ['calle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calle id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $calle = $this->Calles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $calle = $this->Calles->patchEntity($calle, $this->request->getData());
            if ($this->Calles->save($calle)) {
                $this->Flash->success(__('The calle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calle could not be saved. Please, try again.'));
        }
        $this->set(compact('calle'));
        $this->set('_serialize', ['calle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calle id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $calle = $this->Calles->get($id);
        if ($this->Calles->delete($calle)) {
            $this->Flash->success(__('The calle has been deleted.'));
        } else {
            $this->Flash->error(__('The calle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
