<h2>ユーザ削除確認画面 - <?php echo h($user['User']['user_name']); ?></h2>
<?php echo $this->Form->create('Get'); ?>
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
</table>
</div>
<?php echo $this->Form->end('削除'); ?>