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
		),
		'projectJoiner' => array(
			'className' => 'Joiner',
			'joinTabel' => 'joiners_projects',
			'foreignKey' => 'project_id',
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
		),
	);
	
	var $hasMany = array(
			'ProjectsBookmark' => array(
					'className'     => 'ProjectBookmarks',
					'foreignKey'    => 'project_id',
					'dependent'     => true
			)
	);
	
	public $actsAs = array(
			'SoftDelete'
	);
}

?>