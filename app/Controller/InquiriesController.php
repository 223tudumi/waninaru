<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email' );
class InquiriesController extends AppController {
	public $helpers = array ( 'Html','Form', 'Xform.Xformjp', 'Cakeplus.Formhidden' );
	
	public function index() {
		if ($this->request->is('post')) {
			if (!empty($this->request->data)) {
				$this->Inquiry->set($this->request->data);
				if($this->Inquiry->validates()){
					if (isset($_POST['confirm'])) {
						$type = 'confirm';
					} elseif (isset($_POST['submit'])) {
						$type = 'submit';
					} elseif (isset($_POST['back'])) {
						$type = 'back';
					}
					switch ($type) {
						case 'back':
							break;
						case 'confirm':
							$this->params['xformHelperConfirmFlag'] = true;
							break;
						case 'submit':
							$vars = $this -> request -> data['Inquiry'];
							$vars['update_date_set'] = date ( 'Y-m-d H:i:s', time() );
							$email = new CakeEmail ();
							$email  -> config ( 'inquiry' )
							// 送信元
							//->from(array($this->request->data['Contact']['email'] => '○○お問い合わせ'))
							// 送信先
							->to('ne230212@senshu-u.jp')
							->viewVars( $vars )
							->template('inquiry', 'inquiry')
							->subject('お問い合わせ');

							if ( $email -> send () ) {
								$this -> Session -> setFlash ( '問合せ完了' );
								$this -> redirect ( array ( 'action' => 'index' ) );
							} else {
								$this -> Session -> setFlash ( 'お問い合わせに失敗しました' );
							}
					}
				}
			}
		}
	}
}