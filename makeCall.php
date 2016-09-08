<?php
// Be sure to include our gateway class
require_once('AfricastalkingGateway');

// Specify your login credentials
$username   = "stanme";
$apikey     = "cdfeb216de0e865751e673297c533d124184fafe17538750ad26465e32fa233e";

// Specify your Africa's Talking phone number in international format
$from = "+254731892686";

// Specify the numbers that you want to call to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case, +256 for Uganda)
$to   = "+254729675820";

// Create a new instance of our awesome gateway class
$gateway = new AfricasTalkingGateway($username, $apikey);

try 
{
  $results = $gateway->call($from, $to);

  //This will loop through all the numbers you requested to be called
  foreach($results as $result) {
    echo $result->status;
    echo $result->phoneNumber;
    echo "<br/>";
  }

}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while making the call: ".$e->getMessage();
}