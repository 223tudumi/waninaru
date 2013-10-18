<?php

class User extends AppModel {
	var $name = 'User' ;
	public $hasAndBelongsToMany = array(
			'userProject' => array(
					'className' => 'Project',
					'joinTabel' => 'projects_users',
					'foreignKey' => 'user_id',
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