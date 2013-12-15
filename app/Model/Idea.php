<?php
class Idea extends AppModel {
	public $name = 'Idea';
	public $belongsTo = array('User');
	var $hasMany = array(
			'IdeasBookmark' => array(
					'className'     => 'IdeaBookmarks',
					'foreignKey'    => 'idea_id',
					'dependent'     => true
			)
	);
}