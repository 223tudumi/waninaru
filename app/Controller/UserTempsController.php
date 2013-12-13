<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeEmail', 'Network/Email');

class UserTempsController extends AppController{
        public $helpers = array('Html', 'Form');
        public $uses = array('User_temp', 'User');
        
        public function beforeFilter(){
        	parent::beforeFilter();
        	$this->Auth->allow('index','account_entry','account_mail','account_sign_up','user_entry','account_entry_complete');
        }
        
        public function index() {}
        
        public function account_entry(){
                $numdata = 0;
                
            if (empty($this->request->data)){
                }else{                                                                        //データが入っているか確認
                    $stu_num = Sanitize:: stripAll($this->request->data['Student_Number']);
                    $numdata = $this->User->find('count', array( 'conditions' => array('student_number' => $stu_num)));
                    $tempdata = $this->User_temp->find('count', array( 'conditions' => array('student_number' => $stu_num)));
                    
                        if($numdata==0 && $tempdata==0){                                                                              //登録済みでないか確認
                            if (preg_match("/^[0-9]+$/",$stu_num)) {                                //データが数値であるか確認
                                    if (180000 < $stu_num && $stu_num < 999999){                //データが６桁であるか確認
                                            //A.ここからハッシュ作成、仮登録データベースへ登録
                                            $subregkey = sha1(uniqid(rand(),1));
                                            $knum = mt_rand(1,10);
                                            $regkey = substr($subregkey,$knum,12);
                                            
                                            $savedata = array('User_temp' => array('student_number' => $stu_num, 'real_name' => '', 'user_name' => '',
                                                            'user_password' => '', 'reg_key' => $regkey));
                                            if($this->User_temp->save($savedata, false)){
                                            }else{
                                                    $this->Session->setFlash('仮登録に失敗しました。時間を置いて試すか、管理者にお問い合わせください');
                                            }
                                            //A.ここまでハッシュ作成、仮登録データベースへ登録
                                            
                                            //B.ここからメール
                                            $mailto = "ne$stu_num@senshu-u.jp";                        //メールアドレスの作成
                                            $reg_url = "http://waninaru.net/UserTemps/account_sign_up?sn=$stu_num&key=$regkey";                //登録用urlの作成
                                            $mailVars = array(
                                                            'number' => "$stu_num",
                                                            'url' => "$reg_url"
                                            );
        
                                            $email = new CakeEmail('inquiry');                        //インスタンス化
                                            $email->from(array('kuripro2013@gmail.com' => 'Waninaru運営'));  //送信元
                                            $email->to("$mailto");                                                      //送信先
                                            $email->subject("ne$stu_num 様【Waninaru】登録申請を受付ました。");        //メールタイトル        
                                            $email->emailFormat('text');                            //フォーマット
                                            $email->template('add_user');                           //テンプレートファイル
                                            $email->viewVars($mailVars);                                             //テンプレートに渡す変数
                                            if($email->send()){
                                                    $this->redirect("account_mail");
                                            }else{
                                                    $this->Session->setFlash('メール送信に失敗しました。時間を置いて試すか、管理者にお問い合わせください');
                                            }
                                            //B.ここまでメール、ページ遷移

                                    } else {
                                            echo "<p>Put your StudentNumber with 6 NUMBERS.</p>";        //データが数値だけれど６桁でなかった場合の処理
                                    }
                                } else {
                                        echo "<p>Put your StudentNumber with NUMBER.</p>";                        //データが数値でなかった場合の処理
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
                
                if(isset($_GET['sn'])) {$stu_num = $_GET['sn'];}
                if(isset($_GET['key'])) {$reg_key = $_GET['key'];}
                $this->set("StudentNumber", $stu_num);
                
                $conf_rightusers = $this->User_temp->find('first', array('conditions' => array('User_temp.student_number' => $stu_num)));
                $conf_number = $conf_rightusers['User_temp']['student_number'];
                $conf_key = $conf_rightusers['User_temp']['reg_key'];
                
                if($stu_num == $conf_number && $reg_key == $conf_key){                        //学籍番号、キーが仮登録データと一致していた場合
                
                        if (empty($this->request->data)){                                                        //データが入っていた場合
                        }else{
                                
                                $password1 = $this -> data["password"];
                                $password2 = $this -> data["password2"];
                                $real_name_reg1 = $this -> data["name"];
                                        $real_name = preg_replace('/[ 　]/', '', $real_name_reg1);
                                $user_name = $this -> data["username"];
                                $use_check = isset($this -> data["usecheck"]) ? "True" : "Null";
                
                                if($password1 != null){                                                                        //パスワードに入力されていた場合
                                        if($password1 == $password2){                                                //パスワードとパスワード確認が同じだった場合
                                                if(6 <= mb_strlen($password1) && mb_strlen($password1) <= 16){        //パスワー度が６以上１６以下だった場合
                                                        if(preg_match("/([0-9].*[a-zA-Z]|[a-zA-Z].*[0-9])/", "$password1")){        //パスワードが英数込みだった場合
                                                                if($real_name != null){                                        //本名がにゅうりょくされていた場合
                                                                        if(2 <= mb_strlen($real_name) && mb_strlen($real_name) <= 64){        //本名が２〜６４文字だった場合
                                                                                if($user_name == null){$user_name = " ";} if(mb_strlen($user_name) <= 64){        //ユーザ名がnullなら""に修正する。ユーザ名が６４文字以下の場合
                                                                                        if($use_check != "Null"){         //利用規約にチェックされている場合
                                                                                                
                                                                                                //仮登録用データベースに記録
                                                                                                $p_key = $conf_rightusers['User_temp']['id'];
                                                                                                $savedatas = array('User_temp' => array('id' => $p_key, 'student_number' => $stu_num, 'real_name' => $real_name, 'user_name' => $user_name,
                                                                                                                'user_password' => $password1, 'reg_key' => $reg_key));
                                                                                                if($this->User_temp->save($savedatas, false)){
                                                                                                }else{
                                                                                                        $this->Session->setFlash('仮登録に失敗しました。時間を置いて試すか、管理者にお問い合わせください');
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
                        $this->Session->setFlash('キーが一致しません。もう一度最初からお試しください');
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
                                        // 登録
                                        $this->redirect("account_entry_complete?student_number=".$stu_num."&key=".$reg_key);
                                } else {
                                        // 修正
                                        $this->redirect("account_sign_up?sn=".$stu_num."&key=".$reg_key);
                                }
                        }
                
                }else{
                        $this->Session->setFlash('キーが一致しません。もう一度最初からお試しください');
                }
        }
        
        
        public function account_entry_complete(){
                if(isset($_GET['student_number'])) {$stu_num = $_GET['student_number'];}
                if(isset($_GET['key'])) {$reg_key = $_GET['key'];}
                
                $conf_rightusers = $this->User_temp->find('first', array('conditions' => array('User_temp.student_number' => $stu_num)));
                $conf_number = $conf_rightusers['User_temp']['student_number'];
                $conf_key = $conf_rightusers['User_temp']['reg_key'];
                
                if($stu_num == $conf_number && $reg_key == $conf_key){
                        //user_tempテーブルから変数へ
                        $stunum = $conf_rightusers['User_temp']['student_number'];
                        $realname = $conf_rightusers['User_temp']['real_name'];
                        $username = $conf_rightusers['User_temp']['user_name'];
                        $password = $conf_rightusers['User_temp']['user_password'];

                        //変数からuserテーブルへ
                        $savedatas = array('User' => array('student_number' => $stunum, 'real_name' => $realname, 'user_name' => $username,
                                        'user_password' => $password ));
                        if($this->User->save($savedatas, false)){
                                $mailto = "ne$stu_num@senshu-u.jp";                        //メールアドレスの作成
                                $mailVars = array(                                                        //メールテンプレートに渡す変数（配列）作成
                                                'name' => "$realname",
                                                'number' => "$stu_num",
                                                'pass' => "$password"
                                );
                                
                                $email = new CakeEmail('inquiry');                        //インスタンス化
                                $email->from(array('kuripro2013@gmail.com' => 'Waninaru運営'));  //送信元
                                $email->to("$mailto");                                                      //送信先
                                $email->subject("$realname 様【Waninaru】本登録完了のお知らせ");        //メールタイトル
                                $email->emailFormat('text');                            //フォーマット
                                $email->template('add_user_comp');                           //テンプレートファイル
                                $email->viewVars($mailVars);                                             //テンプレートに渡す変数
                                if($email->send()){
                                }else{
                                        $this->Session->setFlash('メール送信に失敗しました。時間を置いて試すか、管理者にお問い合わせください');
                                }
                        }else{
                                $this->Session->setFlash('登録に失敗しました。時間を置いて試すか、管理者にお問い合わせください');
                        }
                        
                        //user_tempのデータを削除
                        $p_key = $conf_rightusers['User_temp']['id'];
                        if ($this->User_temp->delete($p_key)) {
                                
                        } else {
                                $this->Session->setFlash('仮登録削除に失敗しました。管理者にお問い合わせください');
                        }
                }else{
                        //$this->Session->setFlash('キーが一致しません。もう一度最初からお試しください');
                }
        }
}