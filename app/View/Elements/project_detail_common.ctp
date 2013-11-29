<?php echo $this->Form->create('Project',array('inputDefaults' => array('label' => false,'div' => false))); ?>
      <ul>
        <li><dl class="clearfix">
          <dt><span>企画タイトル</span></dt>
          <dd>
            <span class="form_area pt_10"><?php echo h($project['project_name']); ?><?php echo $this->Form->hidden('project_name',array('value'=>$project['project_name'])); ?></span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>開催日時</span></dt>
          <dd>
            <span class="form_area pt_10"><?php
            echo $project['active_date']['year'].'年 '.$project['active_date']['month'].'月 '.$project['active_date']['day'].'日 '.$project['active_date']['hour'].': '.$project['active_date']['min'];
            ?><?php echo $this->Form->hidden('active_date',array('value'=>$project['active_date'])); ?></span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>参加締切の日時</span></dt>
          <dd>
            <span class="form_area pt_10"><?php
            echo $project['recrouit_date']['year'].'年 '.$project['recrouit_date']['month'].'月 '.$project['recrouit_date']['day'].'日 '.$project['recrouit_date']['hour'].': '.$project['recrouit_date']['min'];
            ?><?php echo $this->Form->hidden('recrouit_date',array('value'=>$project['recrouit_date'])); ?></span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>参加者の人数</span></dt>
          <dd>
            <span class="form_area pt_10"><?php echo h($project['people_maxnum']); ?><?php echo $this->Form->hidden('people_maxnum',array('value'=>$project['people_maxnum'])); ?>人</span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>開催場所</span></dt>
          <dd>
            <span class="form_area pt_10"><?php echo h($project['active_place']); ?><?php echo $this->Form->hidden('active_place',array('value'=>$project['active_place'])); ?></span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>企画の内容</span></dt>
          <dd>
            <span class="form_area pt_10"><?php echo $project['detail_text']; ?><?php echo $this->Form->hidden('detail_text',array('value'=>$project['detail_text'])); ?></span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>イメージ画像</span></dt>
          <dd>
            <span class="form_area pt_10"><?php echo $this->Html->image("projects/".$project['image_file_name'],array('alt' =>$project['image_file_name'],'width'=>'200','height'=>'200')); ?><?php echo $this->Form->hidden('image_file_name',array('value'=>$project['image_file_name'])); ?></span>
          </dd>
        </dl></li>
      </ul>
      <div id="submit_btn_container" class="clearfix">
      	<span id="submit_left"><?php echo $this->Html->image('common/project/form02_back.jpg',array('width'=>'170','onClick'=>'history.go(-1)','alt'=>'修正')); ?></span>
		<span id="submit_right"><?php echo $this->Form->submit('common/project/form02_submit.jpg',array('type'=>'submit','width'=>'170','name'=>'mode')); ?>
		<?php echo $this->Form->hidden('hidden',array('value'=>'complete')); ?></span>
      </div><!-- end submit_btn_container -->
<?php echo $this->Form->end(); ?>