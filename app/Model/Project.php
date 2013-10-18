<?php

class Project extends AppModel {
	public $name = 'Project';
	public $hasAndBelongsToMany = array(
		'projectUser' => array(
			'className' => 'User',
			'joinTabel' => 'projects_users',
			'foreignKey' => 'project_id',
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