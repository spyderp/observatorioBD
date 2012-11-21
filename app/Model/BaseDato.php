<?php
App::uses('AppModel', 'Model');
/**
 * BaseDato Model
 *
 * @property Empresa $Empresa
 */
class BaseDato extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'baseDatos';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'maxlength' => array(
				'rule' => array('maxlength',45),
				'message' => 'Su pero la cantidad maxima de caracteres',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Empresa' => array(
			'className' => 'Empresa',
			'joinTable' => 'baseDatos_empresas',
			'foreignKey' => 'base_dato_id',
			'associationForeignKey' => 'empresa_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
