## Installation guide ##
  
You must have created a [JOSTPAY Account](https://jostpay.com/) before using this plugin.
Please note that the this payment modules works with Naira (NGN) currency

========================================================================
CONTENTS
========================================================================

1. Description
2. Server Requirements
3. New Installation Instructions
4. Configure the module

========================================================================
DESCRIPTION
========================================================================
This is a payment module developed to work with WHMCS
for the JostPay (jostpay.com) online payment system. With 
this, payments can be made on your site using JostPay.


========================================================================
SERVER REQUIREMENTS
========================================================================
1. PHP 5.x or later (with the function file_get_contents() enabled
2. Curl Support (with SSL)
3. Ioncube Loaders Support

If you already have a working WHMCS installation then you should have 
the minimum requirements needed. Ensure you have the right PHP version.


========================================================================
NEW INSTALLATION INSTRUCTIONS
========================================================================

1. Upload "whmcs/modules/gateways/jostpay.php" to the corresponding location
   on your site. 
   
   Example:
   If your whmcs is installed in a folder called "billing", the corresponding
   location will be "billing/modules/gateways/".
   If your whmcs is installed on the root of your site, the corresponding
   location will be "modules/gateways/"


2. Upload "whmcs/modules/gateways/callback/jostpay.php" to the corresponding location
   on your site. 
   
   Example:
   If your whmcs is installed in a folder called "billing", the corresponding
   location will be "billing/modules/gateways/callback".
   If your whmcs is installed on the root of your site, the corresponding
   location will be "modules/gateways/callback"

3. Upload whmcs/payment_complete.php to the corresponding location on your site.

   Example:
   If your whmcs is installed in a folder called "billing", the corresponding
   location will be "billing/payment_complete.php".
   If your whmcs is installed on the root of your site, put the file on the root folder.

4. Upload whmcs/templates/your_template_folder/payment_complete.tpl to the corresponding location on your site.

   Example:
   If your whmcs is installed in a folder called "billing", the corresponding
   location will be "billing/templates/your_template_folder/payment_complete.tpl".
   **Replace "your_template_folder" with the name of your template folder.


========================================================================
CONFIGURE THE MODULE
========================================================================

1. Log into your WHMCS Admin area.
2. Goto Setup > Payment Gateways
3. Click the "Activate Gateway" dropdown menu.
4. Choose "JostPay" from the list and click "Activate"
5. You should now see "JostPay Online Payment" as part of the activated
   gateways.
6. Input your merchant ID and Notification URL into the space provided and save changes.
**The Notification URL should be the full path to the "callback/jostpay.php" file.

	Example: 
        If your whmcs is installed in a folder called "billing",
        http://www.your_domain.com/billing/modules/gateways/callback/jostpay.php
		