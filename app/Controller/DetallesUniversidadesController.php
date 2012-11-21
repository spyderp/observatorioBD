<?php
App::uses('AppController', 'Controller');
/**
 * DetallesUniversidades Controller
 *
 * @property DetallesUniversidad $DetallesUniversidad
 */
class DetallesUniversidadesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DetallesUniversidad->recursive = 0;
		$this->set('detallesUniversidades', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->DetallesUniversidad->id = $id;
		if (!$this->DetallesUniversidad->exists()) {
			throw new NotFoundException(__('Invalid detalles universidad'));
		}
		$this->set('detallesUniversidad', $this->DetallesUniversidad->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DetallesUniversidad->create();
			if ($this->DetallesUniversidad->save($this->request->data)) {
				$this->Session->setFlash(__('The detalles universidad has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detalles universidad could not be saved. Please, try again.'));
			}
		}
		$universidades = $this->DetallesUniversidad->Universidad->find('list',array('fields'=>array('nombre')));
		$this->set(compact('universidades'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->DetallesUniversidad->id = $id;
		if (!$this->DetallesUniversidad->exists()) {
			throw new NotFoundException(__('Invalid detalles universidad'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DetallesUniversidad->save($this->request->data)) {
				$this->Session->setFlash(__('The detalles universidad has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detalles universidad could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->DetallesUniversidad->read(null, $id);
		}
		$universidades = $this->DetallesUniversidad->Universidad->find('list');
		$this->set(compact('universidades'));
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
		$this->DetallesUniversidad->id = $id;
		if (!$this->DetallesUniversidad->exists()) {
			throw new NotFoundException(__('Invalid detalles universidad'));
		}
		if ($this->DetallesUniversidad->delete()) {
			$this->Session->setFlash(__('Detalles universidad deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Detalles universidad was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
