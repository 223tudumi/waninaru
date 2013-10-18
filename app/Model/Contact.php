<?php
class Contact extends AppModel {
	public $name = 'Contact';
	public $actsAs = array('Cakeplus.AddValidationRule');
	var $useTable = false;  //データベースのテーブルを使用しない
	public $validate = array(
			'name' => array(//名前
					'maxLengthJP' => array(
							'rule' => array('maxLengthJP', '50'), //日本語50文字以内
							'allowEmpty' => false,
							'message' => '50文字以内で入力してください'
					),
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => '名前を入力してください'
					)
			),
			'email' => array( //メールアドレス
					'email' => array(
							'rule' => array('email', true),  //メールサーバーのホストが存在するか調べる
							'message' => 'メールアドレスを正しく入力してください'
					),
					'notEmtpy' => array(
							'rule' =>'notEmpty',
							'message' => 'メールアドレスを入力してください'
					)
			),
			'body' => array(  //お問い合わせ内容
					'maxLengthJP' => array(
							'rule' => array('maxLengthJP', '500'), //日本語500文字以内
							'allowEmpty' => false,
							'message' => '500文字以内で入力してください'
					),
					'notEmpty' => array(
							'rule' => 'notEmpty',
							'message' => 'お問い合わせ内容を入力してください'
					)
			)
	);
}
?>