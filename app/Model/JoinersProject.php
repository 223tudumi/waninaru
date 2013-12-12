<?php

class JoinersProject extends AppModel {
	var $name = 'JoinersProject';
	
	var $belongsTo = array('Joiner','Project');
}

?>