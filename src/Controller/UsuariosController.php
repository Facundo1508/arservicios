<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;


/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[] paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{
    
    
     public function isAuthorized($user)
    {   
        if (isset($user['role']) && $user['role'] === 'usuario')
        {
            if(in_array($this->request->action, ['home','logout', 'servicio', 'user']))
            {
                return true;
            }
        } elseif (!isset($user['role'])) {
           if(in_array($this->request->action, ['registro', 'logout', 'login']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['logout', 'registro']);
    }
    
    public function registro()
    {
        $user = $this->Usuario->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Usuario->patchEntity($user, $this->request->getData());    
            $user->role = "usuario";
            if ($this->Usuario->save($user)) {
                $this->Flash->success(__('El usuario ha sido registrado correctamente. Está pendiente de activación.'));

                return $this->redirect(['action' => 'registro']);
            }
            $this->Flash->error(__('El usuario no pudo ser registrado. Intente nuevamente'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    public function login()
    {   
        if ($this->request->is('post')) {
            $usuario = $this->Auth->identify();
            if ($usuario && $usuario['activo']) {
                $this->Auth->setUser($usuario);
                return $this->redirect($this->Auth->redirectUrl());
            } elseif ($usuario && ($usuario['activo'] == false)) {
                $this->Flash->error(__('El Usuario aun no está activado.'));   
            } else {
                $this->Flash->error(__('Nombre de usuario o contraseña incorrectos'));
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
    
     /**
     * Activar method
     *
     * @return \Cake\Http\Response|void
     */
    public function activar($id = null)
    {
        $this->set('titulo', 'Activar Usuarios');

        if ($this->request->is('post') && isset($id)) {
            $usersTable = TableRegistry::get('Users');
            $user = $usersTable->get($id);
            $user->activo = 1;
            if ($usersTable->save($user)) {
                $this->Flash->success(__('El usuario ha sido activado correctamente.'));
            } else {
                $this->Flash->error(__('No se pudo activar el usuario.'));
            }
            return $this->redirect(['action' => 'activar']);
        }

        $this->paginate = ['finder' => 'desactivados'];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        //$this->set('_serialize', ['users']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rols', 'Generos']
        ];
        $usuarios = $this->paginate($this->Usuarios);

        $this->set(compact('usuarios'));
        $this->set('_serialize', ['usuarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Rols', 'Generos', 'Usuarioservicios']
        ]);

        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $rols = $this->Usuarios->Rols->find('list', ['limit' => 200]);
        $generos = $this->Usuarios->Generos->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'roles', 'generos'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $rols = $this->Usuarios->Rols->find('list', ['limit' => 200]);
        $generos = $this->Usuarios->Generos->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'roles', 'generos'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
