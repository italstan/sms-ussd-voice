<?php

$linkId = $_POST['linkId'];
if (isset($_POST['from'])){
//Using the Africa's talking API
require_once('AfricasTalkingGateway.php');
// Specify your login credentials
$username = "stanme";
$apikey = "cdfeb216de0e865751e673297c533d124184fafe17538750ad26465e32fa233e";
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = "+254731892686";
// And of course we want our recipients to know what we really do
$message = "Cancer is a group of diseases involving abnormal cell growth with the potential to invade or spread to other parts of the body.\n 70% of known causes of cancer are avoidable and related to lifestyle.\n visit kanini/comxa.com for a simple checkup that can also be accessed via *384*120#";
// Create a new instance of our awesome gateway class
$gateway = new AfricasTalkingGateway($username, $apikey);
// Any gateway error will be captured by our custom Exception class below,
// so wrap the call in a try-catch block
try
{
// Thats it, hit send and we'll take care of the rest.
$results = $gateway->sendMessage($recipients, $message);
foreach($results as $result) {
// status is either "Success" or "error message"
echo " Number: " .$result->number;
echo " Status: " .$result->status;
echo " MessageId: " .$result->messageId;
echo " Cost: " .$result->cost."\n";
}
}
catch ( AfricasTalkingGatewayException $e )
{
echo "Encountered an error while sending: ".$e->getMessage();
}
}