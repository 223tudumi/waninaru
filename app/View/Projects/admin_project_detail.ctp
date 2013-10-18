<h2>企画詳細画面 - <?php echo h($project['Project']['project_name']); ?></h2>
<?php echo $this->element('admin_menu'); ?>
<div>
<h3>企画概要</h3>
<table>
	<tr>
		<td rowspan=5 width=150><?php echo $this->Html->image("projects/".$project['Project']['image_file_name'],array('alt' =>$project['Project']['image_file_name'],'width'=>'150','height'=>'150')); ?></td>
		<th>No.</th>
		<td><?php echo h($project['Project']['id']); ?></td>
	</tr>
	<tr>
		<th>企画名</th>
		<td><?php echo h($project['Project']['project_name']); ?></td>
	</tr>
	<tr>
		<th>企画者名</th>
		<td><?php foreach ($project['projectUser'] as $producer){ echo h($producer['real_name']); } ?></td>
	</tr>
	<tr>
		<th>募集期限</th>
		<td><?php echo h($project['Project']['recrouit_date']); ?></td>
	</tr>
	<tr>
		<th>実施日</th>
		<td><?php echo h($project['Project']['active_date']); ?></td>
	</tr>
</table>
<h3>企画詳細</h3>
<table>
	<tr>
		<th>実施場所</th>
		<td><?php echo h($project['Project']['active_place']); ?></td>
		<th>参加上限人数</th>
		<td><?php echo h($project['Project']['people_maxnum']); ?></td>
	</tr>
	<tr>
		<th>詳細</th>
		<td colspan="3"><?php echo h($project['Project']['detail_text']); ?></td>
	</tr>
</table>
</div>
<?php echo $this->Form->button('戻る',array('onclick' => " location.href = '/waninaru/admin/projects' ")); ?>
<?php echo $this->Form->button('削除',array('onclick' => " location.href = '/waninaru/admin/projects/projectDelete/".$project['Project']['id']."'" )); ?>