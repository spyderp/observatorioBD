<?php
App::uses('AppModel', 'Model');
class Privilege extends UsuariosAppModel {
	/**
	 * 
	 * Asociaciones belongsTo 
	 * @public array
	 */
	public $belongsTo = array(
		'Rol' => array( 
         	'className' => 'Rol', 
         	'foreignKey' => 'rol_id'
         ),
	);
	/**
	 * 
	 * Retorna la ruta completa
	 * @public array
	 */
	public $virtualFields = array(
		'ruta' => "CONCAT(Privilege.controller, '/', Privilege.action)",
	);
}