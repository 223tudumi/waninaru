<!-- ���C���R���e���c�͂�������ҏW���Ă��������I�I�I�I  -->

<div id="account_container">
<?php $this->Form->create(array('inputDefaults'=>array('label'=>false,'div'=>false))) ?>
<FORM METHOD="POST">
�@
	<h1>���͊m�F</h1><br/>
	<div class="account_form">
	ne<input type="text" disabled=�hdisabled�h name="�w�Дԍ�" size= "7" value="<?php print $StudentNumber; ?>"�@/>����
	</div><!-- end account_form -->


		<div class="account_form">
		<form id="formstyle">�@
			<ul>
			<li>
				<label><span>�������O�i�{���j<font color="#ff333">���K�{��</font></span><input type="text" name="name" value="<?php print $RealName; ?>" disabled=�hdisabled�h /></label>
			</li>
			<li>
				<label><span>�����[�U�[�����C�Ӂ�</span><input type="text" name="username" value="<?php print $UserName; ?>" disabled=�hdisabled�h/></label>
			</li>
			<li>
				<label><span>���p�X���[�h<font color="#ff333">���K�{��</span><input type="password" name="password" value="<?php print $Password; ?>" disabled=�hdisabled�h/></font></label>
			</li>


		</form>

			<input type="checkbox" name="�K��" checked="checked" disabled="disabled"><a href="#"target="_blank">���p�K��</a>�ɓ��ӂ���

	<div class="clearfix">
		<div class="float1">
		<div class="contents2">

			
			
			<p><?php echo $this->Form->Submit('�o�^', array('name'=>'submit', 'div'=>false, 'class'=>'btn blue')); ?><p>

			<p><?php echo $this->Form->Submit('�C��', array('name'=>'stay_submit', 'div'=>false, 'class'=>'btn red')); ?><p>
			

		    <div class="btn_base"><a href="./account_entry_complete.html" class="btn blue" name="�o�^����" position:relative; >�o�^����</a></div>
		</div><!-- end contents1 -->
		</div>

		<div class="float2">
		<div class="contents3">


		    <div class="btn_base"><a href="./account_sign_up.html" class="btn red" name="�C��" position:relative; >�C��</a></div>
		</div><!-- end contents -->
	</div>

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