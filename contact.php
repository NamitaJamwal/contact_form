<?php

require("sendgrid-php/sendgrid-php.php");

// an email address that will be in the From field of the email.
$from = 'Demo contact form <test@example.com >';

// an email address that will receive the email with the output of the form
$to = 'Demo contact form <test@example.com>';

// subject of the email
$name = $_POST['name'];
$subject =  $_POST['subject'];
$message = $_POST['message'];

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('name' => 'Name', 'email' => 'Email', 'phone' => 'Phone', 'subject' => 'Subject', 'message' => 'Message'); 

// message that will be displayed when everything is OK :)
$okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';

// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again later';

/*
 *  LET'S DO THE SENDING
 */

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try
{
    if(count($_POST) == 0) throw new \Exception('Form is empty');
            
    $content = "You have a new message from your contact form\n=============================\n";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email 
        if (isset($fields[$key])) {
            $content .= "$fields[$key]: $value\n";
        }
    }

    /* All the necessary headers for the email.
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );
	*/
    
    // Send email
    //mail($to, $subject, $content, implode("\n", $headers));
	//recaptcha-response
	$recaptcha_secret = "6LfK7ygUAAAAAIYzE6mbqdxbmuroi4gJWqdIpmBu";
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
    $response = json_decode($response, true);

    if($response["success"] === true){
							$from = new SendGrid\Email("Example User", "test@example.com");
						//	$subject = "Sending with SendGrid is Fun";
						//	$subject = $_POST['subject'];
							$subject= "You have got mail!";
							$to = new SendGrid\Email("Example User", "test@example.com");
							$content = new SendGrid\Content("text/html", "
							Email : {$email}<br>
							Name: {$name}<br>
							Subject : {$subject}<br>
							Message : {$message}
							");
						//	$content = $_POST["content"];
						//	$content = $_POST['content'];
							$mail = new SendGrid\Mail($from, $subject, $to, $content);

							$apiKey = ('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');
							$sg = new \SendGrid($apiKey);

							$sg_response = $sg->client->mail()->send()->post($mail);
							echo $sg_response->statusCode();
							print_r($sg_response->headers());
							echo $sg_response->body();
        echo "Form Submit Successfully.";
    }else{
        echo "You are a robot";
	}

	
	
	
						

   // $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

/*
 if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}
 */

		
							
							
							

?>