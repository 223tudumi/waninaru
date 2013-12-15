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
        <p><span>：<?php 
			$num=0;
			echo print_r($ideain);
			foreach($ideain['IdeasBookmark'] as $books){
				$num++;
			}
			echo $num;
			?></span></p>
        <span><?php echo $this->Html->image('idea/fav_icon.jpg',array('alt'=>'ブックマーク')); ?></span>
      </div><!-- end idea_fav -->
    </div><!-- end idea_detail_status -->
  </div><!-- end clearfix -->

  <hr class="comment_hr" />

  <h3>コメントする</h3>
<?php foreach($ideacomments as $ideacomment): ?>
  <div class="idea_detail_comment">
    <p><span>
      <?php echo h($ideacomment['Icomment']['comment_text']); ?>      
    </span></p>
  </div><!-- end idea_detail_comment -->
 <?php endforeach; ?>

  <hr class="comment_hr" />

  <div id="post_comment_container">
    <?php echo $this->Form->create('Icomment', array('inputDefaults' => array('label' => false,'div' => false))); ?>
      
      <?php echo $this->Form->input('Icomment.comment_text',array('style'=>'width:660px;height:200px','class'=>'comment_width','wrap'=>'hard')); ?>
      <?php echo $this->Form->hidden('Icomment.idea_id'); 
      		echo $this->Form->hidden('Icomment.user_id');?>    
      <span><?php echo $this->Form->submit('送信'); ?></span>
    <?php echo $this->Form->end() ?>
  </div><!-- end post_comment_container -->
</div><!-- end idea_detail_container -->


<!-- 編集ここまで  -->
