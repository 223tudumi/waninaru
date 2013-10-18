<?php
class ContactsController extends AppController {
	public $name = 'Contacts';
	public $uses = array('Contact');
	
	var $helpers = array('Html', 'Form', 'xformjp', 'Cakeplus.Formhidden');
	var $components = array('Qdmail', 'Qdsmtp');
	
	function index(){
		if (isset($this->params['form']['confirm'])) { //確認ページ
			if (!empty($this->data)){
				$this->Contact->set($this->data);
				if ($this->Contact->validates()) {   //バリデーション問題なし
					$this->Session->write('reload', false);  //リロード対策セッションの登録
					$this->params['xformHelperConfirmFlag'] = true;  //確認画面の表示に切り替える
					$this->render('confirm');
					return;
				}
				$this->render();
				return;
			}
		} else if (isset($this->params['form']['back'])) { //入力ページに戻る
			$this->render();
			return;
		} else if (isset($this->params['form']['finish'])) { //完了ページ
			if (!$this->Session->read('reload')) { //リロードした場合はメール送信しない。
				$name = $this->data['Contact']['name'];  //フォームからデータ取得
				$email = $this->data['Contact']['email'];
				$this->send_mail($email, $name);  //メールを送信
				$this->Session->write('reload', true);  //リロードフラグを立てる
			}
			$this->render('finish');
			return;
		}
	}
	//メールを送信します。
	function send_mail($email, $name) {
		$admin_email = 'admin@hoge.jp';  //管理者のメールアドレス
		$admin_name = '管理者';  //管理者の名前
		$mail_param = array(            //SMTPの設定
			'host' => 'smtp.hoge.jp',   //ホスト名
        	'port' => 587,              //ポート
        	'from' => 'admin@hoge.jp',  //Return-path
        	'protocol' => 'SMTP_AUTH',  //認証方式
        	'user' => 'admin',          //SMTPサーバーのユーザーID
        	'pass' => 'password'        //SMTPサーバーの認証パスワード
		);
		$this->Qdmail->reset();  //リセット
		$this->Qdmail->allwaysBcc($admin_email);  //常にBcc設定で管理者に送信
		$this->Qdmail->smtp(true);	//SMTP設定
		$this->Qdmail->smtpServer($mail_param);
		$this->Qdmail->to($email, $name);    //送信先
		$this->Qdmail->subject('お問い合わせを受け付けました');   //件名
		$this->Qdmail->from($admin_email, $admin_name);  //送信元
		$this->Qdmail->text('本文です。');  //本文
		$this->Qdmail->send();  //メールを送信
	}
}
?>