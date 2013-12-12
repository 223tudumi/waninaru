<?php

class Comment extends AppModel {
	var $name = 'Comment';
	
	var $belongsTo = array('User','Project');
	
	
	public $actsAs = array(
			'SoftDelete'
	);
}

?>