<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
			'Session',
			'Auth' => array(
					'loginAction' => array('controller' => 'users','action' => 'login'), //ログインを行なうaction
					'loginRedirect' => array('controller' => 'index', 'action' => 'index'), //ログイン後のページ
					'logoutRedirect' => array('controller' => 'index', 'action' => 'index'), //ログアウト後のページ
					'authenticate' => array(
							'Form' => array(
									'userModel' => 'User', //ユーザー情報のモデル
									'fields' => array('username' => 'student_number','password'=>'user_password')
							)
					)
			)
	);
	
	function beforeFilter() {
		$this->header("Content-type: text/html; charset=utf-8");
		if(isset($this->params['url'])) {
			array_walk_recursive($this->params['url'],'&$val, $key','$val = mb_convert_encoding($val, "UTF-8", "auto");');
		}
		if (!empty($this->params['prefix']) && in_array($this->params['prefix'], Configure::read('Routing.prefixes'))) {
			$this->layout = $this->params['prefix'];
			if ($this->params['prefix'] == 'admin') {
				$this->Auth->authenticate = array(
						'Form' => array(
								'userModel' => 'Admin',
								'fields' => array('username' => 'username','password'=>'password')
						)
				);
				$this->Auth->loginAction = array('controller' => 'admins','action' => 'login', 'admin'=>true);
				$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index', 'admin'=>true);
				$this->Auth->logoutRedirect = array('controller' => 'admins', 'action' => 'login', 'admin'=>true);
				AuthComponent::$sessionKey = "Auth.Admin";
			}else{
				$this->Auth->userModel = 'User';
				AuthComponent::$sessionKey = "Auth.User";
				$this->Auth->loginError = 'ユーザ名もしくはパスワードに誤りがあります';
			}
		}
		$this->set('userSession',$this->Auth->user());
	}
	
}
