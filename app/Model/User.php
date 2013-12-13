<?php

class User extends AppModel {
	var $name = 'User' ;
	var $primaryKey = 'id';
	
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
	
	var $hasOne = array('Joiner', 'Prof');
	
	var $hasMany = array(
		'Comment' => array(
            'className'     => 'Comment',
            'foreignKey'    => 'user_id',
            'dependent'     => true
        ),
		'ProjectBookmarks' => array(
			'className'     => 'ProjectsBookmark',
			'foreignKey'    => 'user_id',
			'dependent'     => true
		)
	);
	
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
