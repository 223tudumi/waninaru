<?php

class Joiner extends AppModel {
	var $name = 'Joiner' ;
	
	public $hasAndBelongsToMany = array(
			'joinerProject' => array(
					'className' => 'Project',
					'joinTabel' => 'joiners_projects',
					'foreignKey' => 'joiner_id',
					'unique'                 => false,
					'conditions'             => '',
					'fields'                 => '',
					'order'                  => '',
					'limit'                  => '',
					'offset'                 => '',
					'finderQuery'            => '',
					'deleteQuery'            => '',
					'insertQuery'            => '',
					'with' => 'JoinersProject'
			)
	);
	
	var $belongsTo = array('User');
	
	public $actsAs = array(
			'SoftDelete'
	);
	
	
}

?>