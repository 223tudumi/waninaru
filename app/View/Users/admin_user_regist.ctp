<?php echo $this->Html->css(array('kkk'), null, array('inline'=>false)); ?>
<div id="new_container" class="clearfix">
	<div id="g1">
		<div id="title" class="clearfix">
			<h1>ユーザ新規登録入力</h1>
		</div>
		<?php echo $this->Form->create('Post',array('inputDefaults' => array('label' => false,'div' => false))); ?>
			<?php echo $this->element('admin_user_form'); ?>
			<div id="btn_area" class="clearfix">
				<div id="btn1">
					<?php echo $this->Form->submit('../img/use/004.png',array('alt'=>'完了','border'=>'0'))?>
				</div>
				<div id="btn2">
					<?php echo $this->Html->image('use/001.png',array('url'=>array('controller'=>'users','action'=>'admin_index'),'alt'=>'戻る'));?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
	<?php echo $this->element('admin_menu'); ?>
</div>
