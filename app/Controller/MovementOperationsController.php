<?php

App::uses('AppController', 'Controller');

/**
 * MovementOperations Controller
 *
 * @property MovementOperation $MovementOperation
 * @property PaginatorComponent $Paginator
 */
class MovementOperationsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->MovementOperation->recursive = 0;
        $this->setFilter(array('MovementOperation.name'));
        $this->set('movementOperations', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->MovementOperation->exists($id)) {
            $this->Session->setFlash(__('Invalid movement operation'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('MovementOperation.' . $this->MovementOperation->primaryKey => $id));
        $movementOperation = $this->MovementOperation->find('first', $options);
        $this->set('movementOperation', $movementOperation);
        $this->Session->write('MovementOperation.ViewID', $id);
        $this->Session->write('MovementOperation.ViewName', $movementOperation['MovementOperation']['name']);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->MovementOperation->create();
            if ($this->MovementOperation->save($this->request->data)) {
                $this->Session->setFlash(__('The movement operation has been saved'), 'flash/success');
                $this->redirect(array('action' => 'view', $this->MovementOperation->id));
            } else {
                $this->Session->setFlash(__('The movement operation could not be saved. Please, try again.'), 'flash/error');
            }
        }
    }

    /**
     * addFromMovement method
     *
     * @return void
     */
    public function addFromMovement($movementId = null) {
        App::uses('Movement', 'model');
        $movement = new Movement();
        if ($movementId != null && !$movement->exists($movementId)) {
            $this->Session->setFlash(__('Invalid movement operation'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
            $this->MovementOperation->create();
            if ($this->MovementOperation->save($this->request->data)) {
                $this->Session->setFlash(__('The movement operation has been saved'), 'flash/success');
                if ($movementId != null) {
                    $this->redirect(array('controller' => 'movements', 'action' => 'edit', $movementId));
                } else {
                    $this->redirect(array('controller' => 'movements', 'action' => 'add'));
                }
            } else {
                $this->Session->setFlash(__('The movement operation could not be saved. Please, try again.'), 'flash/error');
            }
        }

        if (!$this->Session->check('Condo.Account.ViewID')) {
            $this->Session->setFlash(__('Invalid account'), 'flash/error');
            $this->redirect(array('controller'=>'accounts','action' => 'index'));
            
        }

        $breadcrumbs = array(
            array('link' => Router::url(array('controller' => 'pages', 'action' => 'index')), 'text' => __('Home'), 'active' => ''),
            array('link' => Router::url(array('controller' => 'condos', 'action' => 'index')), 'text' => __('Condos'), 'active' => ''),
            array('link' => Router::url(array('controller' => 'condos', 'action' => 'view', $this->Session->read('Condo.ViewID'))), 'text' => $this->Session->read('Condo.ViewName'), 'active' => ''),
            array('link' => Router::url(array('controller' => 'accounts', 'action' => 'index')), 'text' => __('Accounts'), 'active' => ''),
            array('link' => Router::url(array('controller' => 'accounts', 'action' => 'index', $this->Session->read('Condo.Account.ViewID'))), 'text' => $this->Session->read('Condo.Account.ViewName'), 'active' => ''),
            array('link' => Router::url(array('controller' => 'movements', 'action' => 'index')), 'text' => __('Movements'), 'active' => ''),
            array('link' => '', 'text' => __('Add Movement Operation'), 'active' => 'active')
        );
        $this->set(compact('breadcrumbs', 'movementId'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->MovementOperation->exists($id)) {
            $this->Session->setFlash(__('Invalid movement operation'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->MovementOperation->save($this->request->data)) {
                $this->Session->setFlash(__('The movement operation has been saved'), 'flash/success');
                $this->redirect(array('action' => 'view', $this->MovementOperation->id));
            } else {
                $this->Session->setFlash(__('The movement operation could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('MovementOperation.' . $this->MovementOperation->primaryKey => $id));
            $this->request->data = $this->MovementOperation->find('first', $options);
        }
        $this->Session->write('MovementOperation.ViewID', $id);
        $this->Session->write('MovementOperation.ViewName', $this->request->data['MovementOperation']['name']);
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->MovementOperation->id = $id;
        if (!$this->MovementOperation->exists()) {
            $this->Session->setFlash(__('Invalid movement operation'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->MovementOperation->delete()) {
            $this->Session->setFlash(__('Movement operation deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }

         $this->Session->setFlash(__('Movement operation can not be deleted'), 'flash/error');
        $this->redirect(array('action' => 'view',$id));
    }

    public function beforeRender() {
        if (isset($this->viewVars['breadcrumbs'])) {
            return;
        }
        $breadcrumbs = array(
            array('link' => Router::url(array('controller' => 'pages', 'action' => 'index')), 'text' => __('Home'), 'active' => ''),
            array('link' => '', 'text' => __('Movement Operations'), 'active' => 'active')
        );
        switch ($this->action) {
            case 'view':
                $breadcrumbs[1] = array('link' => Router::url(array('controller' => 'movement_operations', 'action' => 'index')), 'text' => __('Movement Operations'), 'active' => '');
                $breadcrumbs[2] = array('link' => '', 'text' => $this->Session->read('MovementOperation.ViewName'), 'active' => 'active');
                break;
            case 'edit':
                $breadcrumbs[1] = array('link' => Router::url(array('controller' => 'movement_operations', 'action' => 'index')), 'text' => __('Movement Operations'), 'active' => '');
                $breadcrumbs[2] = array('link' => '', 'text' => $this->Session->read('MovementOperation.ViewName'), 'active' => 'active');

                break;
        }
        $this->set(compact('breadcrumbs'));
//$this->Auth->allow('add'); // Letting users register themselves
    }

}