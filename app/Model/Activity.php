<?php
class Activity extends AppModel{
	var $useTable = false;
	public $validate = array(
			'id' => array(),
			/**
			 * 1...企画
			 * 2...アイデア
			 */
			'type' => array (),
			/**
			 * 1...投稿
			 * 2...ブックマーク
			 * 3...参加
			 */
			'do'  => array (),
			'message'	=> array(),
	);
}

?>