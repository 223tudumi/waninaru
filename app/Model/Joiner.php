<?php

class Joiner extends AppModel {
	var $name = 'Joiner' ;
	
	public $hasAndBelongsToMany = array(
			'joinerProject' => array(
					'className' => 'Project',
					'joinTabel' => 'joiners_projects',
					'foreignKey' => 'joiner_id',
					'unique'                 => true,
					'conditions'             => '',
					'fields'                 => '',
					'order'                  => '',
					'limit'                  => '',
					'offset'                 => '',
					'finderQuery'            => '',
					'deleteQuery'            => '',
					'insertQuery'            => ''
			)
	);
	
	
	
	public $actsAs = array(
			'SoftDelete'
	);
}

?>