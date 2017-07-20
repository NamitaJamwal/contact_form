<?php
$secretkey ='key-41616099541fe1b0187e7cd970127240';
$domain='sandbox614b875e3dbc47b58714b5622ebee2fe.mailgun.org';

$Option['FROM_MAIL']="postmaster@sandbox614b875e3dbc47b58714b5622ebee2fe.mailgun.org";
$Option['FROM_NAME']="MyMailGun ";
$Option['TO_MAIL']=$_POST['email'];
$Option['TO_NAME']=$_POST['name'];
$Option['SUBJECT']=$_POST['subject'];
$Option['BODY_TEXT']=$_POST['message'];

require 'vendor/autoload.php';
$client = new \GuzzleHttp\Client([
 'verify'=> false,
]);

$adapter = new \Http\Adapter\Guzzle6\Client($client);
use Mailgun\Mailgun;
$mailgun= new \Mailgun\Mailgun($secretkey,$adapter);

$fields = array('name' => 'Name', 'email' => 'Email', 'phone' => 'Phone', 'subject' => 'Subject', 'message' => 'Message'); 

// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again later';

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try
{
    if(count($_POST) == 0) throw new \Exception('Form is empty');
    $content = "You have a new message from your contact form\n=============================\n";
    foreach ($_POST as $key => $value) 
	{
        if (isset($fields[$key]))
			{
            $content .= "$fields[$key]: $value\n";
			}
	}
	//recaptcha-response
	$recaptcha_secret = "6LfK7ygUAAAAAIYzE6mbqdxbmuroi4gJWqdIpmBu";
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
    $response = json_decode($response, true);
	if($response["success"] === true)
	{
       $result = $mailgun->sendMessage($domain,array(
        'from'=> "{$Option[FROM_NAME]} <{$Option[FROM_MAIL]}>",
		'to' => "{$Option[TO_NAME]} <{$Option[TO_MAIL]}>",
	    'subject' =>$Option['SUBJECT'],
	    'text' => $Option['BODY_TEXT'],
	    ));	
	  var_dump($result);
				
        echo "Form Submit Successfully.";
	} else {
        echo "You are a robot";
		   }      
}
   catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}
?>