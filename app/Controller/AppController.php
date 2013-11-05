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
			'Auth' );
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->header("Content-type: text/html; charset=utf-8");
		if(isset($this->params['url'])) {
			array_walk_recursive($this->params['url'],'&$val, $key','$val = mb_convert_encoding($val, "UTF-8", "auto");');
		}
		
		/**
		 * ログイン不用なページの処理
		 */
		//静的コンテンツ
		$this->Auth->allow(array('controller' => 'abouts', 'action' => 'index'));
		$this->Auth->allow(array('controller' => 'inquiries', 'action' => 'index'));
		$this->Auth->allow(array('controller' => 'rules', 'action' => 'index'));
		//TOP
		$this->Auth->allow(array('controller' => 'index', 'action' => 'index'));
		
	}
	
}
