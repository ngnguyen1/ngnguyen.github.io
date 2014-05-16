<!DOCTYPE html>
<html>
  <head>
    <title>Probux</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css" type="text/css" />
    <script language="javascript" src="js/functions.js"></script>
  </head>
  <body>
<?php include('header.php'); ?>
<table align="center" cellpadding="0" cellspacing="0" class="content-tbl">
      <tr><td align="center" class="content-td">
	
      <table cellpadding="0" cellspacing="0" class="contenti-top-table">
      <tr>
      <td align="left" style="vertical-align:middle;padding-left:10px;">Login to ProBux!</td>
      <td align="right" style="vertical-align:middle;padding-right:10px;">
      <div style="float:right;">
      <a href="./register.php" class="button-reg">CREATE AN ACCOUNT</a>
      </div>
      <div style="float:right;font:11px/24px Verdana,sans-serif;color:#444;padding-right:8px;">New to ProBux?</div>
      </td>
      </tr>
      </table>
		
      <table cellpadding="0" cellspacing="0" class="contenti-bottom-table">
      <tr><td align="center" class="contenti-inside-td">
		
      <form method="post" onSubmit="return checkForm(this)">
      <table align="center" cellpadding="0" cellspacing="0" class="contenti-box">
      <tr>
      <td align="left" style="padding:5px 10px;"><label for="username">Username</label></td>
      </tr>
      <tr>
      <td align="left" style="padding:0px 10px;"><input type="text" value="" id="username" name="username" maxlength="15" spellcheck="false" onBlur="checkUsername()"><script>document.getElementById('username').focus();</script></td>
</tr>
<tr id="u_error" style="display:none;"><td align="left" class="td-error"><span id="username_error"></span></td></tr>
      <tr><td align="left" style="padding:15px 10px 5px;"><label for="password">Password</label></td></tr>
      <tr>
      <td align="left" style="padding:0px 10px;"><input type="password" value="" id="password" name="password" onBlur="checkPassword()"></td>
      </tr>
      <tr id="p_error" style="display:none;"><td align="left" class="td-error"><span id="password_error"></span></td></tr>
      <tr>
      <td align="left" style="padding:15px 10px 5px;">
      <input type="submit" name="sendform" value="LOGIN" class="button-submit" onFocus="checkUsername();checkPassword()">
      </td>
      </tr>
      <tr>
      <td align="left" style="padding:10px 10px 5px;">
      <p style="width:280px;"><a href="./recover.php" class="link">Forgot your password or username?</a></p>
      </td>
      </tr>
      </table>
      </form>
		
      </td></tr>
      </table>

      </td></tr>
      </table>
<?php include('footer.php'); ?>
<script language="javascript" src="js/processform.js"></script>
</body>
</html>