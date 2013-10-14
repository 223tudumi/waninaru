<h2>企画新規登録入力画面</h2>
<?php echo $this->element('admin_menu'); ?>
<?php echo $this->Form->create('Post',array('enctype' => 'multipart/form-data')); ?>
	<?php echo $this->Form->input('ProjectsUser.user_id', array('type' => 'text','label' => '企画者No.')); ?>
	<?php echo $this->Form->input('Project.project_name', array('label' => '企画名')); ?>
	<?php echo $this->Form->input('Project.active_date', array('label' => '実施日')); ?>
	<?php echo $this->Form->input('Project.recrouit_date', array('label' => '募集期限')); ?>
	<?php echo $this->Form->input('Project.active_place', array('label' => '実施場所')); ?>
	<?php echo $this->Form->input('Project.people_maxnum', array('label' => '募集上限人数')); ?>
	<?php echo $this->Form->input('Project.image_file_name', array('type' => 'file', 'label' => 'アイコン画像')); ?>
	<?php echo $this->Form->input('Project.detail_text', array('label' => '詳細文')); ?>
<?php echo $this->Form->end('登録'); ?>