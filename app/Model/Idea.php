<?php
class Idea extends AppModel {
	public $name = 'Idea';
	public $hasAndBelongsToMany = array(
			'ideaUser' => array(
					'className' => 'User',
					'joinTabel' => 'ideas_users',
					'foreignKey' => 'idea_id',//これもしかしてやばい？
					'unique'                 => true,
					'conditions'             => '',
					'fields'                 => '',
					'order'                  => '',
					'limit'                  => '',
					'offset'                 => '',
					'finderQuery'            => '',
					'deleteQuery'            => '',
					'insertQuery'            => ''
			));
}