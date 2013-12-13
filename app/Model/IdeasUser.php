<?php

class IdeasUser extends AppModel {
	var $name = 'IdeasUser';
	
	var $belongsTo = array('User','Idea');
}

?>