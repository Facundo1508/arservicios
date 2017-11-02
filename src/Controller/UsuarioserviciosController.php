<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usuarioservicios Controller
 *
 * @property \App\Model\Table\UsuarioserviciosTable $Usuarioservicios
 *
 * @method \App\Model\Entity\Usuarioservicio[] paginate($object = null, array $settings = [])
 */
class UsuarioserviciosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios', 'Servicios']
        ];
        $usuarioservicios = $this->paginate($this->Usuarioservicios);

        $this->set(compact('usuarioservicios'));
        $this->set('_serialize', ['usuarioservicios']);
    }

    /**
     * View method
     *
     * @param string|null $id Usuarioservicio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuarioservicio = $this->Usuarioservicios->get($id, [
            'contain' => ['Usuarios', 'Servicios']
        ]);

        $this->set('usuarioservicio', $usuarioservicio);
        $this->set('_serialize', ['usuarioservicio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuarioservicio = $this->Usuarioservicios->newEntity();
        if ($this->request->is('post')) {
            $usuarioservicio = $this->Usuarioservicios->patchEntity($usuarioservicio, $this->request->getData());
            if ($this->Usuarioservicios->save($usuarioservicio)) {
                $this->Flash->success(__('The usuarioservicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarioservicio could not be saved. Please, try again.'));
        }
        $usuarios = $this->Usuarioservicios->Usuarios->find('list', ['limit' => 200]);
        $servicios = $this->Usuarioservicios->Servicios->find('list', ['limit' => 200]);
        $this->set(compact('usuarioservicio', 'usuarios', 'servicios'));
        $this->set('_serialize', ['usuarioservicio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuarioservicio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuarioservicio = $this->Usuarioservicios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuarioservicio = $this->Usuarioservicios->patchEntity($usuarioservicio, $this->request->getData());
            if ($this->Usuarioservicios->save($usuarioservicio)) {
                $this->Flash->success(__('The usuarioservicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarioservicio could not be saved. Please, try again.'));
        }
        $usuarios = $this->Usuarioservicios->Usuarios->find('list', ['limit' => 200]);
        $servicios = $this->Usuarioservicios->Servicios->find('list', ['limit' => 200]);
        $this->set(compact('usuarioservicio', 'usuarios', 'servicios'));
        $this->set('_serialize', ['usuarioservicio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuarioservicio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuarioservicio = $this->Usuarioservicios->get($id);
        if ($this->Usuarioservicios->delete($usuarioservicio)) {
            $this->Flash->success(__('The usuarioservicio has been deleted.'));
        } else {
            $this->Flash->error(__('The usuarioservicio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
