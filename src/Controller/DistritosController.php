<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Distritos Controller
 *
 * @property \App\Model\Table\DistritosTable $Distritos
 *
 * @method \App\Model\Entity\Distrito[] paginate($object = null, array $settings = [])
 */
class DistritosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $distritos = $this->paginate($this->Distritos);

        $this->set(compact('distritos'));
        $this->set('_serialize', ['distritos']);
    }

    /**
     * View method
     *
     * @param string|null $id Distrito id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $distrito = $this->Distritos->get($id, [
            'contain' => ['Direccions']
        ]);

        $this->set('distrito', $distrito);
        $this->set('_serialize', ['distrito']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $distrito = $this->Distritos->newEntity();
        if ($this->request->is('post')) {
            $distrito = $this->Distritos->patchEntity($distrito, $this->request->getData());
            if ($this->Distritos->save($distrito)) {
                $this->Flash->success(__('The distrito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The distrito could not be saved. Please, try again.'));
        }
        $this->set(compact('distrito'));
        $this->set('_serialize', ['distrito']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Distrito id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $distrito = $this->Distritos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $distrito = $this->Distritos->patchEntity($distrito, $this->request->getData());
            if ($this->Distritos->save($distrito)) {
                $this->Flash->success(__('The distrito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The distrito could not be saved. Please, try again.'));
        }
        $this->set(compact('distrito'));
        $this->set('_serialize', ['distrito']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Distrito id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $distrito = $this->Distritos->get($id);
        if ($this->Distritos->delete($distrito)) {
            $this->Flash->success(__('The distrito has been deleted.'));
        } else {
            $this->Flash->error(__('The distrito could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
