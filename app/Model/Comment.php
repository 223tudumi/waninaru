<?php

class Comment extends AppModel {
	public $belognsTo = array(
			'User' => array(
					'className'    => 'User',
					'foreignKey' => 'id',
					'dependent'    => true
			)
	);
	
	
	public $actsAs = array(
			'SoftDelete'
	);
}

?>