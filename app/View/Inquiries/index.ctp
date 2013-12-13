<?php
echo $this->Html->css(array('contact'), null, array('inline'=>false));
echo $this->assign('title', 'Waninaru - お問い合わせ ');
?>
<div id="contact_container">
	<h2><span>お問い合わせ</span></h2>
	<div id="flow_image_area">
		<?php echo $this->Html->image('../img/inquiry/contact_flow01.jpg',array('width'=>'700')); ?>
	</div><!-- end flow_image_area -->
	<?php echo $this->Form->create('Inquiry',array('inputDefaults' => array('label' => false,'div' => false))); ?>
		<div id="form_main_area"><ul>
			<li><dl class="clearfix">
				<dt>名前</dt>
				<dd><?php echo $this->Form->input('Inquiry.name',array('class'=>'mid_width','type'=>'text'));?></dd>
			</dl></li>
			<li><dl class="clearfix">
				<dt>メールアドレス</dt>
				<dd><span>ne</span><?php echo $this->Form->input('Inquiry.mail',array('class'=>'mid_width','type'=>'text','maxlength'=>'6'));?><span>@senshu-u.jp</span></dd>
			</dl></li>
			<li><dl class="clearfix">
				<dt>項目</dt>
				<dd><?php
					$val_array = array('企画について', 'アカウントについて', 'サイトについて','その他');
					echo $this->Form->input('Inquiry.category', array('type' => 'select', 'options' => $val_array)); ?>
			</dl></li>
			<li><dl class="clearfix">
				<dt>お問い合わせ内容</dt>
				<dd><?php echo $this->Form->textarea('Inquiry.body', array('class'=>'mid_textarea','cols' => 40, 'rows' => 10)); ?></dd>
			</dl></li>
		</ul></div><!-- form_main_area -->
		<div id="form_btn_area">
			<?php echo $this->Form->submit('../img/inquiry/form01_btn.jpg',array('type'=>'submit','width'=>'270','name'=>'mode','value'=>'confirm'))?>
			<?php echo $this->Form->hidden('hidden',array('value'=>'confirm')); ?>
		</div><!-- end form_btn_area -->
	<?php echo $this->Form->end() ;?>
</div><!-- end contact_container -->