<div id="contact_container">
	<h2><span>送信確認</span></h2>
	<div id="flow_image_area">
		<?php echo $this->Html->image('inquiry/contact_flow02.jpg',array('width'=>'700','alt'=>'')); ?>
	</div><!-- end flow_image_area -->
	<?php echo $this->Form->create('Inquiry',array('inputDefaults' => array('label' => false,'div' => false))); ?>
		<div id="form_main_area"><ul>
			<li><dl class="clearfix">
				<dt>名前</dt>
				<dd><?php echo h($inquiry['name']); ?><?php echo $this->Form->hidden('name',array('value'=>$inquiry['name'])); ?></dd>
			</dl></li>
			<li><dl class="clearfix">
				<dt>メールアドレス</dt>
				<dd>ne<?php echo h($inquiry['mail']); ?>@senshu-u.jp<?php echo $this->Form->hidden('mail',array('value'=>$inquiry['mail'])); ?></dd>
			</dl></li>
			<li><dl class="clearfix">
				<dt>項目</dt>
				<dd><?php echo h($inquiry['category']); ?><?php echo $this->Form->hidden('category',array('value'=>$inquiry['category'])); ?></dd>
			</dl></li>
			<li><dl class="clearfix">
				<dt>お問い合わせ内容</dt>
				<dd><?php echo h($inquiry['body']); ?><?php echo $this->Form->hidden('body',array('value'=>$inquiry['body'])); ?></dd>
			</dl></li>
		</ul></div><!-- form_main_area -->
		<div id="form_btn_area">
			<?php echo $this->Html->image('inquiry/form02_back.jpg',array('width'=>'170','onClick'=>'history.go(-1)','alt'=>'修正')); ?>&nbsp;&nbsp;<?php echo $this->Form->submit('inquiry/form02_submit.jpg',array('type'=>'submit','width'=>'270','name'=>'mode')); ?>
			<?php echo $this->Form->hidden('hidden',array('value'=>'complete')); ?>
		</div><!-- end form_btn_area -->
	<?php echo $this->Form->end(); ?>
</div><!-- end contact_container -->