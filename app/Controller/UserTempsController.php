<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeEmail', 'Network/Email');

class UserTempsController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('User_temp', 'User');
	public function index() { }
	
	
	public function account_entry(){
		$numdata = 0;
		
	    if (empty($this->request->data)){
		}else{									//�f�[�^�������Ă��邩�m�F
	    	$stu_num = Sanitize:: stripAll($this->request->data['Student_Number']);
	    	$numdata = $this->User->find('count', array( 'conditions' => array('student_number' => $stu_num)));
	    	
			if($numdata==0){											//�o�^�ς݂łȂ����m�F
		    	if (preg_match("/^[0-9]+$/",$stu_num)) {				//�f�[�^�����l�ł��邩�m�F
		    		if (180000 < $stu_num && $stu_num < 999999){		//�f�[�^���U���ł��邩�m�F
	
			    		//A.��������n�b�V���쐬�A���o�^�f�[�^�x�[�X�֓o�^
			    		$regkey = sha1(uniqid(rand(),1));
			    		$savedata = array('User_temp' => array('student_number' => $stu_num, 'real_name' => '', 'user_name' => '',
			    				'user_password' => '', 'reg_key' => $regkey));
			    		if($this->User_temp->save($savedata, false)){
			    		}else{
			    			$this->Session->setFlash('���o�^�Ɏ��s���܂����B���Ԃ�u���Ď������A�Ǘ��҂ɂ��₢���킹��������');
			    		}
			    		//A.�����܂Ńn�b�V���쐬�A���o�^�f�[�^�x�[�X�֓o�^
			    		
			    		//B.�������烁�[��
			    		$mailto = "ne$stu_num@senshu-u.jp";			//���[���A�h���X�̍쐬
			    		$reg_url = "http://laurant.local/waninaru/UserTemps/account_sign_up?student_number=$stu_num&key=$regkey";		//�o�^�purl�̍쐬
			    		$mailVars = array(
			    				'number' => "$stu_num",
			    				'url' => "$reg_url"
			    		);
	
			    		$email = new CakeEmail('gmail');                        //�C���X�^���X��
			    		$email->from(array('kuripro2013@gmail.com' => 'Sender'));  //���M��
			    		$email->to("$mailto");           				           //���M��
			    		$email->subject("ne$stu_num �l�yWaninaru�z�o�^�\������t�܂����B");	//���[���^�C�g��	
			    		$email->emailFormat('text');                            //�t�H�[�}�b�g
			    		$email->template('add_user');                           //�e���v���[�g�t�@�C��
			    		$email->viewVars($mailVars);      				       //�e���v���[�g�ɓn���ϐ�
			    		if($email->send()){
			    			$this->redirect("account_mail");
			    		}else{
			    			$this->Session->setFlash('���[�����M�Ɏ��s���܂����B���Ԃ�u���Ď������A�Ǘ��҂ɂ��₢���킹��������');
			    		}
			    		//B.�����܂Ń��[���A�y�[�W�J��

		    		} else {
		    			echo "<p>Put your StudentNumber with 6 NUMBERS.</p>";	//�f�[�^�����l������ǂU���łȂ������ꍇ�̏���
		    		}
				} else {
					echo "<p>Put your StudentNumber with NUMBER.</p>";			//�f�[�^�����l�łȂ������ꍇ�̏���
				}
	    	}else{
	    		echo "<p>you have already used waninaru.</p>";
	    	}
	    }
	}
	

	public function account_mail() {
		
	}
	
	
	public function account_sign_up() {	
		$this->modelClass = null;
		$password1 = null;
		$password2 = null;
		$real_name = null;
		$user_name = null;
		$use_check = null;
		
		if(isset($_GET['student_number'])) {$stu_num = $_GET['student_number'];}
		if(isset($_GET['key'])) {$reg_key = $_GET['key'];}
		$this->set("StudentNumber", $stu_num);
		
		$conf_rightusers = $this->User_temp->find('first', array('conditions' => array('User_temp.student_number' => $stu_num)));
		$conf_number = $conf_rightusers['User_temp']['student_number'];
		$conf_key = $conf_rightusers['User_temp']['reg_key'];
		
		if($stu_num == $conf_number && $reg_key == $conf_key){			//�w�Дԍ��A�L�[�����o�^�f�[�^�ƈ�v���Ă����ꍇ
		
			if (empty($this->request->data)){							//�f�[�^�������Ă����ꍇ
			}else{
				
				$password1 = $this -> data["password"];
				$password2 = $this -> data["password2"];
				$real_name_reg1 = $this -> data["name"];
					$real_name = preg_replace('/[ �@]/', '', $real_name_reg1);
				$user_name = $this -> data["username"];
				$use_check = isset($this -> data["usecheck"]) ? "True" : "Null";
		
				if($password1 != null){									//�p�X���[�h�ɓ��͂���Ă����ꍇ
					if($password1 == $password2){						//�p�X���[�h�ƃp�X���[�h�m�F�������������ꍇ
						if(6 <= mb_strlen($password1) && mb_strlen($password1) <= 16){	//�p�X���[�x���U�ȏ�P�U�ȉ��������ꍇ
							if(preg_match("/([0-9].*[a-zA-Z]|[a-zA-Z].*[0-9])/", "$password1")){	//�p�X���[�h���p�����݂������ꍇ
								if($real_name != null){					//�{�����ɂイ��傭����Ă����ꍇ
									if(2 <= mb_strlen($real_name) && mb_strlen($real_name) <= 64){	//�{�����Q�`�U�S�����������ꍇ
										if($user_name == null){$user_name = " ";} if(mb_strlen($user_name) <= 64){	//���[�U����null�Ȃ�""�ɏC������B���[�U�����U�S�����ȉ��̏ꍇ
											if($use_check != "Null"){ 	//���p�K��Ƀ`�F�b�N����Ă���ꍇ
												
												//���o�^�p�f�[�^�x�[�X�ɋL�^
												$p_key = $conf_rightusers['User_temp']['id'];
												$savedatas = array('User_temp' => array('id' => $p_key, 'student_number' => $stu_num, 'real_name' => $real_name, 'user_name' => $user_name,
														'user_password' => $password1, 'reg_key' => $reg_key));
												if($this->User_temp->save($savedatas, false)){
												}else{
													$this->Session->setFlash('���o�^�Ɏ��s���܂����B���Ԃ�u���Ď������A�Ǘ��҂ɂ��₢���킹��������');
												}
												$this->redirect("user_entry?student_number=".$stu_num."&key=".$reg_key);
										
											}else{
												echo "<p>check the confirm.</p>";		
											}
										}else{
											echo "<p>user name must be under 64 key.</p>";
										}	
									}else{
										echo "<p>real_name must be 2~64 key.</p>";
									}
								}else{
									echo "<p>input your real name.</p>";
								}
							}else{
								echo "<p>password must coutain alphabet and number.</p>";
							}
						}else{
							echo "<p>password must be 6~16 key.</p>";
						}
					}else{
						echo "<p>password confirm is different.</p>";		
					}
				}else{
					echo "<p>input your password.</p>";
				}		
			}
		}else{
			$this->Session->setFlash('�L�[����v���܂���B������x�ŏ����炨������������');
		}
	}
	
	
	public function user_entry(){
		if(isset($_GET['student_number'])) {$stu_num = $_GET['student_number'];}
		if(isset($_GET['key'])) {$reg_key = $_GET['key'];}

		$conf_rightusers = $this->User_temp->find('first', array('conditions' => array('User_temp.student_number' => $stu_num)));
		$conf_number = $conf_rightusers['User_temp']['student_number'];
		$conf_key = $conf_rightusers['User_temp']['reg_key'];
		
		if($stu_num == $conf_number && $reg_key == $conf_key){
		
			$real_name = $conf_rightusers['User_temp']['real_name'];
			$username = $conf_rightusers['User_temp']['user_name'];
			$password = $conf_rightusers['User_temp']['user_password'];
		
			$this->set("StudentNumber", $stu_num);
			$this->set("RealName", $real_name);
			$this->set("UserName", $username);
			$this->set("Password", $password);
			
			if (!empty($this->data)) {
				if(isset($this->params['data']['submit'])) {
					// �o�^
					$this->redirect("account_entry_complete?student_number=".$stu_num."&key=".$reg_key);
				} else {
					// �C��
					$this->redirect("account_sign_up?student_number=".$stu_num."&key=".$reg_key);
				}
			}
		
		}else{
			$this->Session->setFlash('�L�[����v���܂���B������x�ŏ����炨������������');
		}
	}
	
	
	public function account_entry_complete(){
		if(isset($_GET['student_number'])) {$stu_num = $_GET['student_number'];}
		if(isset($_GET['key'])) {$reg_key = $_GET['key'];}
		
		$conf_rightusers = $this->User_temp->find('first', array('conditions' => array('User_temp.student_number' => $stu_num)));
		$conf_number = $conf_rightusers['User_temp']['student_number'];
		$conf_key = $conf_rightusers['User_temp']['reg_key'];
		
		if($stu_num == $conf_number && $reg_key == $conf_key){
			//user_temp�e�[�u������ϐ���
			$stunum = $conf_rightusers['User_temp']['student_number'];
			$realname = $conf_rightusers['User_temp']['real_name'];
			$username = $conf_rightusers['User_temp']['user_name'];
			$password = $conf_rightusers['User_temp']['user_password'];

			//�ϐ�����user�e�[�u����
			$savedatas = array('User' => array('student_number' => $stunum, 'real_name' => $realname, 'user_name' => $username,
					'user_password' => $password ));
			if($this->User->save($savedatas, false)){
			}else{
				$this->Session->setFlash('�o�^�Ɏ��s���܂����B���Ԃ�u���Ď������A�Ǘ��҂ɂ��₢���킹��������');
			}
			
			//user_temp�̃f�[�^���폜
			$p_key = $conf_rightusers['User_temp']['id'];
			if ($this->User_temp->delete($p_key)) {
				
			} else {
				$this->Session->setFlash('���o�^�폜�Ɏ��s���܂����B�Ǘ��҂ɂ��₢���킹��������');
			}
		}else{
			$this->Session->setFlash('�L�[����v���܂���B������x�ŏ����炨������������');
		}
	}
}