<!-- ここから編集してください！！！！  -->


<h2 id="idea_top_title"><span>アイデア</span></h2>


<div id="idea_top_container">
  
  <div id="idea_top_form">
  	<div id="idea_top_form_inner">
  	  <p>アイディアを投稿する</p>
  	  <form><?php echo $this->Form->create('Idea', array('inputDefaults' => array('label' => false,'div' => false))); ?>
        <textarea name="idea_post"></textarea>
    	<span><?php echo $this->Form->submit('/ideas/submit_btn.jpg',array('name'=>'idea_submit_btn')); ?>
    	<?php echo $this->Form->hidden('ideasUser.user_id'); ?>
    	</span>
  	  </form><?php echo $this->Form->end()?>
  	</div><!-- end idea_top_form_inner -->
  </div><!-- end idea_top_form -->
  
<?php foreach($idealists as $idealist):?>
  <div class="block_container position01">
    <div class="block_text_area">
      <?php echo h($idealist['Idea']['idea_text']);//アイデア本文 ?>
    </div><!-- end block_text_area -->
    <div class="block_detail_area clearfix">
      <p class="idea_block_date">
        <?php echo h($idealist['Idea']['idea_created']);//更新時間 ?>
      </p>
      <p class="idea_block_name">
        <?php echo h($idealist['ideasUser']['user_name']);//おなまえ ?>
      </p>
    </div><!-- end block_detail_area -->
    <hr />
    <span>
      <?php echo $this->Html->link('詳しく見る','/ideas/detail/'.$new['Idea']['id']); ?><a href="#" title="詳しく見る">&gt;&gt;詳しく見る</a>
    </span>
  </div><!-- end block_container -->
<?php endforeach; ?>

    <div class="block_container position02">
    <div class="block_text_area">
      テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテステストテストテストテストテストテストテストテスト
    </div><!-- end block_text_area -->
    <div class="block_detail_area clearfix">
      <p class="idea_block_date">
        2013/12/04 13:00
      </p>
      <p class="idea_block_name">
        テストユーザー
      </p>
    </div><!-- end block_detail_area -->
    <hr />
    <span>
      <a href="#" title="詳しく見る">&gt;&gt;詳しく見る</a>
    </span>
  </div><!-- end block_container -->

  <div class="block_container position03">
    <div class="block_text_area">
      テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテステストテストテストテストテストテストテストテスト
    </div><!-- end block_text_area -->
    <div class="block_detail_area clearfix">
      <p class="idea_block_date">
        2013/12/04 13:00
      </p>
      <p class="idea_block_name">
        テストユーザー
      </p>
    </div><!-- end block_detail_area -->
    <hr />
    <span>
      <a href="#" title="詳しく見る">&gt;&gt;詳しく見る</a>
    </span>
  </div><!-- end block_container -->

  <div class="block_container position04">
    <div class="block_text_area">
      テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテステストテストテストテストテストテストテストテスト
    </div><!-- end block_text_area -->
    <div class="block_detail_area clearfix">
      <p class="idea_block_date">
        2013/12/04 13:00
      </p>
      <p class="idea_block_name">
        テストユーザー
      </p>
    </div><!-- end block_detail_area -->
    <hr />
    <span>
      <a href="#" title="詳しく見る">&gt;&gt;詳しく見る</a>
    </span>
  </div><!-- end block_container -->

  <div class="block_container position05">
    <div class="block_text_area">
      テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテステストテストテストテストテストテストテストテスト
    </div><!-- end block_text_area -->
    <div class="block_detail_area clearfix">
      <p class="idea_block_date">
        2013/12/04 13:00
      </p>
      <p class="idea_block_name">
        テストユーザー
      </p>
    </div><!-- end block_detail_area -->
    <hr />
    <span>
      <a href="#" title="詳しく見る">&gt;&gt;詳しく見る</a>
    </span>
  </div><!-- end block_container -->

  <div class="block_container position06">
    <div class="block_text_area">
      テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテステストテストテストテストテストテストテストテスト
    </div><!-- end block_text_area -->
    <div class="block_detail_area clearfix">
      <p class="idea_block_date">
        2013/12/04 13:00
      </p>
      <p class="idea_block_name">
        テストユーザー
      </p>
    </div><!-- end block_detail_area -->
    <hr />
    <span>
      <a href="#" title="詳しく見る">&gt;&gt;詳しく見る</a>
    </span>
  </div><!-- end block_container -->

  <div class="block_container position07">
    <div class="block_text_area">
      テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテステストテストテストテストテストテストテストテスト
    </div><!-- end block_text_area -->
    <div class="block_detail_area clearfix">
      <p class="idea_block_date">
        2013/12/04 13:00
      </p>
      <p class="idea_block_name">
        テストユーザー
      </p>
    </div><!-- end block_detail_area -->
    <hr />
    <span>
      <a href="#" title="詳しく見る">&gt;&gt;詳しく見る</a>
    </span>
  </div><!-- end block_container -->

  <div class="block_container position08">
    <div class="block_text_area">
      テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテステストテストテストテストテストテストテストテスト
    </div><!-- end block_text_area -->
    <div class="block_detail_area clearfix">
      <p class="idea_block_date">
        2013/12/04 13:00
      </p>
      <p class="idea_block_name">
        テストユーザー
      </p>
    </div><!-- end block_detail_area -->
    <hr />
    <span>
      <a href="#" title="詳しく見る">&gt;&gt;詳しく見る</a>
    </span>
  </div><!-- end block_container -->

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


<!-- 編集ここまで  -->