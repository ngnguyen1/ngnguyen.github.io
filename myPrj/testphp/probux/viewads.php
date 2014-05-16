<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Viewads</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<?php include('header.php'); ?>
<?php include('ubar.php'); ?>


<table cellspacing="0" cellpadding="0" align="center" class="content-tbl">
<tr><td class="content-td" style="padding:12px;">

			<table cellspacing="0" cellpadding="0" class="ads-box">
			<tr><td width="930" align="left" class="ads-box-title">View Advertisements</td></tr>
			<tr><td align="left" class="ads-box-td">
			
			<table cellpadding="0" cellspacing="0" class="ads-box-content" style="width:100%;">
						<tr><td align="left" style="padding:10px 10px;width:900px;font-size:12px;border:1px solid #ddd;border-radius:4px;">
			<div style="float:left">Your advertisement clicks reset at: 00:00 (Server time)</div>
                                                                            <div style="float:right">The current server time is <?php echo date("Y/m/d H:i"); ?></div>
			</td>
			</tr>
						<tr>
				<td align="left" id="showList" style="padding:18px 6px 0;vertical-align:top;">
                    <fieldset id="f1">
					<legend> Daily Exposure </legend>
					<div id="all1"></div>
					</fieldset>
                    
                    <fieldset id="f2">
					<legend align="left"> Extra Advertisements </legend>
					<div id="all2"></div>
					</fieldset>
                    
					<fieldset id="f3">
					<legend align="left"> Fixed Advertisements </legend>
					<div id="all3"></div>
					</fieldset>
				</td>
			</tr>
			<tr><td align="center" style="padding:0 10px 10px;">
			</td>
            </tr>
			</table>
			
			</td></tr>
			</table>

		
</td></tr>
</table>


<?php include('footer.php'); ?>
</body>
</html>