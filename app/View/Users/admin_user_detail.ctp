<?php echo $this->Html->css(array('kkk'), null, array('inline'=>false)); ?>
<div id="use_container" class="clearfix">
	<div id ="g1">
		<div id="title" class="clearfix">
			<h1>ユーザ詳細 - <?php echo h($user['User']['user_name']); ?></h1>
		</div>
		<?php echo $this->element('admin_user_detail'); ?>
		<?php echo $this->element('admin_user_project_detail'); ?>
		<div id="btn_area" class="clearfix">
			<div id="btn1">
				<?php echo $this->Html->image('use/002.png',array('url'=>array('controller'=>'users','action'=>'admin_userUpdate/'.$user['User']['id']),'alt'=>'更新'));?>
			</div>
			<div id="btn2">
				<?php echo $this->Html->image('use/003.png',array('url'=>array('controller'=>'users','action'=>'admin_userDelete/'.$user['User']['id']),'alt'=>'削除'));?>
			</div>
			<div id="btn3">
				<?php echo $this->Html->image('use/005.png',array('url'=>array('controller'=>'projects','action'=>'admin_projectRegist/'.$user['User']['id']),'alt'=>'新規企画'));?>
			</div>
			<div id="btn4">
				<?php echo $this->Html->image('use/001.png',array('url'=>array('controller'=>'users','action'=>'admin_index'),'alt'=>'戻る'));?>
			</div>
			<div>
				<?php echo $this->Html->link('企画参加','/admin/projects/projectJoinIn/'.$user['User']['id'],array()); ?>
			</div>
		</div>
	</div>
	<?php echo $this->element('admin_menu'); ?>
</div>