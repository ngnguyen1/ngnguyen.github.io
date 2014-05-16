<!DOCTYPE html>
<html>
    <head>
    <title>Register account</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link rel="stylesheet" type="text/css" href="css/tipped.css"/>
     <script src="js/jquery.js"></script>
     <script src="js/tipped.js"></script>
     <script language="javascript" src="js/functions.js"></script>
<script type='text/javascript'>
jQuery(document).ready(function($) {
function tip(obj,txt,maxW){maxW = maxW || 'auto';Tipped.create(obj, txt, {skin: 'liquid', hook: 'rightmiddle', maxWidth: maxW, background: { opacity: .9 },showOn: ['focus','click'],hideOn: ['blur']});}
tip("#username", "Username của bạn chỉ được chứa kí tự hoặc số.<br>Độ dài phải trong khoảng 4 đến 15 kí tự.", 320);
tip("#password", "Sử dụng ít nhất 4 kí tự.<br>Đừng sử dụng password từ website khác.", 240);
tip("#cpassword", "Gõ lại password của bạn để xác nhận.", 200);
tip("#email", "We will use this address for things like keeping your account secure.<br><br>For example, we can send you an email alert if we see unusual activity in your account.", 300);
tip("#referrer", "Optional - The username of the ProBux member who sent you here.<br>Skip this step if you dont have one.", 450);
tip("#birth", "Ngày sinh của bạn sẽ được yêu cầu nếu như bạn quên username hay password.", 450);
tip("#username", "Username của bạn chỉ được chứa kí tự hoặc số.<br>Độ dài phải trong khoảng 4 đến 15 kí tự.", 320);
tip("#username", "Username của bạn chỉ được chứa kí tự hoặc số.<br>Độ dài phải trong khoảng 4 đến 15 kí tự.", 320);
tip("#username", "Username của bạn chỉ được chứa kí tự hoặc số.<br>Độ dài phải trong khoảng 4 đến 15 kí tự.", 320);
});
</script>
    </head>
    <body>
<?php include('header.php'); ?>
<table align="center" cellpadding="0" cellspacing="0" class="content-tbl">
<tr><td align="center" class="c-td">
	
	<table cellpadding="0" cellspacing="0" class="contenti-top-table">
	<tr>
	<td align="left" style="vertical-align:middle;padding-left:10px;">Create a ProBux Account</td>
	<td align="right" style="vertical-align:middle;padding-right:10px;">
	<div style="float:right;">
	<a href="./login.php" class="button-reg">LOGIN</a>
	</div>
	<div style="float:right;font:11px/24px Verdana,sans-serif;color:#444;padding-right:8px;">Already a member?</div>
	</td>
	</tr>
	</table>	
		
	<table cellpadding="0" cellspacing="0" class="contenti-bottom-table">
	<tr>
    <td align="center" class="contenti-inside-td" style="position:relative;">
		
		<form method="post" onSubmit="return checkForm(this)">
		<table align="center" cellpadding="0" cellspacing="0" class="contenti-box" style="border-radius:3px;">
				<tr>
			<td align="left" style="padding:5px 10px;"><label for="username">Username</label></td>
		</tr>
		<tr>
			<td align="left" style="padding:0px 10px;">
			<input type="text" value="" id="username" name="username" maxlength="15" spellcheck="false" onBlur="checkUsername()">
			</td>
		</tr>
		<tr id="u_error" style="display:none;"><td align="left" class="td-error"><span id="username_error"></span></td></tr>
		<tr>
			<td align="left" style="padding:15px 10px 5px;"><label for="password">Password</label></td>
		</tr>
		<tr>
			<td align="left" style="padding:0px 10px;">
			<input type="password" value="" id="password" name="password" onBlur="checkPassword()">
			</td>
		</tr>
		<tr id="p_error" style="display:none;"><td align="left" class="td-error"><span id="password_error"></span></td></tr>
        <!--
		<tr>
			<td align="left" style="padding:15px 10px 5px;"><label for="cpassword">Confirm your password</label></td>
		</tr>
		<tr>
			<td align="left" style="padding:0px 10px;">
			<input type="password" value="" id="cpassword" name="cpassword" onBlur="checkCPassword()">
			</td>
		</tr>
        -->
		<tr id="cp_error" style="display:none;"><td align="left" class="td-error"><span id="cpassword_error"></span></td></tr>
		<tr>
			<td align="left" style="padding:15px 10px 5px;"><label for="email">Your email address</label></td>
		</tr>
		<tr>
			<td align="left" style="padding:0px 10px;">
			<input type="text" value="" id="email" name="email" spellcheck="false" onBlur="checkEmail()" placeholder="We don't share your email">
			</td>
		</tr>
		<tr id="e_error" style="display:none;"><td align="left" class="td-error"><span id="email_error"></span></td></tr>
		<tr>
			<td align="left" style="padding:15px 10px 5px;"><label for="birth">Birth year</label></td>
		</tr>
		<tr>
			<td align="left" style="padding:0px 10px;">
			<input type="text" value="" id="birth" name="birth" maxlength="4" style="width:55px;" onBlur="checkBirth()" placeholder="YYYY">
			</td>
		</tr>
		<tr id="b_error" style="display:none;"><td align="left" class="td-error"><span id="birth_error"></span></td></tr>
		<tr style="display:block">
			<td align="left" style="padding:15px 10px 5px;"><label for="referrer">Referrer</label></td>
		</tr>
		<tr style="display:block">
			<td align="left" style="padding:0px 10px;">
			<input type="text" value="" id="referrer" name="referrer" maxlength="15" spellcheck="false">
			</td>
		</tr>
		<tr id="r_error" style="display:none;"><td align="left" class="td-error"><span id="referrer_error"></span></td></tr>
		<tr>
			<td align="left" style="padding:15px 10px 10px;">Prove you're not a robot</td>
		</tr>
		<tr>
			<td align="left" style="padding:0px 10px;">
			
				<table cellpadding="0" cellspacing="0" style="margin-top:-10px;">
				<tr>
					<td style="height:56px;"><input type="text" value="" id="captcha" name="captcha" maxlength="5" spellcheck="false" style="width:70px;" onBlur="checkCaptcha()"></td>
					<td><img src="./captcha.php" width="160" height="56" onClick="this.src='./captcha.php?t='+Math.random(); d('captcha').focus();" title="If Not readable? Click here to refresh."></td>
				</tr>
                <tr id="cap_error" style="display:none;"><td align="left" class="td-error" colspan="2" style="padding:0;"><span id="captcha_error"></span></td></tr>
				</table>
			
			</td>
		</tr>
		<tr>
			<td align="left" style="padding:0 10px 2px;">
			<p style="width:280px;font:11px/15px Verdana, Arial, Helvetica, sans-serif;">By clicking the “Create My Account”, means that you agree to the ProBux &middot; <a href="./terms.php" class="link" target="_blank" style="font:11px/15px Verdana, Arial, Helvetica, sans-serif;">Terms of Service</a>.</p></td>
		</tr>
		<tr>
			<td align="left" style="padding:14px 10px 5px;">
			<input type="submit" name="sendform" value="CREATE MY ACCOUNT" class="button-submit">
			</td>
		</tr>
		</table>
		</form>
		
	</td>
    </tr>
    </table>
</td></tr>
</table>
<?php include('footer.php'); ?>
    </body>
</html>