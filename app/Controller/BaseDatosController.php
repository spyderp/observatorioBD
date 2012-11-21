<?php
App::uses('AppController', 'Controller');
/**
 * BaseDatos Controller
 *
 * @property BaseDato $BaseDato
 */
class BaseDatosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BaseDato->recursive = 0;
		$this->set('baseDatos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->BaseDato->id = $id;
		if (!$this->BaseDato->exists()) {
			throw new NotFoundException(__('Invalid base dato'));
		}
		$this->set('baseDato', $this->BaseDato->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BaseDato->create();
			if ($this->BaseDato->save($this->request->data)) {
				$this->Session->setFlash(__('The base dato has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The base dato could not be saved. Please, try again.'));
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
		$this->BaseDato->id = $id;
		if (!$this->BaseDato->exists()) {
			throw new NotFoundException(__('Invalid base dato'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BaseDato->save($this->request->data)) {
				$this->Session->setFlash(__('The base dato has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The base dato could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BaseDato->read(null, $id);
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
		$this->BaseDato->id = $id;
		if (!$this->BaseDato->exists()) {
			throw new NotFoundException(__('Invalid base dato'));
		}
		if ($this->BaseDato->delete()) {
			$this->Session->setFlash(__('Base dato deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Base dato was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
