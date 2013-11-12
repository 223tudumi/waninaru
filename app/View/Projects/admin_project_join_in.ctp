<?php echo $this->Html->css(array('kkk'), null, array('inline'=>false)); ?>
<div id="kousin_container" class="clearfix">
	<div id ="g1">
		<div id="title" class="clearfix">
			<h1>企画参加</h1>
		</div>
		<?php echo $this->Form->create('Post',array('inputDefaults' => array('label' => false,'div' => false))); ?>
		<?php echo $this->Form->input('JoinersProject.joiner_id',array('type'=>'text')); ?>
		<?php echo $this->Form->input('JoinersProject.project_id',array('type'=>'text')); ?>
		<div id="btn_area" class="clearfix">
			<div id="btn1">
				<p><?php echo $this->Form->submit('../img/use/004.png',array('alt'=>'完了','border'=>'0'))?></p>
			</div>
			<div id="btn2">
				<p><?php echo $this->Html->image('use/001.png',array('url'=>array('controller'=>'projects','action'=>'admin_index'),'alt'=>'戻る'));?></p>
			</div>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
	<?php echo $this->element('admin_menu'); ?>
</div>