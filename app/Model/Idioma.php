<?php
App::uses('AppModel', 'Model');
/**
 * Idioma Model
 *
 * @property RecursosHumano $RecursosHumano
 */
class Idioma extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'RecursosHumano' => array(
			'className' => 'RecursosHumano',
			'joinTable' => 'idiomas_recursosHumanos',
			'foreignKey' => 'idioma_id',
			'associationForeignKey' => 'recursos_humano_id',
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
