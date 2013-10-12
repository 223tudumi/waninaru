<h2>企画新規登録入力画面</h2>
<div>
	<?php echo $this->Html->link('ユーザ検索一覧' , array('controller'=>'users' , 'action'=>'admin_index') ) ?>
	<?php echo $this->Html->link('ユーザ新規登録' , array('controller'=>'users' , 'action'=>'admin_userRegist') ) ?>
	<?php echo $this->Html->link('企画検索一覧' , array('controller'=>'projects' , 'action'=>'admin_index') ) ?>
</div>
<?php echo $this->Form->create('Post'); ?>
	<div class="input text">
		<label>企画者名</label>
		<?php echo h($user['User']['real_name']); ?>
	</div>
	<?php echo $this->Form->input('Project.project_name', array('type' => 'text','label' => '企画名')); ?>
	<?php echo $this->Form->input('Project.active_date', array('label' => '実施日')); ?>
	<?php echo $this->Form->input('Project.recrouit_date', array('label' => '募集期限')); ?>
	<?php echo $this->Form->input('Project.active_place', array('label' => '実施場所')); ?>
	<?php echo $this->Form->input('Project.people_maxnum', array('label' => '募集上限人数')); ?>
	<?php echo $this->Form->input('Project.detail_text', array('label' => '詳細文')); ?>
<?php echo $this->Form->end('登録'); ?>