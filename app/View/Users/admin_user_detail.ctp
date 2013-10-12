<h2>ユーザ詳細画面 - <?php echo h($user['User']['user_name']); ?></h2>
<?php echo $this->element('admin_menu'); ?>
<div>
<table>
	<tr>
		<th>ID</th>
		<td><?php echo h($user['User']['id']); ?></td>
	</tr>
	<tr>
		<th>学籍番号</th>
		<td><?php echo h($user['User']['student_number']); ?></td>
		<th>本名</th>
		<td><?php echo h($user['User']['real_name']); ?></td>
	</tr>
	<tr>
		<th>ユーザ名</th>
		<td><?php echo h($user['User']['user_name']); ?></td>
		<th>パスワード</th>
		<td><?php echo h($user['User']['user_password']); ?></td>
	</tr>
</table>
</div>
<div>
<table>
	<tr>
		<th>企画ID</th>
		<th>企画名</th>
		<th>詳細</th>
	</tr>
	<?php foreach ($user['userProject'] as $project) : ?>
	<tr>
		<td><?php echo h($project['id']); ?></td>
		<td><?php echo h($project['project_name']); ?></td>
		<td><?php echo $this->Html->link('詳細','/admin/projects/projectDetail/'.$project['id']); ?></td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
<?php echo $this->Form->button('戻る',array('onclick' => " location.href = '/waninaru/admin/users' ")); ?>
<?php echo $this->Form->button('更新',array('onclick' => " location.href = '/waninaru/admin/users/userUpdate/".$user['User']['id']."'" )); ?>
<?php echo $this->Form->button('企画投稿',array('onclick' => " location.href = '/waninaru/admin/projects/projectRegist/".$user['User']['id']."'" )); ?>
<?php echo $this->Form->button('削除',array('onclick' => " location.href = '/waninaru/admin/users/userDelete/".$user['User']['id']."'" )); ?>
