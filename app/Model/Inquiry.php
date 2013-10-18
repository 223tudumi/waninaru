<?php
class Inquiry extends AppModel {
	var $useTable = false;
	public $validate = array(
			'title' => array ( 'rule' => 'notEmpty' ),
			'body'  => array ( 'rule' => 'notEmpty' ),
			'mail'  => array ( 'rule' => 'notEmpty' )
	);
}
?>