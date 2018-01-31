<pre>
	
<?php
include("vendor/autoload.php");

$pubkey = "pk_test_Wcasw04goeIJCXUvpqY9kMeG";
$secret = "sk_test_BXiXrzUZl98Xl24DW49wJvSN";

//auth
\Stripe\Stripe::setApiKey($secret);

//create a customer
/*$cust_info = array(
	'account_balance' => null,
	'business_vat_id' => null,
	'coupon' => null,
	'default_source' => null,
	'email' => 'devtest@email.com'
);
createCustomer($cust_info);*/

//get a list of all customers
$all = \Stripe\Customer::all();

//dump data
die(var_dump($all));

function createCustomer($info)
{
	\Stripe\Customer::create($info);
}
?>