<?php

class ProjectsBookmark extends AppModel {
	var $name = 'ProjectBookmark';
	
	var $belongsTo = array('User','Project');
}

?>