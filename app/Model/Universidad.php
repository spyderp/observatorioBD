<?php
App::uses('AppModel', 'Model');
/**
 * Universidad Model
 *
 * @property Carrera $Carrera
 * @property DetallesUniversidad $DetallesUniversidad
 * @property Alianza $Alianza
 */
class Universidad extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Carrera' => array(
			'className' => 'Carrera',
			'foreignKey' => 'universidad_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'DetallesUniversidad' => array(
			'className' => 'DetallesUniversidad',
			'foreignKey' => 'universidad_id',
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
		'Alianza' => array(
			'className' => 'Alianza',
			'joinTable' => 'alianzas_universidades',
			'foreignKey' => 'universidad_id',
			'associationForeignKey' => 'alianza_id',
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
