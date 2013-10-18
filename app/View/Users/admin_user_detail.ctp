<h2>ユーザ詳細画面 - <?php echo h($user['User']['user_name']); ?></h2>
<div>
	<?php echo $this->Html->link('ユーザ検索一覧' , array('controller'=>'users' , 'action'=>'admin_index') ) ?>
	<?php echo $this->Html->link('ユーザ新規登録' , array('controller'=>'users' , 'action'=>'admin_userRegist') ) ?>
</div>
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
<?php echo $this->Form->button('戻る',array('onclick' => " location.href = '/waninaru/admin/users' ")); ?>
<?php echo $this->Form->button('更新',array('onclick' => " location.href = '/waninaru/admin/users/userUpdate/".$user['User']['id']."'" )); ?>
<?php echo $this->Form->button('企画投稿',array('onclick' => " location.href = '/waninaru/admin/projects/projectRegist/".$user['User']['id']."'" )); ?>
<?php echo $this->Form->button('削除',array('onclick' => " location.href = '/waninaru/admin/users/userDelete/".$user['User']['id']."'" )); ?>
