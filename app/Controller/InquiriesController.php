<?php
App::uses('CakeEmail', 'Network/Email' );
class InquiriesController extends AppController {
	public $helpers = array ( 'Html','Form');
	
	public function index() {
		if(empty($this->request->data)){
		}else{
			if($this->request->data['Inquiry']['hidden']=='confirm'){
				switch($this->request->data['Inquiry']['category']){
					case 0:
						$this->request->data['Inquiry']['category']='企画について';
						break;
					case 1:
						$this->request->data['Inquiry']['category']='アカウントについて';
						break;
					case 2:
						$this->request->data['Inquiry']['category']='サイトについて';
						break;
					case 3:
						$this->request->data['Inquiry']['category']='その他';
						break;
				}
				$this->set('inquiry',$this->request->data['Inquiry']);
				$this->render("confirm");
			}
			else if($this->request->data['Inquiry']['hidden']=='complete'){
				$email = new CakeEmail ();
				$email->config ( 'inquiry' );
				$email->to('ne'.$this->request->data['Inquiry']['mail'].'@senshu-u.jp');
				$email->subject($this->data['Inquiry']['name'].'様【Waninaru】お問い合わせを受付ました。');
				$email->emailFormat('text');
				$email->template('inquiryConfirm');
				$email->viewVars($this->request->data['Inquiry']);
				if ( $email -> send () ) {
					$email = new CakeEmail ();
					$email->config ( 'inquiry' );
					$email->to('kuripro2013@gmail.com');
					$email->subject('システム管理者【Waninaru】お問い合わせを受付ました。');
					$email->emailFormat('text');
					$email->template('inquiry');
					$email->viewVars($this->request->data['Inquiry']);
					$email -> send ();
					$this->render("complete");
				} else {
					$this -> Session -> setFlash ( 'お問い合わせに失敗しました' );
				}
			}	
		}
	}
}
?>