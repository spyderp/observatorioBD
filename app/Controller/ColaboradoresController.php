<?php
App::uses('AppController', 'Controller');
/**
 * Colaboradores Controller
 *
 * @property Colaborador $Colaborador
 */
class ColaboradoresController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Colaborador->recursive = 0;
		$this->set('colaboradores', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Colaborador->id = $id;
		if (!$this->Colaborador->exists()) {
			throw new NotFoundException(__('Invalid colaborador'));
		}
		$this->set('colaborador', $this->Colaborador->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Colaborador->create();
			if ($this->Colaborador->save($this->request->data)) {
				$this->Session->setFlash(__('The colaborador has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The colaborador could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->Colaborador->Empresa->find('list');
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
		$this->Colaborador->id = $id;
		if (!$this->Colaborador->exists()) {
			throw new NotFoundException(__('Invalid colaborador'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Colaborador->save($this->request->data)) {
				$this->Session->setFlash(__('The colaborador has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The colaborador could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Colaborador->read(null, $id);
		}
		$empresas = $this->Colaborador->Empresa->find('list');
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
		$this->Colaborador->id = $id;
		if (!$this->Colaborador->exists()) {
			throw new NotFoundException(__('Invalid colaborador'));
		}
		if ($this->Colaborador->delete()) {
			$this->Session->setFlash(__('Colaborador deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Colaborador was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
