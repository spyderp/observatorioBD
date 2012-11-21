<?php
App::uses('AppController', 'Controller');
/**
 * Aplicaciones Controller
 *
 * @property Aplicacion $Aplicacion
 */
class AplicacionesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Aplicacion->recursive = 0;
		$this->set('aplicaciones', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Aplicacion->id = $id;
		if (!$this->Aplicacion->exists()) {
			throw new NotFoundException(__('Invalid aplicacion'));
		}
		$this->set('aplicacion', $this->Aplicacion->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aplicacion->create();
			if ($this->Aplicacion->save($this->request->data)) {
				$this->Session->setFlash(__('The aplicacion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aplicacion could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Aplicacion->id = $id;
		if (!$this->Aplicacion->exists()) {
			throw new NotFoundException(__('Invalid aplicacion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aplicacion->save($this->request->data)) {
				$this->Session->setFlash(__('The aplicacion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aplicacion could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Aplicacion->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Aplicacion->id = $id;
		if (!$this->Aplicacion->exists()) {
			throw new NotFoundException(__('Invalid aplicacion'));
		}
		if ($this->Aplicacion->delete()) {
			$this->Session->setFlash(__('Aplicacion deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aplicacion was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
