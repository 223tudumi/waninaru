<?php

class Producer extends AppModel {
	var $name = 'Producer' ;
	var $hasOne = array(
		'producerUser' => array(
			'className' => 'User',
			'foreignKey' => 'id',
			'condition' => array('User.id' => 'Producer.user_id')
		)
	);
	
	public $actsAs = array(
			'SoftDelete'
	);
}

?>