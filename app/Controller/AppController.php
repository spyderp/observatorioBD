<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	const SUCCESS = 1;
  	const ERROR = 2;
  	const WARNING = 3;
  	const INFO = 4;	
	public $theme = 'Observatorio';
	public $helpers = array('Js' => array('Renamezero.Jquery'), 'Renamezero.Formato', 'Renamezero.FormExtend', 'Renamezero.Grid', 'Session', 'Renamezero.HtmlExtend');
	//Configuración de los componentes
	public $components = array( 'Auth' => array(
			'authorize' => 'Controller',
			'loginAction' => array(
				'controller' => 'Usuarios',
				'action' => 'login',
				'plugin' => 'usuarios',
				'admin' => false,
			),
			'authenticate' => array(
            'Form' => array(
				'userModel'=>'Usuario',
                'fields' => array('username' => 'email'),
				'scope'=>array('Usuario.activo'=>1)
            ))
		),/*'DebugKit.Toolbar',*/ 'RequestHandler', 'Session', 'Usuarios.Permission',);
		
		public function beforeFilter() {
		if (isset($this->Auth)) {
			$this->_inicializarAuth();
			$this->__initializeUser();
		}
		
		if($this->action!='login'){
		if (strstr($_SERVER["HTTP_USER_AGENT"], "MSIE")) {  
			$action = $this->Auth->logout();
			$this->Session->destroy();
			$this->redirect(array('controller'=>'usuarios','action' => 'login'));
		}
		}
	}
	public function isAuthorized() {
		if ($this->action == 'myAccount') {
			return true;
		}
		if (!$this->Permission->verifyPrivilege()) {
			$page = Inflector::underscore($this->name) . '/' .$this->action;
		    $this->log(sprintf(__('El usuario %s intentó entrar a la página %s sin permisos', true),
			            $this->Auth->user('nombre_usuario'), $page));
		    $this->_setMessage($this->Auth->authError, self::INFO);
			//$this->cakeError('permissionError', array(array('code' => '404', 'name' => 'Request Inválido', 'message' => 'Usted no tiene permisos para ver esta página')));
			$this->redirect($this->Auth->loginRedirect);
		}
		return true;
	}

	/**
	 * 
	 * Configuración inicial de usuarios autorizados
	 */
	private function _inicializarAuth() {
			$this->Auth->loginAction = array('plugin'=>'usuarios','controller' => 'usuarios', 'action' => 'login');;
			$this->Auth->loginRedirect = array('plugin'=>'usuarios', 'controller' => 'usuarios', 'action' => 'index');
			$this->Auth->logoutRedirect = array('plugin'=>'usuarios', 'controller' => 'usuarios', 'action' => 'logout');
			$this->Auth->loginError = __('Email / Contraseña inválido', true);
			$this->Auth->authError=__('Usted no esta autorizado para acceder ha esta sección', true);
			$this->Auth->autoRedirect = false;
			//Seteo el usuario
	}
	/**
	 * 
	 * Al acceder al sistema la configuración inicial
	 */
	private function __initializeUser() {
		if (is_string($this->Auth->user('rol_id'))) {	
			$this->set('rolesUsuario', explode(',', $this->Auth->user('rol_id')));
			$this->set('userExterno', $this->Auth->user('interno'));
		}else {
			$this->set('rolesUsuario', array());
		}
		//Nombre completo en la vista
		if (is_string($this->Auth->user('nombre_completo'))) {
			$this->set('nombreCompleto', $this->Auth->user('nombre_completo'));
		}else {
			$this->set('nombreCompleto', '');
		}
		if ($this->Auth) {
			$this->set('usuarioId', $this->Auth->user('id'));
		}
	}
	
		/**
	 * 
	 * Se recrea la función para enviar mensajes con tipo de opciones con Estilo Css predeterminados 
	 * @param String $message Mensaje que aparecera en pantalla
	 * @param Integer $type  Tipo de estilo para el mensaje
	 * @param Boolean $modeReturn Forma de impreón en pantalla, pedeterminado o por div
	 */
	protected function _setMessage($message, $type = self::SUCCESS) {
		$message = (string) $message;
		switch ($type) {
			case self::ERROR :
					$this->Session->setFlash( $message, 'default', array('class'=>'msgError message') );
			break;

			case self::WARNING :
				$this->Session->setFlash( $message, 'default', array('class'=>'warning message') );
				
			break;

			case self::INFO :
				$this->Session->setFlash( $message, 'default', array('class'=>'info message') );
			break;

			default :
				$this->Session->setFlash( $message, 'default', array('class'=>'success message') );
		}
	}
}
