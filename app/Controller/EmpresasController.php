<?php
App::uses('AppController', 'Controller');
/**
 * Empresas Controller
 *
 * @property Empresa $Empresa
 */
class EmpresasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Empresa->recursive = 0;
		$this->set('empresas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Empresa->id = $id;
		if (!$this->Empresa->exists()) {
			throw new NotFoundException(__('Invalid empresa'));
		}
		$this->set('empresa', $this->Empresa->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Empresa->create();
			if ($this->Empresa->save($this->request->data)) {
				$this->Session->setFlash(__('The empresa has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresa could not be saved. Please, try again.'));
			}
		}
		$aplicaciones = $this->Empresa->Aplicacion->find('list', array('fields'=>array('id', 'nombre'), 'order'=>array('nombre')));
		$baseDatos = $this->Empresa->BaseDato->find('list', array('fields'=>array('id', 'nombre'), 'order'=>array('nombre')));
		$lenguajes = $this->Empresa->Lenguaj->find('list', array('fields'=>array('id', 'nombre'), 'order'=>array('nombre')));
		$sistemaOperativos = $this->Empresa->SistemaOperativo->find('list', array('fields'=>array('id', 'nombre'), 'order'=>array('nombre')));
		$this->set(compact('aplicaciones', 'baseDatos', 'lenguajes', 'sistemaOperativos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Empresa->id = $id;
		if (!$this->Empresa->exists()) {
			throw new NotFoundException(__('Invalid empresa'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Empresa->save($this->request->data)) {
				$this->Session->setFlash(__('The empresa has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The empresa could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Empresa->read(null, $id);
		}
		$aplicaciones = $this->Empresa->Aplicacion->find('list', array('fields'=>array('id', 'nombre')));
		$baseDatos = $this->Empresa->BaseDato->find('list', array('fields'=>array('id', 'nombre')));
		$lenguajes = $this->Empresa->Lenguaje->find('list', array('fields'=>array('id', 'nombre')));
		$sistemaOperativos = $this->Empresa->SistemaOperativo->find('list', array('fields'=>array('id', 'nombre')));
		$this->set(compact('aplicaciones', 'baseDatos', 'lenguajes', 'sistemaOperativos'));
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
		$this->Empresa->id = $id;
		if (!$this->Empresa->exists()) {
			throw new NotFoundException(__('Invalid empresa'));
		}
		if ($this->Empresa->delete()) {
			$this->Session->setFlash(__('Empresa deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Empresa was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
