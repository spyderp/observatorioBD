<?php
App::uses('AppController', 'Controller');
/**
 * Titulos Controller
 *
 * @property Titulo $Titulo
 */
class TitulosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Titulo->recursive = 0;
		$this->set('titulos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Titulo->id = $id;
		if (!$this->Titulo->exists()) {
			throw new NotFoundException(__('Invalid titulo'));
		}
		$this->set('titulo', $this->Titulo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Titulo->create();
			if ($this->Titulo->save($this->request->data)) {
				$this->Session->setFlash(__('The titulo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The titulo could not be saved. Please, try again.'));
			}
		}
		$recursosHumanos = $this->Titulo->RecursosHumano->find('list');
		$carreras = $this->Titulo->Carrera->find('list', array('fields'=>array('nombre'), 'order'=>'nombre'));
		$this->set(compact('recursosHumanos', 'carreras'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Titulo->id = $id;
		if (!$this->Titulo->exists()) {
			throw new NotFoundException(__('Invalid titulo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Titulo->save($this->request->data)) {
				$this->Session->setFlash(__('The titulo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The titulo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Titulo->read(null, $id);
		}
		$recursosHumanos = $this->Titulo->RecursosHumano->find('list');
		$carreras = $this->Titulo->Carrera->find('list', array('fields'=>array('nombre'), 'order'=>'nombre'));
		$this->set(compact('recursosHumanos', 'carreras'));
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
		$this->Titulo->id = $id;
		if (!$this->Titulo->exists()) {
			throw new NotFoundException(__('Invalid titulo'));
		}
		if ($this->Titulo->delete()) {
			$this->Session->setFlash(__('Titulo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Titulo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
