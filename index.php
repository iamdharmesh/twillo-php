<?php

// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require __DIR__ . '/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;
if($_POST)
{
// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC76e48902e22b8108a4bb959bccee16ba';
$token = '7f4646ed1bf89e8b94158d4350bf7454';
$client = new Client($sid, $token);


$numbers = explode(',' , $_POST['to'].',');
$body = $_POST['body'];
foreach($numbers as $k=>$v)
{
	if(!$v || $v=="")break;
	$client->messages->create(
	    // the number you'd like to send the message to
	    $v,
	    array(
	        // A Twilio phone number you purchased at twilio.com/console
	        'from' => '+13102998354',
	        // the body of the text message you'd like to send
	        'body' => $body
	    )
	);
}


}

?>

<form action="" method="_POST">
To : <input type="text" name="to" placeholder="use ',' to add multiple" /> <font size="1">Use country code</font><br>
Message<textarea name="body"></textarea>
</form>