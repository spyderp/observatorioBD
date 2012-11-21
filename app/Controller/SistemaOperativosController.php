<?php
App::uses('AppController', 'Controller');
/**
 * SistemaOperativos Controller
 *
 * @property SistemaOperativo $SistemaOperativo
 */
class SistemaOperativosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SistemaOperativo->recursive = 0;
		$this->set('sistemaOperativos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SistemaOperativo->id = $id;
		if (!$this->SistemaOperativo->exists()) {
			throw new NotFoundException(__('Invalid sistema operativo'));
		}
		$this->set('sistemaOperativo', $this->SistemaOperativo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SistemaOperativo->create();
			if ($this->SistemaOperativo->save($this->request->data)) {
				$this->Session->setFlash(__('The sistema operativo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sistema operativo could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->SistemaOperativo->Empresa->find('list');
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
		$this->SistemaOperativo->id = $id;
		if (!$this->SistemaOperativo->exists()) {
			throw new NotFoundException(__('Invalid sistema operativo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SistemaOperativo->save($this->request->data)) {
				$this->Session->setFlash(__('The sistema operativo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sistema operativo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SistemaOperativo->read(null, $id);
		}
		$empresas = $this->SistemaOperativo->Empresa->find('list');
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
		$this->SistemaOperativo->id = $id;
		if (!$this->SistemaOperativo->exists()) {
			throw new NotFoundException(__('Invalid sistema operativo'));
		}
		if ($this->SistemaOperativo->delete()) {
			$this->Session->setFlash(__('Sistema operativo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sistema operativo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
