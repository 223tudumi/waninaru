<?php

class Project extends AppModel {
	public $name = 'Project';
	public $hasMany = array(
		'Producer' => array(
			'className' => 'Producer',
			'foreignKey' => 'project_id',
			'dependent' => 'true'
		)
	);
	
	public $actsAs = array(
			'SoftDelete'
	);
}

?>