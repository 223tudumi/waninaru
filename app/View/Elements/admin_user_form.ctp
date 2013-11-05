<table width="100%" border="1">
	<colgroup span="1" style="background-color: #e3f0fb"></colgroup>
	<colgroup span="1" style="background-color: #fffff"></colgroup>
	<colgroup span="1" style="background-color: #e3f0fb"></colgroup>
	<colgroup span="1" style="background-color: #fffff"></colgroup>
	<tr>
		<th>学籍番号</th>
		<td>ne<?php echo $this->Form->input('User.student_number', array('type' => 'text','size'=>'47px')); ?></td>
		<th>本名</th>
		<td><?php echo $this->Form->input('User.real_name', array('type' => 'text','size'=>'50px')); ?></td>
	</tr>
	<tr>
		<th>ユーザ名</th>
		<td><?php echo $this->Form->input('User.user_name', array('type' => 'text','size'=>'50px')); ?></td>
		<th>パスワード</th>
		<td><?php echo $this->Form->input('User.user_password', array('type' => 'password','size'=>'50px')); ?></td>
	</tr>
</TABLE>