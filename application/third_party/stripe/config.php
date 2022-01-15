<?php
//require_once('vendor/autoload.php');
require_once('init.php');
$stripe = array(
  "secret_key"      => "sk_test_KAYkgyWJhTVYmd3F9tn42hqo",
  "publishable_key" => "pk_test_J4p16j5gpe8Mxi74kt6llaZq"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>