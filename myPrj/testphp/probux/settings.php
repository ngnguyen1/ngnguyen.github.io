<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Setting YOur Account</title>
<link rel="stylesheet" type="text/css" href="styles.css" media="screen" />
</head>
<body>
<?php include("header-login.php"); ?>
<?php include("ubar.php"); ?>
<table cellspacing="0" cellpadding="0" align="center" class="content-tbl">
<tr><td class="content-td" style="padding:12px;">
<?php include("left-sidebar.php"); ?>

<table cellpadding="0" cellspacing="0" style="float:left;">
		<tr>
			<td style="padding-left:12px;">
			
			<form name="l" method="post">

			<table cellspacing="0" cellpadding="0" class="ads-box">
			<tr><td width="716" align="left" class="ads-box-title">Personal Settings</td></tr>
			<tr><td align="center" class="ads-box-td">
			
			<table cellpadding="0" cellspacing="0" width="90%" class="ads-box-content">
						<tr><td align="left" style="padding-top:5px;font-size:16px;">Personal Data</td></tr>
			<tr><td class="ads-box-hr" style="background-position:center;padding-bottom:14px;"></td></tr>
			<tr><td align="center" style="padding:5px 10px;">
			
			<table align="center" cellpadding="0" cellspacing="0" class="table-settings">
            <tr>
					                <td align="right" style="padding:10px 5px;vertical-align:middle;">Personal email address:</td>
                    <td><input type="text" value="<?php echo 'email-from-db'; ?>" id="email" name="email" maxlength="255" spellcheck="false"></td>
                			</tr>
			<tr>
           	<td align="right" style="padding:10px 5px;vertical-align:middle;"><a href="https://www.paypal.com" class="link" target="_blank">Paypal</a> email address:</td>
                    <td><input type="text" value="<?php echo 'pemail-from-db'; ?>" id="ppemail" name="ppemail" maxlength="255" spellcheck="false"></td>
                			</tr>
            
            
			</table>
			</td></tr>

			<tr><td align="center" style="padding:5px 10px;">
			
			<table align="center" cellpadding="0" cellspacing="0" class="table-settings">
            			</table>
			
			</td></tr>
			<tr><td align="left" style="padding-top:10px;font-size:16px;">Change Password</td></tr>
			<tr><td class="ads-box-hr" style="background-position:center;padding-bottom:14px;"></td></tr>
			<tr><td align="center" style="padding:5px 10px;">
			
				<table align="center" cellpadding="0" cellspacing="0" class="table-settings">
				<tr>
					<td align="right" width="160" style="padding:10px 5px;">Password <font color="#000"><b>*</b></font>:</td>
					<td><input type="password" value="" id="npassword" name="npassword" spellcheck="false"></td>
				</tr>
				<tr>
					<td align="right" style="padding:10px 5px;">Password confirmation:</td>
					<td><input type="password" value="" id="cpassword" name="cpassword" spellcheck="false"></td>
				</tr>
				<tr>
					<td align="center" colspan="2" style="color:#999;"><font color="#000"><b>*</b></font> Nếu không muốn thay đổi thì để trống</td>
				</tr>
				</table>
			
			</td></tr>
			<tr>
			  <td align="left" style="padding-top:10px;font-size:16px;">Password Confirmation</td>
			</tr>
			<tr><td class="ads-box-hr" style="background-position:center;padding-bottom:14px;"></td></tr>
			<tr><td align="center" style="padding:5px 10px;">
			
			<table align="center" cellpadding="0" cellspacing="0" class="table-settings">
			<tr>
				<td align="right" width="160" style="padding:10px 5px;">Password:</td>
				<td><input type="password" value="" id="pass" name="pass" maxlength="255" spellcheck="false"></td>
			</tr>
			<tr>
				<td align="right" width="160" style="padding:10px 5px;"></td>
				<td style="color:#999;line-height:10px;">* Required to make changes</td>
			</tr>
			</table>
			
			</td></tr>
			<tr><td class="ads-box-hr" style="background-position:center;padding-bottom:14px;"></td></tr>
			<tr><td align="right" style="padding:0 0 6px;">
			<input type="submit" name="sendform" value="SAVE CHANGES" class="button-submit">
			</td></tr>
			</table>
			
			</td></tr>
			</table>
			
			</form>
		
		</td></tr>
		</table>
		
</td></tr>
</table>
<?php include("footer.php"); ?>
</body>
</html>