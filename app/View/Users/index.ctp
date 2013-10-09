<html>
<head>
</head>
<body>
<h2>ユーザ一覧</h2>
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
			<td><?php echo h($user['User']['student_id']); ?></td>
			<td><?php echo h($user['User']['real_name']); ?></td>
			<td><?php echo h($user['User']['user_name']); ?></td>
			<td><input type = "button" value="詳細"></td>
		</tr>
	<?php endforeach; ?>
</table>
</body>
</html>