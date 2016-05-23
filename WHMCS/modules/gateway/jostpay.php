<?php
//////////////////////////////////////////////////////
//***************************************************/
//* Do Not Run This File In Directly on ur Browser  */
//* Please see the ReadMe.txt file for instruction  */
//* This File is Written For JostPay Gateway       */
//* For Any Help, Contact us                        */
//***************************************************/
//* Email: support@jostpay.com                    */
//* Phone: +2348061567113                              */
//* Website: https://jostpay.com                 */ 
//////////////////////////////////////////////////////


function jostpay_config() {
    $configarray = array(
     "FriendlyName" => array("Type" => "System", "Value"=>"Mastercard, Visacard, Verve, Perfect Money & Bitcoin (JostPay)"),
     "merchant_id" => array("FriendlyName" => "JostPay Merchant ID", "Type" => "text", "Size" => "20", ),
    );
	return $configarray;
}

function jostpay_link($params) {
	
	# Gateway Specific Variables
	$merchant_id = $params['merchant_id'];
	
	$notify_url = $params['notification_url'];
	$fail_url = $params['fail_url'];
	$success_url = $params['success_url'];

	# Invoice Variables
	$invoiceid = $params['invoiceid'];
	$description = $params["description"];
    $amount = $params['amount']; # Format: ##.##
    $currency = $params['currency']; # Currency Code

	# Client Variables
	$firstname = $params['clientdetails']['firstname'];
	$lastname = $params['clientdetails']['lastname'];
	$email = $params['clientdetails']['email'];
	$address1 = $params['clientdetails']['address1'];
	$address2 = $params['clientdetails']['address2'];
	$city = $params['clientdetails']['city'];
	$state = $params['clientdetails']['state'];
	$postcode = $params['clientdetails']['postcode'];
	$country = $params['clientdetails']['country'];
	$phone = $params['clientdetails']['phonenumber'];

	# System Variables
	$companyname = $params['companyname'];
	$systemurl = $params['systemurl'];
	$currency = $params['currency'];


	# Enter your code submit to the gateway...
	$trans_ref=$invoiceid.'-'.time();
 
	$code = "<form method='post' action='https://jostpay.com/sci'>
	<input type='hidden' name='amount' value='$amount' />
	<input type='hidden' name='merchant' value='$merchant_id' />
	<input type='hidden' name='ref' value='$trans_ref' />
	<input type='hidden' name='memo' value=\"$description\" />
	<input type='hidden' name='notification_url' value='$notify_url' />
	<input type='hidden' name='success_url' value='$notify_url' />
	<input type='hidden' name='cancel_url' value='$notify_url' />
	<input type='submit' border='0' alt='We Accept JostPay' value='Pay With JostPay' />
	</form>"
	

	return $code;
}


?>