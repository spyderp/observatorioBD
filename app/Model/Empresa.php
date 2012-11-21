<?php
App::uses('AppModel', 'Model');
/**
 * Empresa Model
 *
 * @property Colaborador $Colaborador
 * @property Aplicacion $Aplicacion
 * @property BaseDato $BaseDato
 * @property Lenguaj $Lenguaj
 * @property SistemaOperativo $SistemaOperativo
 */
class Empresa extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ruc' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'provincia' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Colaborador' => array(
			'className' => 'Colaborador',
			'foreignKey' => 'empresa_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Aplicacion' => array(
			'className' => 'Aplicacion',
			'joinTable' => 'aplicaciones_empresas',
			'foreignKey' => 'empresa_id',
			'associationForeignKey' => 'aplicacion_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'BaseDato' => array(
			'className' => 'BaseDato',
			'joinTable' => 'baseDatos_empresas',
			'foreignKey' => 'empresa_id',
			'associationForeignKey' => 'base_dato_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Lenguaj' => array(
			'className' => 'Lenguaj',
			'joinTable' => 'empresas_lenguajes',
			'foreignKey' => 'empresa_id',
			'associationForeignKey' => 'lenguaje_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'SistemaOperativo' => array(
			'className' => 'SistemaOperativo',
			'joinTable' => 'empresas_sistemaOperativos',
			'foreignKey' => 'empresa_id',
			'associationForeignKey' => 'sistema_operativo_id',
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
