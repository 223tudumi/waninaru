<h2 id="idea_top_title"><span>アイデアを投稿する</span></h2>

<div id="idea_post_container">

  <div id="post_area">
      <?php echo $this->Form->create('Icomment', array('inputDefaults' => array('label' => false,'div' => false))); ?>
      <textarea name="idea_comment">
      <?php echo $this->Form->input('Icomment.icomment_text',array('class'=>'comment_width','wrap'=>'hard')); ?>
      <?php echo $this->Form->hidden('Icomment.idea_id'); ?></textarea>      
      <span><?php echo $this->Form->submit('/ideas/submit_btn.jpg',array('name'=>'idea_comment_submit_btn')); ?></span>
    <?php echo $this->Form->end() ?>
  </div><!-- end post_area -->

</div><!-- end idea_post_container -->

