<h2>ユーザ検索一覧画面</h2>
<div>
	<?php echo $this->Html->link('ユーザ検索一覧' , array('controller'=>'users' , 'action'=>'admin_index') ) ?>
	<?php echo $this->Html->link('ユーザ新規登録' , array('controller'=>'users' , 'action'=>'admin_userRegist') ) ?>
</div>
<table>
	<tr>
		<th>ID</th>
		<th>学籍番号</th>
		<th>本名</th>
		<th>ユーザ名</th>
		<th>詳細</th>
	</tr>
	<?php foreach ($users as $user) : ?>
		<tr>
			<td><?php echo h($user['User']['id']); ?></td>
			<td><?php echo h($user['User']['student_number']); ?></td>
			<td><?php echo h($user['User']['real_name']); ?></td>
			<td><?php echo h($user['User']['user_name']); ?></td>
			<td><?php echo $this->Html->link('詳細','/admin/users/userDetail/'.$user['User']['id']); ?></td>
		</tr>
	<?php endforeach; ?>
</table>