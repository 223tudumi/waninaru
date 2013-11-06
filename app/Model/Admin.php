<?php

class Admin extends AppModel {
	public $actsAs = array(
			'SoftDelete'
	);
	
	public function beforeSave() {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
}
?>