<h2 id="idea_top_title"><span>アイデア</span></h2>


<div id="idea_top_container">


  <ul class="clearfix">
<?php foreach($idealists as $idealist): ?>
    <li><dl>
    <dd>
      <?php echo h($idealist['Idea']['idea_text']); ?>
    </dd>
    <dt class="clearfix">
      <span class="idea_block_date">
        <?php echo h($idealist['Idea']['created']); ?>
      </span>
      <span class="idea_block_name">
        <?php echo h($idealist['ideaUser']['user_name']); ?>
      </span>
      <hr />
      <span class="more_area">
        <?php echo $this->Html->link('詳しく見る','/ideas/'.$idealist['Idea']['id']); ?>
        <a href="#" title="詳しく見る">&gt;&gt;詳しく見る</a>
      </span>
    </dt>
    </dl></li>
<?php endforeach; ?>
  <ul>

</div><!-- end idea_top_container -->

<div id="idea_page_container">
    <ul class="clearfix">
      <li><a href="#" title="前へ"><img src="./images/common/list_left.jpg" alt="前へ" height="30" /></a></li>
      <li class="middle"><span>1</span></li>
      <li class="middle"><a href="#" title="">2</a></li>
      <li class="middle"><a href="#" title="">3</a></li>
      <li><a href="#" title="次へ"><img src="./images/common/list_right.jpg" alt="次へ" height="30" /></a></li>
    </ul>
</div><!-- end idea_page_container -->





<div id="idea_top_form">
  <div id="idea_top_form_inner">
    <p>アイディアを投稿する</p>
<?php echo $this->Form->create('Idea', array('inputDefaults' => array('label' => false,'div' => false))); ?>
        <textarea name="idea_post">
        <?php $this->Form->input('Idea.idea_text'); ?>
        </textarea>
    	<span>
    	<?php echo $this->Form->submit('/ideas/submit_btn.jpg',array('name'=>'idea_submit_btn')); ?>
    	<?php echo $this->Form->hidden('ideasUser.user_id'); ?>
    	</span>
<?php echo $this->Form->end()?>
  </div><!-- end idea_top_form_inner -->
</div><!-- end idea_top_form -->


<!-- 編集ここまで  -->

