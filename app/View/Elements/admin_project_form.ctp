<TABLE width="100%" border="1"
	<tr>
		<th>企画名</th>
		<td colspan="3"><?php echo $this->Form->input('Project.project_name', array('size'=>'100px')); ?></td>
	</tr>
	<tr>
		<th>企画者ID</th>
		<td><?php echo $this->Form->input('ProjectsUser.user_id', array('type' => 'text')); ?></td>
	</tr>
	<tr>
		<th>募集期限</th>
		<td><?php echo $this->Form->input('Project.recrouit_date', array('size'=>'50px')); ?></td>
		<th>実施日</th>
		<td><?php echo $this->Form->input('Project.active_date', array('size'=>'50px')); ?></td>
	</tr>
	<tr>
		<th>参加人数上限人数</th>
		<td><?php echo $this->Form->input('Project.people_maxnum', array('size'=>'50px')); ?></td>
		<th>実施場所</th>
		<td><?php echo $this->Form->input('Project.active_place', array('size'=>'50px')); ?></td>
	</tr>
</TABLE>
<div id="submit_area">
	<p><?php echo $this->Form->input('Project.image_file_name', array('type' => 'file','size'=>'100px')); ?></p>
	<p>＜企画詳細文＞<br>
	<?php echo $this->Form->input('Project.detail_text', array('cols'=>'120','rows'=>'8')); ?>
	</p>
</div>