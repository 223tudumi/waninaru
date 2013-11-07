<div id="account_container">
<?php $this->Form->create(array('inputDefaults'=>array('label'=>false,'div'=>false))) ?>
<FORM METHOD="POST">
　
        <h1>入力画面</h1><br/>
        <div class="account_form">
        ようこそ！ne<input type="text" disabled=”disabled” name="Student_Number" size= "7" value="<?php print $StudentNumber; ?>"　/ >さん
        </div><!-- end account_form -->

        <h2><span>下記の項目を入力してください。</span></h2>

                <div class="account_form">
                <form method="post" name="form">　
                        <ul>
                        <li>
                                <label><span>●お名前（本名）<font color="#ff333">＜必須＞</font></span><input type="text" name="name" /></label>
                        </li>
                        <li>
                                <label><span>●ユーザー名＜任意＞</span><input type="text" name="username" /></label>
                        </li>
                        <li>
                                <label><span>●パスワード<font color="#ff333">＜必須＞</span><input type="password" name="password" /></font></label>
                        </li>
                        <li>
                                <label><span>●パスワード（確認）<font color="#ff333">＜必須＞</span><input type="password" name="password2" /></font></label>
                        </li>

                </form>
                        <input type="checkbox" name="usecheck" ><a href="#" target="_blank">利用規約</a>に同意する
                <div class="contents1">
                    <div class="btn_base">
                            <!-- a href="./user_entry.html" class="btn blue" name="内容確認" position:relative; --><!-- 内容確認 --><!-- /a -->
                            <p><?php echo $this->Form->button('内容確認' ,array('class'=>'btn blue')); ?></p>
                    </div>
                    
                </div><!-- end contents1 -->

                </div>
<?php $this->Form->end() ?>
</div><!-- end account_form -->
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
