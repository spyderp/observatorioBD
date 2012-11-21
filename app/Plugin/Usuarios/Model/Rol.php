<?php
App::uses('AppModel', 'Model');
App::import('Core', 'SessionComponent');
App::import('Model', 'Usuarios.Usuario');
class Rol extends UsuariosAppModel {
	/**
	 * 
	 * Validación de campos
	 * @public array
	 */
	public $validate = array(
		'nombre' => array(
			'empty' => array(
				'rule' => 'notEmpty',
				'message'=>'Debe colocar un nombre al rol'
			),
			'alfanumeric' => array(
				'rule' => array('alphanumeric'),
				'message'=>'Ha colocado un nombre inválido'
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message'=>'Este rol ya existe'
			),
		),
	);
	/**
	 * 
	 * Asociaciones hasMany
	 * @public array
	 */
	public $hasMany = array(
		'Privilege' => array( 
        	 'className' => 'Privilege', 
             'foreignKey' => 'rol_id',
			 'dependent' => true,
         ),
	);
	/**
	 * 
	 * En los listados mostrar el nombre en ves el ID
	 * @public string
	 */
	public $displayField = 'nombre';
	/**
	 * 
	 * Arreglo con todos los parsers de los archivos xml que 
	 * contienen los privilegios. Estos pueden estar ubicados en 
	 * cada plugin.
	 * @public array
	 */
	protected $_parsers = null;
	/**
	 * 
	 * Todos los privilegios del sistema
	 * @public array
	 */
	protected $_privileges = null;
	/**
	 * 
	 * Privilegios asignados a un rol
	 * @public array
	 */
	protected $_rolPrivileges = null;
	/**
	 * 
	 * Decide si registra los parsers de los plugins
	 * @public boolean
	 */
	protected $_registerPlugins = true;
	/**
	 * 
	 * Indica si el usuario introdujo algun permiso para el rol
	 * @public boolean
	 */
	protected $_invalidPrivileges = false;
	
	/**
	 * 
	 * Son los roles que no pueden ser eliminados
	 * @public integer
	 */
	const STATIC_ROLES = 7;
	
	
	/**
	 * Verifica que no tenga ningún usuario asignado
	 * @see cake/libs/model/Model::beforeDelete()
	 */
    public function beforeDelete() {
	    $Usuario = ClassRegistry::init('Usuario');
	    $count = $Usuario->find('count', array(
	    	'conditions' => "(Usuario.rol_id REGEXP '^" . $this->id . "$'
				OR Usuario.roles_id REGEXP '^.*," . $this->id . ",.*$' 
				OR Usuario.roles_id REGEXP '^.*," . $this->id . "$' 
				OR Usuario.roles_id REGEXP '^" . $this->id . ",.*$')"));
	    if ($count == 0) {
	        return true;
	    }
	    //No puede eliminar roles estáticos de la aplicación
	    if ($this->id > self::STATIC_ROLES) {
	    	return true;
	    } 
	    return false;
	}
	
	/**
	 * 
	 * Coloca el valor de la validacion de privileges
	 * @return boolean
	 */
	public function getInvalidPrivileges() {
		return $this->_invalidPrivileges;
	}
	
	/**
	 * 
	 * Retorna el valor de validacion de privilegios
	 * @param $invalidPrivileges
	 * @return void
	 */
	public function setInvalidPrivileges($invalidPrivileges) {
		$this->_invalidPrivileges = (boolean) $invalidPrivileges;
	}
	
	/**
	 * 
	 * Registra un parser
	 * @param PrivilegeParser $parser Debe ser una clase de tipo PrivilegeParser
	 * @param string $key Nombre del parser
	 */
 	public function addParser($parser, $key) {
    	$this->_parsers[$key] = $parser;
    }
    
    /**
     * 
     * Elimina un parser del registro
     * @param $key Nombre del parser a eliminar
     * @throws PrivilegeParserNotFoundException en caso de que no encuentre el parser a eliminar
     */
    public function removeParser($key) {
    	if (!isset($this->_parsers[$key])) {
    		throw new PrivilegeParserNotFoundException(__("Parser con key {$key} no encontrado", true));
    	}
    	unset($this->_parsers[$key]);
    }
    
    public function cleanParsers() {
    	$this->_parsers = null;
    }
    
    /**
     * 
     * Retorna todos los parsers registrados. En caso de que no haya ningún
     * parser registrado y se tenga habilitado registrar parsers de plugins,
     * se procederá a agregar todos los privilegios que se hayan definido en los plugins.
     * @return array Arreglo con todos los objetos registrados de tipo PrivilegeParser
     */
    public function getParsers() {
    	if (empty($this->_parsers) && $this->_registerPlugins) {
    		$this->registerParsers();
    	}
     	return $this->_parsers;
    }
    
    /**
     * 
     * Retorna un parser específico dependiendo del nombre
     * @param string $key 
     * @throws PrivilegeParserNotFoundException
     */
    public function getParser($key) {
    	if (!isset($this->_parsers[$key])) {
    		throw new PrivilegeParserNotFoundException(__("Parser con key {$key} no encontrado", true));
    	}
    	return $this->_parsers[$key];
    }
    
    /**
     * 
     * Coloca si se quiere registrar los parsers de los plugins o no
     * @param boolean $register true para registrar los plugins, de lo contrario false
     */
    public function setRegisterPlugins($register) {
    	$this->_registerPlugins = $register;
    }
    
    /**
     * 
     * Retorna el estado de que si se van a registrar los privilegios 
     * de los plugins
     * @return boolean
     */
    public function getRegisterPlugins() {
    	return $this->_registerPlugins;
    }
    
    /**
     * 
     * Retorna un listado de roles
     * @return array
     */
	public function getList() {
    	return $this->find('list', array(
            'fields' => array('Rol.id', 'Rol.nombre'),
            'recursive' => -1
         ));
    }
    
    /**
     * 
     * Esta función se utiliza para validar los privilegios asignados
     * al grupo.
     * @return boolean Retorna true si colocó algún permiso.
     */
    public function beforeSave() {
    	if (!$this->validPrivileges()) {
    		$this->setInvalidPrivileges(true);
    		return false;
    	} 
    	$this->setInvalidPrivileges(false);
    	return true;
    }
    
    /**
     * 
     * Valida si se escogió algún privilegio para el rol 
     * que se va a guardar
     * @param $check
     */
    public function validPrivileges($check = null) {
    	$rolPrivileges = $this->_getRolPrivileges();
    	return !empty($rolPrivileges);
    }
    
    /**
     * 
     * Coloca los privilegios dependiendo de los parsers registrados.
     * @param $parsers
     * @return array
     */
    public function setPrivileges($parsers = null) {
    	if (is_null($parsers)) {
    		$parsers = $this->getParsers();
    	}
    	$this->_privileges = array();
    	if (is_array($parsers)) {
	    	foreach ($parsers as $parser) {
	    		$this->_privileges = array_merge($this->_privileges, $parser->toArray());
	    	}	
    	}else if (is_object($parsers)) {
    		$this->_privileges = $parsers->toArray();
    	}
    	return $this->getPrivileges();
    }
    
    /**
     * 
     * Retorna los privilegios de los parsers registrados.
     * @return array Arreglo con los privilegios del sistema.
     */
    public function getPrivileges() {
    	return $this->_privileges;
    }
    
    /**
     * 
     * Retorna todos los privilegios escogidos buscado en todos los parsers
     * registrados.
     * @param array $data
     * @param array $parsers 
     * 		Se pueden enviar parsers específicos si no se quieren utilizar
     * 		los definidos anteriormente o si no se ha registrado ningún parser									
     * @throws PrivilegeNotFoundException
     * @return array Retorna un arreglo que posteriormente se va a leer para obtener
     * 				 el action y el controller de dicho privilegio.		
     */
    public function getRolPrivileges($data = null, $parsers = null) {
    	$rolPrivilegesArray = array();
    	if (is_null($parsers)) {
    		$parsers = $this->getParsers();
    	}
    	foreach ($parsers as $parser) {
    		$rolPrivilegesArray = array_merge($rolPrivilegesArray, $parser->getPrivilegesById($this->_getRolPrivileges($data)));
    	}
    	if (empty($rolPrivilegesArray)) {
    		throw new PrivilegeNotFoundException(__('No se encontró ningún privilegio válido al guardar el rol', true));
    	}
    	return $rolPrivilegesArray;
    }
    
    public function resetRolPrivileges() {
    	$this->_rolPrivileges = null;
    }
    
    /**
     * 
     * Hace una búsqueda para obtener los privilegios que el usuario 
     * ha escogido para un rol específico.
     * @param array $data
     * @return array Array depurado con los privilegios escogidos.
     */
	private function _getRolPrivileges($data = null) {
    	if (is_null($data)) {
    		$data = $this->data;
    	}
		if (is_null($this->_rolPrivileges)) {
    		$this->_rolPrivileges = array_filter(self::extractPrivileges($data));	
    	}
    	return $this->_rolPrivileges;
    }
    
    public static function extractPrivileges($data) {
    	$privileges = array();
    	if (!is_array($data['Privilege'])) {
    		return $privileges;
    	}
    	foreach ($data['Privilege'] as $privilege) {
    		if ($privilege['group_id'] != '0' && trim($privilege['group_id']) != '') {
    			$privileges[] = $privilege['group_id'];
    		} 
    		
    	}
    	
    	return $privileges;
    }
    
	/**
     * 
     * Modifica la data tomando los privilegios introducidos por el usuario
     * y buscando su respectiva información en el archivo de configuración. 
     * @param array $data
     */
    protected function _modifyPrivilegesBeforeSave(&$data) {
    	//First delete previous permission
    	if (isset($data['Rol']['id'])) {
    		$this->query(sprintf("DELETE FROM {$this->Privilege->tablePrefix}privileges WHERE rol_id = %d", intval($data['Rol']['id'])));	
    	}
    	
    	try {
    		$rolPrivileges = $this->getRolPrivileges($data);
    		unset($data['Privilege']);
    		foreach ($rolPrivileges as $privilege) {
    			$data['Privilege'][] = array(
    				'controller' => strval($privilege->controller),
    				'action' => strval($privilege->action),
    				'privilege_id' => strval($privilege['id']),
    			);
    		}
    	}catch (PrivilegeNotExistException $e) {
			//TODO: log here CakeLog::write('debug', $e->getMessage());
    		return false;
    	}catch (PrivilegeNotFoundException $e) {
    		//TODO: log here CakeLog::write('debug', $e->getMessage());
    		return false;
    	}
    	
    	return true;
    }
    
	/**
     * La función saveAll tiene un bug al no tomar en cuenta cambios
     * realizados en la data por los callbacks beforeSave. Por consiguiente
     * se modificó para modificar la data explicitamente y después guardar
     * los registros. 
     * 
     * @see cake/libs/model/Model::saveAll()
     * @see https://trac.cakephp.org/ticket/6494
     */
	public function saveAll($data = null, $options = array()) {
    	$this->_modifyPrivilegesBeforeSave($data);
    	Cache::delete('PrivilegesCache');
    	return parent::saveAll($data, $options);
    }
    
    public function registerParsers() {
   		$plugins = new DirectoryIterator(APP . '/Plugin');
		foreach ($plugins as $plugin) {
			if ($plugin->isDir() && !$plugin->isDot()) {
				$path = APP . 'Plugin/' . $plugin->getBasename() . '/Config/privileges.xml';
				if (file_exists($path)) {
					$this->addParser(simplexml_load_file($path, 'PrivilegeParser'), $plugin->getBasename());
				}
			}
		}
		//cambio para ver datos de manera global
    	$path = APP . '/Config/privileges.xml';
				if (file_exists($path)) {
					$this->addParser(simplexml_load_file($path, 'PrivilegeParser'), $plugin->getBasename());
				}
		//Register the default parser
		if (file_exists(Configure::read('PrivilegesFile'))) {
			$this->addParser(simplexml_load_file(Configure::read('PrivilegesFile'), 'PrivilegeParser'), 'default');	
		}
    }
    
    public static function getPrivilegesByRol($rol_id = null, $reset = FALSE) {
        static $privileges;
        if (!$rol_id) {
            return array();
        }
        if ($reset) {
            $privileges = array();
            return;
        }
        //Memory Cache
        if (isset($privileges[$rol_id])) {
            return $privileges[$rol_id];
        }
        //Cache
        $Privilege = ClassRegistry::init('Privilege');
        $privilegesTmp = Cache::read('PrivilegesCache');
        if (isset($privilegesTmp[$rol_id])) {
            $privileges[$rol_id] = $privilegesTmp[$rol_id];
        }else {
            //Get privileges
            $privileges[$rol_id] = Set::classicExtract($Privilege->find('all', 
                    array('conditions' => array('Privilege.rol_id' => $rol_id),
                          'fields' => array('CONCAT(Privilege.controller, "/", Privilege.action) as ruta'),
                          'contain' => array())), '{n}.0.ruta');
            if (is_array($privilegesTmp)) {
            	$privileges += $privilegesTmp;   
            }
            Cache::write('PrivilegesCache', $privileges);
        }
        return $privileges[$rol_id];
    }

    public static function getPrivilegesByUser($roles) {
        static $allPrivileges;
        $id = md5(serialize($roles));
        if (isset($allPrivileges[$id])) {
            return $allPrivileges[$id];
        }
        if (is_string($roles)) {
            $roles = explode(',', $roles);
        }elseif (!is_array($roles)) {
            return array();
        }
        if (!isset($allPrivileges[$id])) $allPrivileges[$id] = array();
        foreach ($roles as $rol) {
            $tmp = Rol::getPrivilegesByRol($rol);
            if (!empty($tmp)) {
                $allPrivileges[$id] = array_merge($allPrivileges[$id], $tmp);
            }
        }
        $allPrivileges[$id] = array_unique($allPrivileges[$id]);
        return $allPrivileges[$id];
    }
    
    public static function getRolesByPrivilege($privilege) {
    	$_this = new Rol();
    	$roles = array_keys($_this->find('list'));
    	$rolesWithPrivilege = array();
    	foreach ($roles as $rol) {
    		if (Rol::hasPermission($privilege, (string) $rol)) {
    			$rolesWithPrivilege[] = $rol;
    		}
    	}
    	return $rolesWithPrivilege;
    }

    public static function hasPermission($privilege, $roles) {
        return (boolean) (in_array($privilege, Rol::getPrivilegesByUser($roles)));
    }
}

/**
 * 
 * Clase que trabaja como parser de los archivos de configuración
 * de privilegios.
 * @package Usuarios
 * @subpackage models
 *
 */
class PrivilegeParser extends SimpleXMLElement {
	/**
	 * 
	 * Guarda los privilegios del archivo
	 * @public array
	 */
	protected $_privileges = array();
	
	/**
	 * 
	 * Prepara un query xpath para traer los privilegios
	 * que el usuario ha escogido para el rol. 
	 * Utiliza el parámetro id para buscar todo los privilegios 
	 * con los diferentes que cumplan con los ids colocados. También
	 * se buscan todos los privilegios que tengan como padre un permiso
	 * escogido.
	 * @param array $privileges
	 * @return string Retorna una cadena que se puede colocar en un 
	 * 				  llamado a la función xpath de un objeto SimpleXMLElement
	 */
	protected function _prepareXpath($privileges) {
		if (empty($privileges)) { 
			return false;
		}
		$attributes = '';
		foreach ($privileges as $privilege) {
    		$attributes .= "@id='{$privilege}' or @parent='{$privilege}' or ";
    	}    	
    	$attributes = rtrim($attributes, ' or ');
    	return "/privileges/group/privilege[{$attributes}]";
	}
	
	/**
	 * 
	 * Retorna los privilegios buscados dependiendo del xpath
	 * que retorna el método _prepareXpath.
	 * @param array $privileges
	 * @return array Arreglo con los datos completos de los 
	 * 			     privilegios pasados por parámetros.
	 */
	public function getPrivilegesById($privileges) {
		$xpath = $this->_prepareXpath($privileges);
		if (!$xpath) {
			return array();
		}
		$privilegesResult = $this->xpath($xpath);
		return ($privilegesResult === false) ? array() : $privilegesResult;
	}
	
	/**
	 * 
	 * Tranforma los privilegios obtenidos del archivo xml a 
	 * formato array.
	 * @return array Arreglo con todos los privilegios definidos 
	 * 			     en el archivo xml.
	 */
	public function toArray($reset = false) {
		$privileges = array();
		foreach ($this->group as $group) {
			if (is_null($group['id'])) {
				continue;
			}
			$id = strval($group['id']);
    		$privileges[$id]['name'] = strval($group['name']);
    		foreach ($group->privilege as $privilege) {
    			//Ignore the parents privileges
    			if (isset($privilege['parent'])) continue;
    			$privileges[$id]['privileges'][] = array(
    				'id' => strval($privilege['id']),
    				'label' => strval($privilege['label']),
    			);
    		}
    		unset($id);
    	}
    	return $privileges;
	}
}

/**
 * @package Usuarios
 * @subpackage exceptions 
 * @author Danilo Domínguez
 *
 */
class PrivilegeNotFoundException extends Exception {}
/**
 * @package Usuarios
 * @subpackage exceptions 
 * @author Danilo Domínguez
 *
 */
class PrivilegeParserNotFoundException extends Exception {}