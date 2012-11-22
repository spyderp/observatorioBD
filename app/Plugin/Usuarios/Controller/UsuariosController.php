<?php
App::uses('Usuario.UsuariosAppController', 'Controller');
App::uses('CakeLog', 'Core');
App::uses('Router', 'Core');
App::uses('Sanitize', 'Utility');
/**
 * 
 * Administración de usuarios usuarios internos, login y edición de cuenta de usuario.
 * @plugin Usuarios
 * @controller Usuario 
 * @author Ricardo Portillo
 *
 */
class UsuariosController extends UsuariosAppController {
	const ATTEMTS = 5;
	public $helpers=array('Renamezero.ReCaptcha');
	public $components = array('Renamezero.ReCaptcha');
	/**
  	 * Acciones que se permiten sin permiso
  	 *
   	 */
	function beforeFilter() {
   		//$this->Auth->allow('add','index');
   		parent::beforeFilter();
	}
	/**
	 * Listado de todos los usuarios Internos del sistema
	 * Este listado se obtiene paginado
	 */
	public function index() {
		$this->paginate = array(
   				 'Usuario' => array(
        					'contain' => array(),
        					'conditions'=>array('Usuario.rol_id<4'),
        					'joins'=>array(array(
									'table'=>'roles',
									'alias'=>'Rol',
									'type'=>'INNER',
									'conditions'=>array('Rol.id=Usuario.rol_id')
							)),
				'fields'=>array(' Usuario.id', 'Usuario.email', 
								'Rol.nombre', 'Usuario.activo'),
   				 )
		);
		$this->set('usuarios', $this->paginate('Usuario'));
	}
	
	
	/**
	 * Login de usuario. Se utiliza el componente Auth
	 * para autenticarse.
	 */
	public function login() {
		//$this->layout = 'login';

		//Titulo para la página del Login. Antes solo se mostraba "Usuarios"
		$this->set('title_for_layout', __('Acceso al sistema ::: Observatorio',true));

		$this->set('userAttempts', intval($this->Session->read('Auth.attempts')));
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				//Check if the captcha is ok
				//if ($this->_checkCaptcha()) {
					$this->Session->delete('Auth.attempts');
					$this->redirect($this->Auth->loginRedirect);
				//}
			}else if (!empty($this->request->data)) {
		    	$this->Session->write('Auth.attempts', intval($this->Session->read('Auth.attempts')) + 1);
		    	if (intval($this->Session->read('Auth.attempts')) >= self::ATTEMTS) {
		        //Enviar un error fatal solamente una vez.
		       		 $errorType = (intval($this->Session->read('Auth.attempts')) == self::ATTEMTS) ? 'fatal' : 'error';
		       		 $this->log(sprintf(__("Se alcanzó el número intento fallidos. Nombre de usuario: %s", true), 
		             $this->request->data['Usuario']['nombre_usuario']), $errorType);
		    	}else {
		        	$this->log(__("Intento de login fallido.", true), 'error');
		   	 	} 
		    	if ($this->referer() != Configure::read('AdminLogin')) {
		    		$this->_setMessage($this->Auth->loginError, self::ERROR);	
		    		$this->redirect($this->Auth->logoutRedirect);
		  		}
			}
		}
	}
	
	/**
	 * Cierra una sesion de usuario
	 */
	public function logout() {
		$action = $this->Auth->logout();
		//$this->Session->del($this->Auth->sessionKey);
		$this->Session->destroy();
		$this->redirect(array('action' => 'login'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			$this->request->data['Usuario']['fecha_creacion']=date('Y-m-d H:i:s');
			if ($this->Usuario->save($this->request->data)) {
				$this->_setMessage(__('Se ha creado un nuevo usuario'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se pudo guardar el nuevo usuario, intente nuevamente.'), self::ERROR);
			}
		}
		//Busco el Rol
		$this->loadModel('Rol');
		$this->set('roles', $this->Rol->find('list', array('fields'=>array('id', 'nombre'))));
		$this->set('rol_id', array());
	}
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param int $id
 * @return void
 */
	public function edit($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->_setMessage(__('Se han actualizado los datos del usuario'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se pudo actualizar los datos del usuario. Intente nuevamen.'),self::ERROR);
			}
		} else {
			$this->request->data = $this->Usuario->read(null, $id);
			//Busco los datos del usuario
			$this->request->data = $this->Usuario->read(null, $id);
			//Busco los Roles
			$this->loadModel('Rol');
			$this->set('roles', $this->Rol->find('list', array('fields'=>array('id', 'nombre'))));
			$this->set('rolId', $this->Auth->user('rol_id'));
			$rolId = (trim($this->request->data['Usuario']['rol_id']) == '') ? array() : explode(',', $this->request->data['Usuario']['rol_id']);
			$this->set('rol_id', $rolId);
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
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('Usuario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usuario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/*Enlista los datos del usuario*/
	public function ver($id = null) {

	}
	
	/**
	 * 
	 * Función que identifica la versión de IE
	 */
	private function ieversion() {
 		ereg('MSIE ([0-9]\.[0-9])',$_SERVER['HTTP_USER_AGENT'],$reg);
 		return (!isset($reg[1]))?-1:floatval($reg[1]);
	}
	
}
