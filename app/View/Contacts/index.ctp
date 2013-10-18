<h2>お問い合わせ</h2>
<p>名前、メールアドレス、お問い合わせ内容を入力してください。</p>
	
<?php echo $xformjp->create('Contact', array('type' => 'post', 'controller'=>'contact', 'action' => '.')); ?>
<?php echo $this->element('contact_input'); ?>
<?php echo $xformjp->submit('確認', array('name' => 'confirm', 'div' => false)); ?>
<?php echo $xformjp->end(); ?>