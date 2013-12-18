<?php
echo $this->Html->css(array('idea'), null, array('inline'=>false));
?>

<h2 id="idea_top_title"><span>アイデアを投稿する</span></h2>

<div id="idea_post_container">

  <div id="post_area">
<?php echo $this->Form->create('Idea', array('inputDefaults' => array('label' => false,'div' => false))); ?>
        <?php echo $this->Form->input('Idea.idea_text',array('class'=>'comment_width','wrap'=>'hard')); ?>
    	<?php //echo $this->Form->hidden('User.user_id'); ?>
    	<span>
    	<?php echo $this->Form->submit('idea/submit_btn.jpg',array("div"=>false,"escape"=>false,'type'=>'submit')); ?>
    	</span>
<?php echo $this->Form->end()?>
  </div><!-- end post_area -->

</div><!-- end idea_post_container -->

