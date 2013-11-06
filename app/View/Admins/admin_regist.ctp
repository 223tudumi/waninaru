<div id="new_container" class="clearfix">
	<div id="g1">
		<div id="title" class="clearfix">
			<h1>管理者新規登録入力</h1>
		</div>
		<?php echo $this->Form->create('Post',array('inputDefaults' => array('label' => false,'div' => false))); ?>
			<table width="100%" border="1">
			<colgroup span="1" style="background-color: #e3f0fb"></colgroup>
			<colgroup span="1" style="background-color: #fffff"></colgroup>
			<colgroup span="1" style="background-color: #e3f0fb"></colgroup>
			<colgroup span="1" style="background-color: #fffff"></colgroup>
			<tr>
				<th>ID</th>
				<td><?php echo $this->Form->input('Admin.username', array('type' => 'text','size'=>'50px')); ?></td>
				<th>パスワード</th>
				<td><?php echo $this->Form->input('Admin.password', array('type' => 'password','size'=>'50px')); ?></td>
			</tr>
			</TABLE>
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
