<?php

class User extends AppModel {
	var $uses = array('Joiner');
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
	
	var $hasOne = array('Joiner');
	
	var $hasMany = array('Comment');
	
	public $actsAs = array(
			'SoftDelete'
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['user_password'])) {
			$this->data[$this->alias]['user_password'] = AuthComponent::password($this->data[$this->alias]['user_password']);
		}
		return true;
	}
}