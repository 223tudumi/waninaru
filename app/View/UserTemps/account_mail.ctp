<?php
echo $this->Html->css(array('account'), null, array('inline'=>false));
echo $this->assign('title', 'Waninaru - 学生同士がスキルを共有して、アイディアを実現できるサービス ');
?>
<div id="account_container">
　
        <h1>送信が完了しました！</h1><br/>

                        <div class="supplement">
                                ありがとうございます。入力された学籍番号宛にメールが送信されました。<br />
                                ご確認の上、メールに記載されたURLから登録を行ってください。
                        </div><!-- end supplement -->

                <div class="contents1">
                    <div class="btn_base"><a href="http://mail.senshu-u.jp/" class="btn blue" name="Gmail" target="_blank" >専修大学<br />Gmailへ</a></div>
                </div><!-- end contents1 -->
                        <div class="supplement">
                                ※別ウィンドウで専修大学のGmailを開きます。
                        </div><!-- end supplement -->


</div><!-- end main_container -->