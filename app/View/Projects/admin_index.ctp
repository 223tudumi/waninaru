<h2>企画検索一覧画面</h2>
<div>
	<?php echo $this->Html->link('ユーザ検索一覧' , array('controller'=>'users' , 'action'=>'admin_index') ) ?>
	<?php echo $this->Html->link('ユーザ新規登録' , array('controller'=>'users' , 'action'=>'admin_userRegist') ) ?>
	<?php echo $this->Html->link('企画検索一覧' , array('controller'=>'projects' , 'action'=>'admin_index') ) ?>
</div>
<table>
	<tr>
		<th>ID</th>
		<th>企画名</th>
		<th>投稿者名</th>
		<th>実施日</th>
		<th>詳細</th>
	</tr>
	<?php foreach ($projects as $project) : ?>
		<tr>
			<td><?php echo h($project['Project']['id']); ?></td>
			<td><?php echo h($project['Project']['project_name']); ?></td>
			<td><?php foreach ($project['projectUser'] as $producer){ echo h($producer['real_name']); } ?></td>
			<td><?php echo h($project['Project']['active_date']); ?></td>
			<td><?php echo $this->Html->link('詳細','/admin/projects/projectDetail/'.$project['Project']['id']); ?></td>
		</tr>
	<?php endforeach; ?>
</table>