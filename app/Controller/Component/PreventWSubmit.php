<?php
/**
 * Cake PHP PreventWSubmitComponent
 * 二重送信を防止する
 * 
 * CakePHP version 1.3
 * @author junichi11 (https://github.com/junichi11)
 * Usage
 * Controller:
 * public $components = array('PreventWSubmit');
 * public $doublesubmits = array(
 * );
 * 
 * View: add hoge.ctp (If "auto" is false)
 * $this->Form->input('Token.token', array('type' => 'hidden'));
 * If "auto" is true, You need not nothing in view.
 */
 
class PreventWSubmitComponent extends Object {
 
	public $controller = null;
	public $components = array(
	    'Session',
	);
	/**
	 * @var array $option
	 * -model string	モデル名
	 * -token string	view側のhidden属性に設定するfield名
	 * -auto bool		自動でtokenの設定&二重送信のチェックをする(true)かどうか
	 * -url array		デフォルトは現在のアクセスパス
	 * -message string	setFlashに設定する文字列
	 */
	public $option = array(
	    'model' => 'Token',
	    'token' => 'token',
	    'auto' => true,
	    'url' => array(),
	    'message' => null,
	);
 
	//===============================================
	// callback method
	//===============================================
	function initialize(&$controller) {
		$this->controller = &$controller;
		if (isset($this->controller->doublesubmits)) {
			$this->option = am($this->option, $this->controller->doublesubmits);
		}
	}
 
	function startup(&$controller) {
		if (!empty($this->controller->data)) {
			extract($this->option);
			if ($this->option['auto']) {
				if ($this->isDoubleSubmit()) {
					if (!empty($message)) {
						$this->Session->setFlash($message);
					}
					$u = $this->controller->here;
					if (!empty($url)) {
						$u = am($u, $url);
					}
					unset($this->controller->data);
					$this->controller->redirect($u);
				} else {
					$this->Session->delete($token);
					unset($this->controller->data[$model][$token]);
				}
			}
		}
	}
 
	function beforeRender(&$controller) {
		if ($this->option['auto']) {
			$this->setToken();
		}
	}
 
	//===============================================
	// original method
	//===============================================
	/**
	 * トークンを生成しセットする
	 * @return true
	 */
	public function setToken() {
		extract($this->option);
		$t = String::uuid();
		$this->Session->write($token, $t);
		$this->controller->data[$model][$token] = $t;
		if($auto){
			ini_set("url_rewriter.tags", "form=fakeentry");
			output_add_rewrite_var("data[$model][$token]", $t);
		}
		return true;
	}
 
	/**
	 * 二重送信のチェック
	 * @return bool 
	 */
	public function isDoubleSubmit() {
		$ret = false;
		extract($this->option);
		if (isset($this->controller->data[$model][$token])) {
			if ($this->Session->read($token) != $this->controller->data[$model][$token]) {
				$ret = true;
			}
		}
		return $ret;
	}
}
?>