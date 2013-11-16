<?php echo $this->Html->css(array('kkk'), null, array('inline'=>false)); ?>
<div id="use_container" class="clearfix">
	<div id="g1">
		<div id="title" class="clearfix">
			<h1>企画詳細 - <?php echo h($project['Project']['project_name']); ?></h1>
		</div>
		
		<div id="subtitle" class="clearfix">
			<h2>企画概要</h2>
		</div>
		
		<TABLE width="100%" border="1">
			<colgroup width="20%"></colgroup>
			<colgroup span="1" width="20%" style="background-color: #e3f0fb"></colgroup>
			<colgroup span="1" width="60%"</colgroup>
			<tr>
				<td rowspan="6"><?php echo $this->Html->image("projects/".$project['Project']['image_file_name'],array('alt' =>$project['Project']['image_file_name'],'width'=>'200','height'=>'200')); ?></td>
			</tr>
			<tr height="40px" >
				<th>ID</th>
				<td><?php echo h($project['Project']['id']); ?></td>
			</tr>
			<tr height="40px" >
				<th>企画名</th>
				<td><?php echo h($project['Project']['project_name']); ?></td>
			</tr>
			<tr height="40px" >
				<th>企画者</th>
				<td><?php foreach ($project['projectUser'] as $producer){ echo h($producer['real_name']); } ?></td>
			</tr>
			<tr height="40px" >
				<th>募集期限</th>
				<td><?php echo h($project['Project']['recrouit_date']); ?></td>
			</tr>
			<tr height="40px" >
				<th>実施日</th>
				<td><?php echo h($project['Project']['active_date']); ?></td>
			</tr>
		</TABLE>
		
		<div id="table_area" class="clearfix">
			<div id="subtitle" class="clearfix"
				<h2>企画詳細</h2>
			</div>
			<TABLE width="100%" border="1">
			<colgroup span="1" width="20%" style="background-color: #e3f0fb"></colgroup>
			<colgroup span="1" width="30%" style="background-color: #ffffff"></colgroup>
			<colgroup span="1" width="20%" style="background-color: #e3f0fb"></colgroup>
			<colgroup span="1" width="30%" style="background-color: #ffffff"></colgroup>
			<tr>
				<th>上限人数</th>
				<td><?php echo h($project['Project']['people_maxnum']); ?></td>
				<th>実施場所</th>
				<td><?php echo h($project['Project']['active_place']); ?></td>
			</tr>
			<tr>
				<th>企画詳細文</th>
				<td colspan="3"><?php echo $project['Project']['detail_text']; ?></td>
			</tr>
			</table>
		</div>
		
		<div id="table_area" class="clearfix">
			<div id="subtitle" class="clearfix"
				<h2>参加者</h2>
			</div>
			<TABLE width="100%" border="1">
			<colgroup span="1" width="20%" style="background-color: #e3f0fb"></colgroup>
			<colgroup span="1" width="30%" style="background-color: #ffffff"></colgroup>
			<colgroup span="1" width="20%" style="background-color: #e3f0fb"></colgroup>
			<colgroup span="1" width="30%" style="background-color: #ffffff"></colgroup>
			<?php foreach($project['projectJoiner'] as $joiner) : ?>
			<tr>
				<th>学籍番号</th>
				<td><?php echo h($joiner['User']['student_number']); ?></td>
				<th>本名</th>
				<td><?php echo h($joiner['User']['real_name']); ?></td>
			</tr>
			<?php endforeach; ?>
			</table>
		</div>
		
		<div id="btn_area" class="clearfix">
			<?php echo $this->Form->button('戻る',array('onclick' => " location.href = '/admin/projects' ")); ?>
			<?php echo $this->Form->button('更新',array('onclick' => " location.href = '/admin/projects/projectUpdate/".$project['Project']['id']."'")); ?>
			<?php echo $this->Form->button('削除',array('onclick' => " location.href = '/admin/projects/projectDelete/".$project['Project']['id']."'" )); ?>
		</div>
	</div>
	<?php echo $this->element('admin_menu'); ?>
</div>