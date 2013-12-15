<?php

class IdeasBookmark extends AppModel {
	var $name = 'IdeaBookmark';
	
	var $belongsTo = array('User','Idea');
}

?>