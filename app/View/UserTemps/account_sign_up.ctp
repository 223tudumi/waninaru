<!-- ���C���R���e���c�͂�������ҏW���Ă��������I�I�I�I  -->

<div id="account_container">
<?php $this->Form->create(array('inputDefaults'=>array('label'=>false,'div'=>false))) ?>
<FORM METHOD="POST">
�@
	<h1>���͉��</h1><br/>
	<div class="account_form">
	�悤�����Ine<input type="text" disabled=�hdisabled�h name="Student_Number" size= "7" value="<?php print $StudentNumber; ?>"�@/ >����
	</div><!-- end account_form -->

	<h2><span>���L�̍��ڂ���͂��Ă��������B</span></h2>

		<div class="account_form">
		<form method="post" name="form">�@
			<ul>
			<li>
				<label><span>�������O�i�{���j<font color="#ff333">���K�{��</font></span><input type="text" name="name" /></label>
			</li>
			<li>
				<label><span>�����[�U�[�����C�Ӂ�</span><input type="text" name="username" /></label>
			</li>
			<li>
				<label><span>���p�X���[�h<font color="#ff333">���K�{��</span><input type="password" name="password" /></font></label>
			</li>
			<li>
				<label><span>���p�X���[�h�i�m�F�j<font color="#ff333">���K�{��</span><input type="password" name="password2" /></font></label>
			</li>

		</form>
			<input type="checkbox" name="usecheck" ><a href="#" target="_blank">���p�K��</a>�ɓ��ӂ���
		<div class="contents1">
		    <div class="btn_base">
		    	<!-- a href="./user_entry.html" class="btn blue" name="���e�m�F" position:relative; --><!-- ���e�m�F --><!-- /a -->
		    	<p><?php echo $this->Form->button('���e�m�F' ,array('class'=>'btn blue')); ?></p>
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








<!-- �ҏW�����܂�  -->