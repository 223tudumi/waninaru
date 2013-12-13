<?php

class Icomment extends AppModel {
	var $name = 'Icomment';
	
	var $belongsTo = array('User','Idea');
	
	
	public $actsAs = array(
			'SoftDelete'
	);
}

?>