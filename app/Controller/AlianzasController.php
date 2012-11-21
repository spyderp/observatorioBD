<?php
App::uses('AppController', 'Controller');
/**
 * Alianzas Controller
 *
 * @property Alianza $Alianza
 */
class AlianzasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Alianza->recursive = 0;
		$this->set('alianzas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Alianza->id = $id;
		if (!$this->Alianza->exists()) {
			throw new NotFoundException(__('Invalid alianza'));
		}
		$this->set('alianza', $this->Alianza->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Alianza->create();
			if ($this->Alianza->save($this->request->data)) {
				$this->Session->setFlash(__('The alianza has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alianza could not be saved. Please, try again.'));
			}
		}
		$universidades = $this->Alianza->Universidad->find('list', array('fields'=>array('nombre')));
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
		$this->Alianza->id = $id;
		if (!$this->Alianza->exists()) {
			throw new NotFoundException(__('Invalid alianza'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Alianza->save($this->request->data)) {
				$this->Session->setFlash(__('The alianza has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alianza could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Alianza->read(null, $id);
		}
		$universidades = $this->Alianza->Universidad->find('list', array('fields'=>array('nombre')));
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
		$this->Alianza->id = $id;
		if (!$this->Alianza->exists()) {
			throw new NotFoundException(__('Invalid alianza'));
		}
		if ($this->Alianza->delete()) {
			$this->Session->setFlash(__('Alianza deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Alianza was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
