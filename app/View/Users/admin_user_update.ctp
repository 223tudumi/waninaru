<h2>ユーザ更新入力画面</h2>
<div>
	<?php echo $this->Html->link('ユーザ検索一覧' , array('controller'=>'users' , 'action'=>'admin_index') ) ?>
	<?php echo $this->Html->link('ユーザ新規登録' , array('controller'=>'users' , 'action'=>'admin_userRegist') ) ?>
	<?php echo $this->Html->link('企画検索一覧' , array('controller'=>'projects' , 'action'=>'admin_index') ) ?>
</div>
<?php echo $this->Form->create('Post'); ?>
	<?php echo $this->Form->input('User.student_number', array('type' => 'text')); ?>
	<?php echo $this->Form->input('User.real_name', array('type' => 'text')); ?>
	<?php echo $this->Form->input('User.user_name', array('type' => 'text')); ?>
	<?php echo $this->Form->input('User.user_password', array('type' => 'password')); ?>
<?php echo $this->Form->end('登録'); ?>