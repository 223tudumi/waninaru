<?php

class ProjectsBookmark extends AppModel {
	var $name = 'IdeaBookmark';
	
	var $belongsTo = array('User','Idea');
}

?>