<?php

App::uses('Inflector', 'core');
class PermissionComponent extends Component {
	var $components = array('Auth', 'Session');
	var $Privilege;
	var $Controller;

	function initialize(&$controller, $settings = array()) {
		$this->Privilege = ClassRegistry::init('Privilege');
		$this->Controller = $controller;
	}
	function startup(&$controller) {
		$this->Privilege = ClassRegistry::init('Privilege');
		$this->Controller = $controller;
	}
	 
	/**
	 * 
	 * Verifica si el usuario tiene permiso para la ver la página 
	 * actual
	 */
	function verifyPrivilege() {
		
		switch ($this->Controller->action) {
			case 'login':
			case 'logout':
			case 'descargar':
				return true;
				break;
			default:
				// get minimum level
				$groups = explode(",", $this->Controller->Auth->user('rol_id'));
				$valid = $this->Privilege->find('first', array(
                  'conditions' => array(
                     'and' => array(
                        'controller' => Inflector::underscore($this->Controller->name),
                        'action' => $this->Controller->action,
                        'rol_id' =>$groups,
				)
				),
                  'fields' => array('Privilege.id'),
                  'limit' => 1,
                  'recursive' => -1
				));
				//var_dump($valid['Privilege'], $this->Controller->name, $this->Controller->action, $valid);
				//die;
				// check if they have access
				if (empty($valid['Privilege'])) return false;
				return true;
		}
	}
	function verifyPrivilegeForFunction($controller, $action) {
		switch ($this->Controller->action) {
			case 'login':
			case 'logout':
			case 'descargar':
				return true;
				break;
			default:
				// get minimum level
				$groups = explode(",", $this->Controller->Auth->user('rol_id'));
				$valid = $this->Privilege->find('first', array(
                  'conditions' => array(
                     'and' => array(
                        'controller' => $controller,
                        'action' => $action,
                        'rol_id' => $groups,
				)
				),
                  'fields' => array('Privilege.id'),
                  'limit' => 1,
                  'recursive' => -1
				));
				// check if they have access
				if (empty($valid['Privilege'])) return false;

				return true;
		}
	}
}