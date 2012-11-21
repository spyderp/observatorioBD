<?php
App::uses('AppController', 'Controller');
/**
 * Idiomas Controller
 *
 * @property Idioma $Idioma
 */
class IdiomasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Idioma->recursive = 0;
		$this->set('idiomas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Idioma->id = $id;
		if (!$this->Idioma->exists()) {
			throw new NotFoundException(__('Invalid idioma'));
		}
		$this->set('idioma', $this->Idioma->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Idioma->create();
			if ($this->Idioma->save($this->request->data)) {
				$this->Session->setFlash(__('The idioma has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The idioma could not be saved. Please, try again.'));
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
		$this->Idioma->id = $id;
		if (!$this->Idioma->exists()) {
			throw new NotFoundException(__('Invalid idioma'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Idioma->save($this->request->data)) {
				$this->Session->setFlash(__('The idioma has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The idioma could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Idioma->read(null, $id);
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
		$this->Idioma->id = $id;
		if (!$this->Idioma->exists()) {
			throw new NotFoundException(__('Invalid idioma'));
		}
		if ($this->Idioma->delete()) {
			$this->Session->setFlash(__('Idioma deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Idioma was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
