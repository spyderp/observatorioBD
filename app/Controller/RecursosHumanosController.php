<?php
App::uses('AppController', 'Controller');
/**
 * RecursosHumanos Controller
 *
 * @property RecursosHumano $RecursosHumano
 */
class RecursosHumanosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RecursosHumano->recursive = 0;
		$this->set('recursosHumanos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->RecursosHumano->id = $id;
		if (!$this->RecursosHumano->exists()) {
			throw new NotFoundException(__('Invalid recursos humano'));
		}
		$this->set('recursosHumano', $this->RecursosHumano->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RecursosHumano->create();
			if ($this->RecursosHumano->save($this->request->data)) {
				$this->Session->setFlash(__('The recursos humano has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recursos humano could not be saved. Please, try again.'));
			}
		}
		$idiomas = $this->RecursosHumano->Idioma->find('list', array('fields'=>array('nombre'), 'order'=>'nombre'));
		$this->set(compact('idiomas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->RecursosHumano->id = $id;
		if (!$this->RecursosHumano->exists()) {
			throw new NotFoundException(__('Invalid recursos humano'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RecursosHumano->save($this->request->data)) {
				$this->Session->setFlash(__('The recursos humano has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recursos humano could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RecursosHumano->read(null, $id);
		}
		$idiomas = $this->RecursosHumano->Idioma->find('list');
		$this->set(compact('idiomas'));
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
		$this->RecursosHumano->id = $id;
		if (!$this->RecursosHumano->exists()) {
			throw new NotFoundException(__('Invalid recursos humano'));
		}
		if ($this->RecursosHumano->delete()) {
			$this->Session->setFlash(__('Recursos humano deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recursos humano was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
