<?php
App::uses('AppController', 'Controller');
/**
 * Lenguajes Controller
 *
 * @property Lenguaj $Lenguaj
 */
class LenguajesController extends AppController {
	 public $paginate = array('order'=>array('Lenguaj.nombre'=>'ASC'));
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Lenguaj->recursive = 0;
		$this->set('lenguajes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Lenguaj->id = $id;
		if (!$this->Lenguaj->exists()) {
			throw new NotFoundException(__('Invalid lenguaj'));
		}
		$this->set('lenguaj', $this->Lenguaj->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Lenguaj->create();
			if ($this->Lenguaj->save($this->request->data)) {
				$this->Session->setFlash(__('The lenguaj has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lenguaj could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->Lenguaj->Empresa->find('list');
		$this->set(compact('empresas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Lenguaj->id = $id;
		if (!$this->Lenguaj->exists()) {
			throw new NotFoundException(__('Invalid lenguaj'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Lenguaj->save($this->request->data)) {
				$this->Session->setFlash(__('The lenguaj has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lenguaj could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Lenguaj->read(null, $id);
		}
		$empresas = $this->Lenguaj->Empresa->find('list');
		$this->set(compact('empresas'));
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
		$this->Lenguaj->id = $id;
		if (!$this->Lenguaj->exists()) {
			throw new NotFoundException(__('Invalid lenguaj'));
		}
		if ($this->Lenguaj->delete()) {
			$this->Session->setFlash(__('Lenguaj deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Lenguaj was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
