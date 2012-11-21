<?php
App::uses('AppController', 'Controller');
/**
 * Carreras Controller
 *
 * @property Carrera $Carrera
 */
class CarrerasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Carrera->recursive = 0;
		$this->set('carreras', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Carrera->id = $id;
		if (!$this->Carrera->exists()) {
			throw new NotFoundException(__('Invalid carrera'));
		}
		$this->set('carrera', $this->Carrera->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Carrera->create();
			if ($this->Carrera->save($this->request->data)) {
				$this->Session->setFlash(__('The carrera has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The carrera could not be saved. Please, try again.'));
			}
		}
		$universidades = $this->Carrera->Universidad->find('list',array('fields'=>array('nombre')));
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
		$this->Carrera->id = $id;
		if (!$this->Carrera->exists()) {
			throw new NotFoundException(__('Invalid carrera'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Carrera->save($this->request->data)) {
				$this->Session->setFlash(__('The carrera has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The carrera could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Carrera->read(null, $id);
		}
		$universidades = $this->Carrera->Universidad->find('list');
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
		$this->Carrera->id = $id;
		if (!$this->Carrera->exists()) {
			throw new NotFoundException(__('Invalid carrera'));
		}
		if ($this->Carrera->delete()) {
			$this->Session->setFlash(__('Carrera deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Carrera was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
