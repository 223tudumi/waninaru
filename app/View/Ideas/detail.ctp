<!-- ここから編集してください！！！！  -->
<?php
echo $this->Html->css(array('idea'), null, array('inline'=>false));
?>

<div id="idea_detail_container">

  <div class="clearfix">
    <div id="idea_detail_main"><p>
      <?php echo h($ideain['Idea']['idea_text']); ?>
      <span id="idea_post_date">
      <?php echo h($ideain['Idea']['created']); ?>
      </span>
    </p></div><!-- end idea_detail_main -->

    <div id="idea_detail_status">
      <div id="idea_fav">
        <p><span>：7</span></p><?php //ブクマ数。カウント内容未定ー。 ?>
        <span><a href="#" title="ブックマーク"><?php echo $this->Html->image('idea/bkm_btn.jpg',array('alt'=>'ブックマーク')); ?></a></span>
      </div><!-- end idea_fav -->
    </div><!-- end idea_detail_status -->
  </div><!-- end clearfix -->

  <hr class="comment_hr" />

  <h3>コメントする</h3>
<?php foreach($idcoms as $idcom): ?>
  <div class="idea_detail_comment">
    <p><span>
      <?php echo h($idcom['Icomment']['detail_text']) ?>      
    </span></p>
  </div><!-- end idea_detail_comment -->
 <?php endforeach; ?>

  <hr class="comment_hr" />

  <div id="post_comment_container">
    <?php echo $this->Form->create('Icomment', array('inputDefaults' => array('label' => false,'div' => false))); ?>
      
      <?php echo $this->Form->input('Icomment.icomment_text',array('style'=>'width:660px;height:200px','class'=>'comment_width','wrap'=>'hard')); ?>
      <?php echo $this->Form->hidden('Icomment.idea_id'); ?>    
      <span><?php echo $this->Form->submit('送信'); ?></span>
    <?php echo $this->Form->end() ?>
  </div><!-- end post_comment_container -->
</div><!-- end idea_detail_container -->


<!-- 編集ここまで  -->
