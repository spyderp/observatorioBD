<?php
App::uses('AppModel', 'Model');
/**
 * Lenguaj Model
 *
 * @property Empresa $Empresa
 */
class Lenguaj extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'maxlength' => array(
				'rule' => array('maxlength',45),
				'message' => 'Supero la cantidad maxima de caracteres',
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
			'joinTable' => 'empresas_lenguajes',
			'foreignKey' => 'lenguaj_id',
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
