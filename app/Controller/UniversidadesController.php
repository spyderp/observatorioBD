<?php
App::uses('AppController', 'Controller');
/**
 * Universidades Controller
 *
 * @property Universidad $Universidad
 */
class UniversidadesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Universidad->recursive = 0;
		$this->set('universidades', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Universidad->id = $id;
		if (!$this->Universidad->exists()) {
			throw new NotFoundException(__('Invalid universidad'));
		}
		$this->set('universidad', $this->Universidad->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Universidad->create();
			if ($this->Universidad->save($this->request->data)) {
				$this->Session->setFlash(__('The universidad has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The universidad could not be saved. Please, try again.'));
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
		$this->Universidad->id = $id;
		if (!$this->Universidad->exists()) {
			throw new NotFoundException(__('Invalid universidad'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Universidad->save($this->request->data)) {
				$this->Session->setFlash(__('The universidad has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The universidad could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Universidad->read(null, $id);
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
		$this->Universidad->id = $id;
		if (!$this->Universidad->exists()) {
			throw new NotFoundException(__('Invalid universidad'));
		}
		if ($this->Universidad->delete()) {
			$this->Session->setFlash(__('Universidad deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Universidad was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
