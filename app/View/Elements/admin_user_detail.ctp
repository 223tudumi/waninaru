<TABLE width="100%" border="1">
	<colgroup span="1" style="background-color: #e3f0fb"></colgroup>
	<colgroup span="1" style="background-color: #fffff"></colgroup>
	<colgroup span="1" style="background-color: #e3f0fb"></colgroup>
	<tr>
		<th>ID</th>
		<td><?php echo h($user['User']['id']); ?></td>
	</tr>
	<tr>
		<th>学籍番号</th>
		<td><?php echo h($user['User']['student_number']); ?></td>
		<th>本名</th>
		<td><?php echo h($user['User']['student_number']); ?></td>
	</tr>
	<tr>
		<th>ユーザ名</th>
		<td><?php echo h($user['User']['user_name']); ?></td>
		<th>パスワード</th>
		<td><?php echo h($user['User']['user_password']); ?></td>
	</tr>
</TABLE>