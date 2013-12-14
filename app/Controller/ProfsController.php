<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class profsController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('User', 'Prof');
	
	public function beforeFilter(){
		parent::beforeFilter();
		//$this->Auth->allow();
	}
	
	public function index($id = null) { 
		$userSession = $this->Auth->user();
		$this->User->id = $id;

		$userdata2 = $this->Prof->find('first', array('conditions' => array('Prof.user_id' => $id)));
		$id2 = $userdata2['Prof']['id'];
		$this->Prof->id = $id2;
		
		$this->set('userinfo', $this->User->read());
		$this->set('profile', $this->Prof->read());
		
	}
	
	public function pass($id= null) {
		$userSession = $this->Auth->user();
		$this->User->id = $id;
		$this->set('userinfo',$this->User->read());
		
		$password_old = null;
		$password_new1 = null;
		$password_new2 = null;
		
		if($this->request->isPost()){
			$user_passdata = $this->User->find('first', array('conditions' => array('User.id' => $id)));
			
			$password_old = $this -> data["oldpassword"];
			$password_new1 = $this -> data["newpassword1"];
			$password_new2 = $this -> data["newpassword2"];
			
			echo($password_old);
			echo($user_passdata['User']['user_password']);
			
			$login['username'] = $this->Session->read('Auth.User.username');
			$login['password'] = $this->Auth->password($this->data['User']['password_confirm']);
			
			//if($this->Auth->login($login)/*$user_passdata['User']['user_password'] == $password_old*/){ 				//古いパスワード一致確認
				if($password_new1 == $password_new2){					//新しいパスワード1とパスワード2が一致しているか確認
					if(6 <= mb_strlen($password_new1) && mb_strlen($password_new1) <= 16){        //パスワー度が６以上１６以下だった場合
						if(preg_match("/([0-9].*[a-zA-Z]|[a-zA-Z].*[0-9])/", "$password_new1")){	//パスワードが英数込みだった場合				

							$savedatas = array('User' => array('id' => $this->User->id, 'user_password' => $password_new1,));
  		                	if($this->User->save($savedatas, false)){		//データベースに保存
								$this->Session->setFlash('パスワードの変更が完了しました');
								$this->redirect("index/".$id);
							} else {
								$this->Session->setFlash("データの保存に失敗しました。管理者にお問い合わせください。");; }
						}else{
							$this->Session->setFlash('パスワードは英字、数字を共に含んで下さい'); }
					}else{
						$this->Session->setFlash('パスワードは６文字以上16文字以下の英数字で入力して下さい'); }
				}else{
					$this->Session->setFlash('新しいパスワードの入力が異なっています'); }
			//}else{
				//$this->Session->setFlash('現在使用しているパスワードが間違っています'); }
		}
	}
	
	
	public function my_prof_pre($id = null){
		$userSession = $this->Auth->user();
		$this->User->id = $id;
		
		$userdata2 = $this->Prof->find('first', array('conditions' => array('Prof.user_id' => $id)));
		$id2 = $userdata2['Prof']['id'];
		$this->Prof->id = $id2;
		
		$this->set('userinfo', $this->User->read());
		$this->set('userprofile', $this->Prof->read());
		
		if($this->request->isPost()){
			$real_name = $this->data["new_real_name"];
			$user_name = $this->data["new_user_name"];
			$real_name_private = $this->data["radio_b"];
			$addmail1 = $this->data["add_mailaddress1"];
			$addmail2 = $this->data["add_mailaddress2"];
			$usemails = $this->data["use_mail1"] + $this->data["use_mail2"] + $this->data["use_mail3"];
			$profdetail = $this->data["profile_detail"];
			$program = $this->data["programs"];
			$images;
			
			if($real_name != null){
				$user_savedatas = array('User' => array('id' => $id, 'real_name' => $real_name, 'user_name' => $user_name,));
				$prof_savedatas = array('Prof' => array('id' => $id2, 'real_name_private' => $real_name_private, 'profimg_url' => '1', 'addmail1' => $addmail1, 'addmail2' => $addmail2,
						'use_address' => $usemails, 'program' => $program, 'prof_detail' => $profdetail ));
				if($this->User->save($user_savedatas, false)){
					if($this->Prof->save($prof_savedatas, false)){
						$this->Session->setFlash("プロフィールの保存が完了しました");
						$this->redirect("index/".$id);
					}else{
						$this->Session->setFlash("データの保存に失敗しました。管理者にお問い合わせください。");
					}
				}else{
					$this->Session->setFlash("データの保存に失敗しました。管理者にお問い合わせください。");
				}
			}
		}
	}
	
	public function my_prof($id = null) {
		$userSession = $this->Auth->user();
		$this->User->id = $id;
		$userdata2 = $this->Prof->find('first', array('conditions' => array('Prof.user_id' => $id)));
		$id2 = $userdata2['Prof']['id'];
		$this->Prof->id = $id2;
		
		$this->set('userinfo', $this->User->read());
		$this->set('userprofile', $this->Prof->read());
		
		if(empty($this->request->data)){
		}else{
			if($this->request->data['User']['hidden']=='confirm'){
				//print_r($this->request->data);
				$tmpName = $this->request->data['User']['profile_img_url']['temp_name'];
				$imageName = '-' . date('YmdHis') . '.jpg';
				$fileName = APP.'webroot/img/tmps/'.$imageName;
				move_uploaded_file($tmpName, $fileName);
				$this->request->data['User']['profile_img_url'] = $imageName;
				
				//echo($imageName);
				//$this->Session->setFlash($this->request->data['User']['profile_img_url']);
				
				$this->set('request',$this->request->data);
				
				if($this->data['new_real_name'] != null){
					$this->render("my_prof_check");
				}
				
			}
			else if($this->request->data['User']['hidden']=='complete'){
				rename(APP.'webroot/img/tmps/'.$this->request->data['User']['profile_img_url'], APP.'webroot/img/profiles/'.$this->Project->id.$this->request->data['User']['profile_img_url']);
				$this->request->data['User']['profile_img_url'] = $this->User->id.$this->request->data['User']['profile_img_url'];
				
				if($this->data['User']['new_real_name'] != null){
					$this->Session->setFlash(print_r($this->request->data));
					$usemails = $this->data['User']['use_mail1'] + $this->data['User']['use_mail2'] + $this->data['User']['use_mail3'];
							$user_savedatas = array('User' => array('id' => $id, 'real_name' => $this->data['User']['new_real_name'], 'user_name' => $this->data['User']['new_user_name']));
							$prof_savedatas = array('Prof' => array('id' => $id2, 'real_name_private' => $this->data['User']['radio_b'], 'profimg_url' => $this->data['User']['profile_img_url'], 
									'addmail1' => $this->data['User']['add_mailaddress1'], 'addmail2' => $this->data['User']['add_mailaddress2'], 'use_address' => $usemails,
									'program' => $this->data['User']['programs'], 'prof_detail' => $this->data['User']['profile_detail'] ));
							if($this->User->save($user_savedatas, false)){
								if($this->Prof->save($prof_savedatas, false)){
									$this->render("my_prof_check_ok");
								}else{
									$this->Session->setFlash("データの保存に失敗しました。管理者にお問い合わせください。");
								}
							}else{
								$this->Session->setFlash("データの保存に失敗しました。管理者にお問い合わせください。");
							}
						}
				
			}
		}
		
		/**
			if($this->request->isPost()){	
				if($this->request->data['Prof']['hidden']=='confirm'){				
					if($real_name != null){
						$this->Session->setFlash("aaa");
						//$this->redirect("my_prof_check/".$id."?profdata=".$profdata);
						$this->render("my_prof_check");
					}
				}
				else if($this->request->data['Prof']['hidden']=='complete'){					
					if (!empty($this->data)) {
						if(isset($this->params['data']['return'])) {
							// 修正
							$this->redirect("my_prof/".$id);
						} else {
							// 登録
							if($real_name != null){
							$user_savedatas = array('User' => array('id' => $id, 'real_name' => $real_name, 'user_name' => $user_name,));
							$prof_savedatas = array('Prof' => array('id' => $id2, 'real_name_private' => $real_name_private, 'profimg_url' => '1', 'addmail1' => $addmail1, 'addmail2' => $addmail2,
													'use_address' => $usemails, 'program' => $program, 'prof_detail' => $profdetail ));
							if($this->User->save($user_savedatas, false)){
								if($this->Prof->save($prof_savedatas, false)){
									$this->render("my_prof_check_ok");	
								}else{
									$this->Session->setFlash("データの保存に失敗しました。管理者にお問い合わせください。");
								}
							}else{
								$this->Session->setFlash("データの保存に失敗しました。管理者にお問い合わせください。");
							}
						}
					}
				}
			}
		}
		
		*/
	}
}