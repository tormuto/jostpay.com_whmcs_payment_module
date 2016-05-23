<?php
//////////////////////////////////////////////////////
//***************************************************/
//* Please see the ReadMe.txt file for instruction  */
//* This File is Written For JostPay Gateway       */
//* For Any Help, Contact me                        */
//***************************************************/
//* Email: support@jostpay.com                    */
//* Phone: +2348061567113                              */
//* Website: https://jostpay.com                 */ 
//////////////////////////////////////////////////////


# Required File Includes
include("../../../init.php");
include("../../../includes/functions.php");
include("../../../includes/gatewayfunctions.php");
include("../../../includes/invoicefunctions.php");

$gatewaymodule = "jostpay"; # Enter your gateway module name here replacing template

$GATEWAY = getGatewayVariables($gatewaymodule);
if (!$GATEWAY["type"]) die("Module Not Activated"); # Checks gateway module is active before accepting callback


$_REQUEST=array_merge($_GET,$_POST);
if(empty($_REQUEST['ref']))die("Transaction Reference not supplied");
$transaction_id = $_REQUEST['ref'];
$merchant_id = $GATEWAY['merchant_id'];

$data = file_get_contents("https://jostpay.com/api_v1?ref=$transaction_id&action=get_transaction&jostpay_id=$merchant_id");

$result = json_decode($data, true);
if(empty($result)) die("Invalid response from transaction validation");
if(!empty($result['error'])) die($result['error']);

$expl=explode('-',$transaction_id);
$invoice_id=$expl[0];
# Get Returned Variables - Adjust for Post Variable Names from your Gateway's Documentation
$status = $result['status'];
$transid = $transaction_id;


$invoiceid = checkCbInvoiceID($invoice_id,$GATEWAY["name"]); 
checkCbTransID($transid); 


if($json['status_msg']=='FAILED')logTransaction($GATEWAY["name"],$_POST,"Invoice Id: $invoice_id Failed. {$result['info']}");
elseif($json['status_msg']=='PENDING')logTransaction($GATEWAY["name"],$_POST,"Invoice Id: $invoice_id still on pending. {$result['info']}");
elseif($json['status_msg']=='COMPLETED')
{
	if(floatval($result['amount'])<floatval($amount)){
		logTransaction($GATEWAY["name"],$_POST,"Incorrect deposit amount ($amount NGN was expected, but {$result['amount']} NGN found). ");
	}
	else {
		
		addInvoicePayment($invoice_id,$transid,$amount,$fee,$gatewaymodule); 
		logTransaction($GATEWAY["name"],$_POST,"Invoice Id: $invoice_id successfully completed. {$result['info']}");
	}
}

?>