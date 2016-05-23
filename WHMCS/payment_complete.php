<?php

define("CLIENTAREA",true);

require("dbconnect.php");
require("includes/functions.php");
require("includes/clientareafunctions.php");

$pagetitle = "Transaction Notification";
$pageicon = "images/support/clientarea.gif";
$breadcrumbnav = '<a href="index.php">'.$_LANG['globalsystemname'].'</a>';
$breadcrumbnav .= ' > <a href="payment_complete.php">Transaction Notification</a>'; 

initialiseClientArea($pagetitle,$pageicon,$breadcrumbnav);

if ($_SESSION['uid']) {
$response = $_POST['ce_response'];
echo $response;
  # User is Logged In - put any code you like here
} 

# To assign variables in Smarty use the following syntax.
# This can then be used as {$variablename} in the template

$smartyvalues["variablename"] = $value; 

# Define the template filename to be used without the .tpl extension

$templatefile = "payment_complete"; //change this to the tpl

outputClientArea($templatefile);



?>