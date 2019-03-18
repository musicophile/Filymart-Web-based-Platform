<?php
require_once('../vendor/autoload.php');

$stripe = [
  "secret_key"      => "sk_live_USpnKQjJ1kKct3Ytu3tRrivj",
  "publishable_key" => "pk_live_T5SqhyCr8dSaJ2CKh4gQlTP8",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>