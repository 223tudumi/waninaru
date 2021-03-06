<?php
class Inquiry extends AppModel {
	var $useTable = false;
	public $validate = array(
			'name' => array ( 'rule' => 'notEmpty' ),
			'body'  => array ( 'rule' => 'notEmpty' ),
			'mail'  => array (
					'numeric' => array(
							'rule' => 'numeric',
							'allowEmpty' => false
					),
			),
			'category'	=> array('rule' => 'notEmpty'),
			'mode' => array(),
	);
}
?>