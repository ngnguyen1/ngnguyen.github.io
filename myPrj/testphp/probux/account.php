<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="styles.css" media="screen" />
</head>
<body>
<?php include('header-login.php'); ?>
<?php include('ubar.php'); ?>


<table cellspacing="0" cellpadding="0" align="center" class="content-tbl">
<tr><td class="content-td" style="padding:12px;">

<?php include("left-sidebar.php"); ?>
      <table cellpadding="0" cellspacing="0" style="float:left;">
      <tr>
      <td style="padding-left:12px;">

      <table cellspacing="0" cellpadding="0" class="ads-box">
      <tr><td width="400" align="left" class="ads-box-title" style="padding:8px 10px 2px;">
			
      <div style="float:left;margin-top:-18px;margin-left:-5px;" class="acc-spr spr1"></div>
      <div style="float:left;padding:4px 0 0 10px;">My Account Details : <?php echo "user_name_from_db"; ?></div>
			
                                                                         </td></tr>
                                                                         <tr><td align="left" class="ads-box-td">
		
                                                      <table cellpadding="0" cellspacing="0" class="ads-box-content" width="100%" style="height:200px;">
                   <tr class="acc-tr">
                 <td align="right" class="acc-left">Your referral link:</td>
                 <td class="acc-right" ><span style="color:brown">Link referral</span></td></tr>
                 <tr class="acc-tr"><td align="right" class="acc-left">Membership:</td><td class="acc-right">
                          <strong style="color:brown"><?php echo "standard"; ?></strong>	&nbsp;<img src="images/acc-star.png" width="12" height="12"> <a href="#" class="link account-minilink">Upgrade Account</a>
                                                       </td></tr>
                                                              <tr class="acc-tr"><td align="right" class="acc-left">Ads clicked:</td><td class="acc-right">
                                                                             ???? <img src="images/stats.png" width="10" height="10"> <a class="link account-minilink" href="#">Detailed Statistics</a>
                                                                             </td></tr>
          <tr class="acc-tr"><td align="right" class="acc-left">Main balance:</td><td class="acc-right"><strong style="color:green"> ???? </strong>
                                                                             </td></tr>
                                                                             <tr class="acc-tr"><td align="right" class="acc-left">Rental balance:</td><td class="acc-right" data-intro="This is the balance you use to rent and manage the referrals only and the link to add funds to this balance." data-position="right"> ???? [<a class="link account-minilink" href="#">Add funds</a>]
</td>
</tr>
                        
<tr class="acc-tr"><td align="right" class="acc-left">Advertisements:</td><td class="acc-right">????<img src="images/credit.png" width="10" height="10"> <a class="link account-minilink" href="#">Create your first ad</a></td></tr>
                        
                                                                                                                                                                                                                                                                                                                                               </table>
                                                                                                                                                                                                                                                                                                                                               </td></tr>
                                                                                                                                                                                                                                                                                                                                               </table>
						<table cellspacing="0" cellpadding="0" class="ads-box" style="margin-top:15px;">
			<tr><td width="400" align="left" class="ads-box-title" style="padding:8px 10px 2px;">
			
			<div style="float:left;margin-top:-18px;margin-left:-5px;" class="acc-spr spr1"></div>
			<div style="float:left;padding:4px 0 0 10px;">My Referrals</div>
			
			</td></tr>
			<tr><td align="left" class="ads-box-td">
			
			<table cellpadding="0" cellspacing="0" class="ads-box-content" width="100%" style="height:97px;">
			<tr class="acc-tr"><td align="right" class="acc-left"><a href="#" class="link account-minilink">Direct Referrals</a>:</td><td class="acc-right"> ????</td></tr>
			<tr class="acc-tr"><td align="right" class="acc-left"><a href="#" class="link account-minilink">Rented Referrals</a>:</td><td class="acc-right"> ??? </td></tr>
			<tr class="acc-tr">
			  <td align="right" class="acc-left">Referral clicks:</td>
			  <td class="acc-right">??? <img src="images/stats.png" width="10" height="10"> <a class="link account-minilink" href="#">Referral Statistics</a></td>
			</tr>
            			</table>
			
			</td></tr>
			</table>
            		
		</td></tr>
		</table>
		
	<table cellpadding="0" cellspacing="0" style="float:left;">
	<tr>
		<td style="padding-left:12px;">

			<table cellspacing="0" cellpadding="0" class="ads-box">
			<tr>
			
			<td width="280" align="left" class="ads-box-title" style="padding:8px 10px 2px;">
			<div style="float:left;margin-top:-18px;" class="acc-spr spr2"></div>
			<div style="float:left;padding:4px 0 0 8px;">Liên Kết Hữu Ích</div>
			</td>
			
			</tr>
			<tr><td align="center" class="ads-box-td" style="padding:5px 4px;max-width:280px;">

<table cellpadding="0" cellspacing="0" style="margin:0 auto;">
				<tr>
					<td style="padding:5px;padding-bottom:3px;">
						<ul class="acc1"><li><a id="upg" href="#" style="color:red;">Upgrade</a></li></ul>
					</td>
					<td style="padding:5px;padding-bottom:3px;">
						<ul class="acc2"><li><a id="refs" href="#">Referrals</a></li></ul>
					</td>
				</tr>
				<tr>
					<td style="padding:5px;">
						<ul class="acc3"><li><a id="ads" href="#" >Advertise</a></li></ul>
					</td>
					<td style="padding:5px;">
					<ul class="acc4"><li><a id="cash" href="#" >Cashout</a></li></ul>
					</td>
				</tr>
				</table>
			</td></tr>
			</table>
			
			<table cellspacing="0" cellpadding="0" class="ads-box" style="margin-top:15px;">
			<tr>
			  <td width="280" align="left" class="ads-box-title" style="padding:8px 10px 2px;">
			<div style="float:left;margin-top:-18px;" class="acc-spr spr3"></div>
			<div style="float:left;padding:4px 0 0 8px;">Tin Mới</div>
			  </td>
			</tr>
			<tr><td align="left" class="ads-box-td" style="padding:12px 0 9px;max-width:280px;">
			<div style="font:10px/13px verdana,sans-serif;max-width:262px;margin:0 auto;height:94px;">
			</div>
			</td></tr>
			</table>
	
	</td></tr>
	</table>
		
</td></tr>
</table>




<?php include('footer.php'); ?>
</body>
</html>