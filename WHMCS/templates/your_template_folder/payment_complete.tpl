{php}
$status = $_GET['status'];

if($status == "89ri8377e3e388e394"){
$message = "<p>Thank you for your payment. Your payment was <strong>successful</strong> and your invoice has been marked as paid. If you ordered Shared or Reseller hosting your account including FREE domain registration, has been set up and you can check your email for tour login details. If you ordered for a VPS your VPS has been set up, allow about 2 hours for your VPS to be configured, tweaked and hardened by us. </p>";
}

if($status == "37ri879n7e3ew8e312"){
$message = "<p>Your transaction was <strong>denied</strong> and your invoice is still unpaid. Log into your account, click on the unpaid invoice and try again. </p>";
}

if($status == "yg75gyyfs35568hug6"){
$message = "<p>Your transaction status is <strong>pending</strong> and your invoice is still unpaid. Log into your account, click on the unpaid invoice and try again. </p>";
}

if($status == "4ebghy0fsyyo8c346x"){
$message = "<p>Your transaction has been <strong>aborted</strong> and your invoice is still unpaid. Log into your account, click on the unpaid invoice and try again. </p>";
}

if($status == "gjcfdrokjbhvdr576e"){
$message = "<p>Your transaction <strong>failed</strong> and your invoice is still unpaid. Log into your account, click on the unpaid invoice and try again. </p>";
}

if($status == "gjnj84bur9e3245bb4"){
$message = "<p>Your transaction encountered an <strong>error</strong> and your invoice is still unpaid. Log into your account, click on the unpaid invoice and try again. </p>";
}

echo $message;
{/php}

