<?php
App::uses('AppModel', 'Model');
/**
 * Alianza Model
 *
 * @property Universidad $Universidad
 */
class Alianza extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Universidad' => array(
			'className' => 'Universidad',
			'joinTable' => 'alianzas_universidades',
			'foreignKey' => 'alianza_id',
			'associationForeignKey' => 'universidad_id',
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
