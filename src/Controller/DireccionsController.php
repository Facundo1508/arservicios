<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Direccions Controller
 *
 * @property \App\Model\Table\DireccionsTable $Direccions
 *
 * @method \App\Model\Entity\Direccion[] paginate($object = null, array $settings = [])
 */
class DireccionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Provincias', 'Departamentos', 'Distritos', 'Calles']
        ];
        $direccions = $this->paginate($this->Direccions);

        $this->set(compact('direccions'));
        $this->set('_serialize', ['direccions']);
    }

    /**
     * View method
     *
     * @param string|null $id Direccion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $direccion = $this->Direccions->get($id, [
            'contain' => ['Provincias', 'Departamentos', 'Distritos', 'Calles']
        ]);

        $this->set('direccion', $direccion);
        $this->set('_serialize', ['direccion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $direccion = $this->Direccions->newEntity();
        if ($this->request->is('post')) {
            $direccion = $this->Direccions->patchEntity($direccion, $this->request->getData());
            if ($this->Direccions->save($direccion)) {
                $this->Flash->success(__('The direccion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The direccion could not be saved. Please, try again.'));
        }
        $provincias = $this->Direccions->Provincias->find('list', ['limit' => 200]);
        $departamentos = $this->Direccions->Departamentos->find('list', ['limit' => 200]);
        $distritos = $this->Direccions->Distritos->find('list', ['limit' => 200]);
        $calles = $this->Direccions->Calles->find('list', ['limit' => 200]);
        $this->set(compact('direccion', 'provincias', 'departamentos', 'distritos', 'calles'));
        $this->set('_serialize', ['direccion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Direccion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $direccion = $this->Direccions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $direccion = $this->Direccions->patchEntity($direccion, $this->request->getData());
            if ($this->Direccions->save($direccion)) {
                $this->Flash->success(__('The direccion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The direccion could not be saved. Please, try again.'));
        }
        $provincias = $this->Direccions->Provincias->find('list', ['limit' => 200]);
        $departamentos = $this->Direccions->Departamentos->find('list', ['limit' => 200]);
        $distritos = $this->Direccions->Distritos->find('list', ['limit' => 200]);
        $calles = $this->Direccions->Calles->find('list', ['limit' => 200]);
        $this->set(compact('direccion', 'provincias', 'departamentos', 'distritos', 'calles'));
        $this->set('_serialize', ['direccion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Direccion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $direccion = $this->Direccions->get($id);
        if ($this->Direccions->delete($direccion)) {
            $this->Flash->success(__('The direccion has been deleted.'));
        } else {
            $this->Flash->error(__('The direccion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
