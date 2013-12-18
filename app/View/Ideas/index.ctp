<?php
echo $this->Html->css(array('idea'), null, array('inline'=>false));
?>

<h2 id="idea_top_title"><span>アイデア</span></h2>


<div id="idea_top_container">


  <ul class="clearfix">


  <ul class="clearfix">
<?php foreach($idealists as $idealist): ?>
    <li><dl>
    <dd>
      <?php echo h($idealist['Idea']['idea_text']); ?>
      <?php //echo print_r($idealist['User']); ?>
    </dd>
    <dt class="clearfix">
      <span class="idea_block_date">
        <?php echo h($idealist['Idea']['created']); ?>
      </span>
      <span class="idea_block_name">
        <?php echo h($idealist['User']['user_name']); ?>
      </span>
      <hr />
      <span class="more_area">
        <?php echo $this->Html->link('詳しく見る','/ideas/detail/'.$idealist['Idea']['id']); ?>
      </span>
    </dt>
    </dl></li>
<?php endforeach; ?>


  <ul>

</div><!-- end idea_top_container -->

<div id="idea_page_container">
    <ul class="clearfix">
<!--      <li><a href="#" title="前へ"><img src="./images/common/list_left.jpg" alt="前へ" height="30" /></a></li> -->
      <li class="middle"><?php echo $this->Paginator->numbers(); ?></li>
<!--      <li><a href="#" title="次へ"><img src="./images/common/list_right.jpg" alt="次へ" height="30" /></a></li> -->
    </ul>
</div><!-- end idea_page_container -->





<div id="idea_top_form">
  <div id="idea_top_form_inner">
    <p>アイディアを投稿する</p>
<?php echo $this->Form->create('Idea', array('inputDefaults' => array('label' => false,'div' => false))); ?>
        <?php echo $this->Form->input('Idea.idea_text',array('class'=>'comment_width','wrap'=>'hard')); ?>
    	<?php //echo $this->Form->hidden('User.user_id'); ?>
    	<span>
    	<?php echo $this->Form->submit('idea/submit_btn.jpg',array("div"=>false,"escape"=>false,'type'=>'submit')); ?>
    	</span>
<?php echo $this->Form->end()?>
  </div><!-- end idea_top_form_inner -->
</div><!-- end idea_top_form -->


<!-- 編集ここまで  -->
