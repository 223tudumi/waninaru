<h2>ユーザ新規登録入力画面</h2>
<?php echo $this->Form->create('Post'); ?>
	<?php echo $this->Form->input('User.student_number', array('type' => 'text')); ?>
	<?php echo $this->Form->input('User.real_name', array('type' => 'text')); ?>
	<?php echo $this->Form->input('User.user_name', array('type' => 'text')); ?>
	<?php echo $this->Form->input('User.user_password', array('type' => 'password')); ?>
<?php echo $this->Form->end('登録'); ?>