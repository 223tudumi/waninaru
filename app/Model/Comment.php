<?php

class Comment extends AppModel {
	var $name = 'Comment';
	
	var $belongsTo = array('User');
	
	
	public $actsAs = array(
			'SoftDelete'
	);
}

?>