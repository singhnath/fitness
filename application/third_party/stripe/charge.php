<?php
  require_once('./config.php');

  /* $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail']; */
	
	//\Stripe\Stripe::setApiKey("sk_test_BQokikJOvBiI2HlWgH4olfQ2");

	$token = \Stripe\Token::create(array(
	  "card" => array(
		"number" => "4242424242424242",
		"exp_month" => 5,
		"exp_year" => 2019,
		"cvc" => "314"
	  )
	));
	
	
  /*$customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token->id
  ));*/

  $charge = \Stripe\Charge::create(array(
      'amount'   => 5000,
      'currency' => 'usd'
  ));

  
echo "<pre>";
print_r($charge);
echo "</pre>";

/*echo "<pre>";
print_r($charge->id);
echo "</pre>";*/
  echo '<h1>Successfully charged $50.00!</h1>';
  
  /*
   $create_customer = \Stripe\Customer::create(array(
	  "description" => "Customer for nwe.sub@sub.com",
	  "source" => "tok_amex" // obtained with Stripe.js
	));
	
	echo "<pre> Create cutomr";
print_r($create_customer);
echo "</pre>";


$subscription = \Stripe\Subscription::create(array(
  "customer" => $create_customer->id,
  "items" => array(
    array(
      "plan" => "monthlyplans_leos",
    ),
  )
));

echo "<pre>";
	print_r($subscription);
	
	$sub = \Stripe\Subscription::retrieve("sub_Cnv6Mc6Mkr7efo");
$sub->cancel();*/
?>