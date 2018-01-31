<?php
require_once __DIR__."/vendor/autoload.php";

$pub_key = "";
$sec_key = "sk_test_BXiXrzUZl98Xl24DW49wJvSN";

\Stripe\Stripe::setApiKey($sec_key);

//$acc = \Stripe\Account;

//die(var_dump($acc));
?>