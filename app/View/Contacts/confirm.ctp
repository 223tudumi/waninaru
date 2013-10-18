<h2>お問い合わせ</h2>
<p>下記の入力内容を確認してください。</p>
	
<?php echo $xformjp->create('Contact', array('type' => 'post', 'controller'=>'contact', 'action' => '.')); ?>
<?php echo $formhidden->hiddenVars(); ?>
<?php echo $this->element('contact_input'); ?>
<?php echo $xformjp->submit('戻る', array('name' => 'back', 'div' => false)); ?>
<?php echo $xformjp->submit('送信', array('name' => 'finish', 'div' => false)); ?>
<?php echo $xformjp->end(); ?>