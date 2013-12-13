<?php
class Idea extends AppModel {
	public $name = 'Idea';
	public $belongsTo = array('User');
}