<?php

/**
 * Usuario Model
 *
 */
App::uses('CakeEmail', 'Network/Email');
App::uses('AuthComponent', 'Controller/Component');
class Usuario extends UsuariosAppModel {
	public $actsAs = array('Containable');
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'El correo introducido no es correcto',
				'required' => TRUE,
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'El correo introducido ya existe',
				'required' => TRUE,
			),
		),
		'password' => array(
			'custom' => array(
				'rule' => 'mediumPassword',
				'message' => 'El password debe tener de 6 a 16 caracteres como minimo con una letra minuscula, una mayuscula y un número',
				'required' => true,
			),
		),
		'password_confirm' => array(
			'confirm' => array(
				'rule' => array('confirmPassword'),
				'message' => 'No coinciden las contraseñas',
			),
		),
		
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Taxi' => array(
			'className' => 'Taxi',
			'foreignKey' => 'usuario_id',
			'dependent' => false,
		),
		'Registro' => array(
			'className' => 'Registro',
			'foreignKey' => 'usuario_id',
			'dependent' => false,
		)
	);
	
    /**
     * (non-PHPdoc)
     * @see Model::beforeSave()
     */
    function beforeSave(){
        $valid = true;
   		 if (isset($this->data['Usuario']['id']) && $this->data['Usuario']['password_confirm'] == '') {
			unset($this->data['Usuario']['password']);
		}
     	if (isset($this->data[$this->alias]['password'])) {
        	$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    	}
    	$roles = array_filter(Set::extract('/Rol/id', $this->data));
		if (!empty($roles)) {
			$this->data['Usuario']['rol_id'] = implode(",", $roles);
		}elseif (isset($this->data['Rol'])) {
			$this->data['Usuario']['rol_id'] = '';
            $this->_invalidRol = true;
            return false;
		}
        return $valid;
    }

	private function _getRolCondition($rol) {
		return "(Usuario.roles_id REGEXP '^" . $rol . "$'
				OR Usuario.roles_id REGEXP '^.*," . $rol . ",.*$' 
				OR Usuario.roles_id REGEXP '^.*," . $rol . "$' 
				OR Usuario.roles_id REGEXP '^" . $rol . ",.*$')";
	}
	/**
	 * 
	 * Verificar si el password es lo suficiente seguro para no ser hackeado
	 * @param data $check
	 */
	public function mediumPassword($check) {
		//Check if the user is editing the password
		if (isset($this->data['Usuario']['id']) && $this->data['Usuario']['password_confirm'] == '') {
			return true;
		}
		$hasLetters = preg_match("/[a-zA-Z]/", $this->data['Usuario']['password_confirm']);
    	$hasNumbers = preg_match("/[0-9]/", $this->data['Usuario']['password_confirm']);
    	$hasCasing = preg_match("/[a-z]+.*[A-Z]+|[A-Z]+.*[a-z]/", $this->data['Usuario']['password_confirm']);
    	$hasCount=(strlen($this->data['Usuario']['password_confirm'])>5)? 1 : 0;
    	return ($hasLetters && $hasNumbers && $hasCasing && $hasCount);
	}
	/**
	 * 
	 * Verificar que el password y el password confirm coinciden.
	 * @param data $check
	 */
	public function confirmPassword($check) {
		//Check if the user is editing the password
		if (isset($this->data['Usuario']['id']) && $check['password_confirm']=='' ) {
			return true;
		}
		return ($check['password_confirm'] == $this->data['Usuario']['password']);
	} 
	/**
	 * 
	 * Se verifica que el password actual y enviado son lo mismo para poder cambiarlo por uno núevo
	 * @param data $check
	 */
	public function confirmOldPassword($check) {
		$oldpassword=$this->field('password', $check['id']);
		$passwordConfirm = AuthComponent::password($check['password_old']);
		return ($passwordConfirm == $oldpassword);
	} 
	
	/**
	 * Creación de nuevos clientes y envio de notificación
	 * @param array $data  variable donde estan el array de datos del formulario
	 */	
	public function registro($data){
		$dataSource = $this->getDataSource();
		$dataSource->begin();
		$tokken=$this->_generateKey();
		$data['Usuario']['rol_id']="4";
		if($this->save($data)):
			if(!$this->Registro->save(array('usuario_id'=>$this->id, 'token'=>$tokken))):
				$dataSource->rollback();
				return FALSE;
			endif;
			$email=array(
				'to'=>$data['Usuario']['email'],
				'subject'=>'INFOTAXI::Su registro ha sido realizado',
				'template'=>'registro',
				'data'=>array('tokken'=>$tokken),
			);
			//Se envia el correo al usuario creado del tema
			if(!$this->setEmail($email)):
				$dataSource->rollback();
				return FALSE;
			endif;
		else:
			$dataSource->rollback();
			return FALSE;
		endif;
		$dataSource->commit();
		return true;
			
	}
	public function activarCuenta($token){
		$dataSource = $this->getDataSource();
		$dataSource->begin();
		if($registro=$this->Registro->find('first',array('conditions'=>array('token'=>$token, 'activo'=>0), 'fields'=>array('id', 'usuario_id')))):
			$this->contain();
			$usuario=$this->find('first', array('conditions'=>array('id'=>$registro['Registro']['usuario_id']), 'fields'=>array('id', 'email', 'nombre_completo')));
			$fecha=date('Y-m-d H:i:s');
			$this->read(null, $usuario['Usuario']['id']);
			$this->set('activo',1);
			$data2['Registro']['id']=$registro['Registro']['id'];
			$data2['Registro']['activo']=1;
			$data2['Registro']['fecha_activacion']=$fecha;	
			if($this->save() && $this->Registro->save($data2)):
				unset($data, $data2);
				$email=array(
					'to'=>$usuario['Usuario']['email'],
					'subject'=>'INFOTAXI::Su cuenta ha sido activada',
					'template'=>'activado',
					'data'=>array('email'=>$usuario['Usuario']['email'], 'nombre'=>$usuario['Usuario']['nombre_completo']),
				);
				//Se envia el correo al usuario creado del tema
				if(!$this->setEmail($email)):
					$dataSource->rollback();
					return FALSE;
				endif;
			else:
				$dataSource->rollback();
				return FALSE;
			endif;
			$dataSource->commit();
			return true;
		endif;
		return false;
			
	}
	/**
	 * Genera un Tokken
	 */
	private function _generateKey() {
		$possible = "0123456789abcdfghijklmnopqrstvwxyz";
		$id = "";
		$i = 0;
		while ($i < 20) {
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			if (!strstr($id, $char)) {
				$id .= $char;
				$i++;
			}
		}
		return $id;
	}	

}
