<div id="table_area" class="clearfix">
	<TABLE width="100%" border="1">
		<tr bgcolor="#e3f0fb">
			<td>企画ID</td>
			<td>企画名</td>
			<td>詳細</td>
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