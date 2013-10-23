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
						break;
				}
				$this->set('inquiry',$this->request->data['Inquiry']);
				$this->render("confirm");
			}
			else if($this->request->data['Inquiry']['hidden']=='complete'){
				$email = new CakeEmail ();
				$email->config ( 'inquiry' );
				$email->to('ne'.$this->request->data['Inquiry']['mail'].'@senshu-u.jp');
				$email->subject($this->data['Inquiry']['name'].'様【Waninaru】登録申請を受付ました。');
				$email->emailFormat('text');
				$email->template('inquiry');
				$email->viewVars($this->request->data['Inquiry']);
				if ( $email -> send ('test') ) {
					$this->render("complete");
				} else {
					$this -> Session -> setFlash ( 'お問い合わせに失敗しました' );
				}
			}	
		}
	}
}
?>