<?php defined('_JEXEC') or die('Restricted access'); ?>

<script type="text/javascript">
function showfield()
	{
		if(document.getElementById('pp').checked == true){
			document.getElementById('paypal').style.display = 'block';
			document.getElementById('money_booker').style.display = 'none';
			document.getElementById('mb').checked = false;
		}else{
			document.getElementById('paypal').style.display = 'none';
			document.getElementById('money_booker').style.display = 'block';
			document.getElementById('pp').checked = false;
		}
	}
</script>

<table>
	<tr>
		<td>
			<input type="radio" id="pp" name="donate" onClick="javascript:showfield();"/><b><?php echo "Paypal Donation"; ?></b>
		</td>
	</tr>
	<tr>
		<td>
			<input type="radio" id="mb" name="donate" onClick="javascript:showfield();"/><b><?php echo "MoneyBooker Donation"; ?></b>
		</td>
	</tr>
</table>

<?php
/* Money Booker Parameters */
$mb_email =	$params->get( 'mb_email', '' );
$amt 	  =	@$params->get( 'mb_amount', '' );
?>

<!-- MoneyBooker Form starts -->
<div id="money_booker" style="display:none;">
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<table style="margin-top:15px;">
	<tr>
		<td>
			<img src="modules/mod_nkddonate/mb.gif">
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" size="5" name="amount" value="<?php echo $amt; ?>"/>
		</td>
	</tr>
	<tr>
		<td>
			<select name="currency" id="test">
			  <option value="USD" selected="selected">US Dollars</option>
			  <option value="EUR">Euros</option>
			  <option value="CAD">Canadian Dollars</option>
			  <option value="GBP">British Pounds</option>
			</select>
		</td>
	</tr>
</table>
<input type="hidden" name="pay_to_email" value="<?php echo $mb_email; ?>"/>
<input type="hidden" name="detail1_description" value="Donate for this website">
<input type="submit" value="Donate">
</form>
</div>

<!-- MoneyBooker Form ends -->

<!-- Paypal Parameters -->

<?php
$paypal_account = $params->get('paypal_account');
$amount			= $params->get('amount');
$currency_code	= $params->get('currency_code');
$successeful_url= $params->get('successeful_url');
$cancel_url		= $params->get('cancel_url');
?>

<div id="paypal" style="display:none;">
<table style="margin-top:15px;">
	<tr>
		<td>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
			<input type="hidden" name="cmd" value="_donations">
			<input type="hidden" name="business" value="<?php echo $paypal_account; ?>">
			<input type="hidden" name="amount" value="<?php echo $amount; ?>">
			<input type="hidden" name="no_shipping" value="1">
			<?php if(trim(strlen($successeful_url)>0)){  ?>
				<input type="hidden" name="return" value="<?php echo $successeful_url; ?>">
			<?php } ?>
			<?php if(trim(strlen($cancel_url)>0)){  ?>
				<input type="hidden" name="cancel_return" value="<?php echo $cancel_url; ?>">
			<?php } ?>
			<input type="hidden" name="currency_code" value="<?php echo $currency_code; ?>">
			<input type="hidden" name="tax" value="0">
			<input type="hidden" name="bn" value="PP-DonationsBF">
			<input type="image" src="modules/mod_nkddonate/paypal_donate.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			</form>
		</td>
	</tr>
</table>
</div>