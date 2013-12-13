<?php

class ProjectsUser extends AppModel {
	var $name = 'ProjectsUser';
	
	var $belongsTo = array('User','Project');
}

?>