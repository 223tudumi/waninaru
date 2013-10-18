<div id="use_container" class="clearfix">
	<div id ="g1">
		<div id="title" class="clearfix">
			<h1>ユーザ削除確認画面 - <?php echo h($user['User']['user_name']); ?></h1>
		</div>
		<?php echo $this->element('admin_user_detail'); ?>
		<?php echo $this->element('admin_user_project_detail'); ?>
		<div id="btn_area" class="clearfix">
				<div id="btn1">
					<?php echo $this->Form->submit('../img/use/003.png',array('alt'=>'削除','border'=>'0'))?>
				</div>
				<div id="btn2">
					<?php echo $this->Html->image('use/001.png',array('url'=>array('controller'=>'users','action'=>'admin_userDetail/'.$user['User']['id']),'alt'=>'戻る'));?>
				</div>
			</div>
	</div>
	<?php echo $this->element('admin_menu'); ?>
</div>