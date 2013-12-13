<?php echo $this->Html->css(array('post'), null, array('inline'=>false)); ?>

<div id="post_container">
  <div id="post_top_container">
    <h2 id="post_top_title">企画の内容を確認する</h2>
    <p id="post_top_text">
      下記の内容で良い場合は、送信ボタンを押して投稿してください！<br />
      企画を投稿する際は必ず<?php echo $this->Html->link('利用規約',array('controller'=>'rules' , 'action'=>'index')); ?>に目を通してください。<br />
      投稿に関してご不明な点がありましたら、<?php echo $this->Html->link('お問い合わせ',array('controller'=>'inquiries' , 'action'=>'index')); ?>お問い合わせフォーム</a>よりお願いいたします。
    </p>
    <p id="post_top_flow">
      企画の内容を決める &nbsp; &raquo; &nbsp; <span id="now">内容確認</span> &nbsp; &raquo; &nbsp; 投稿完了！
    </p>
  </div><!-- end post_top_container -->
  <div id="form_container">
  	<?php echo $this->element('project_detail_common'); ?>
  </div><!-- end form_container -->
</div><!-- end post_container -->