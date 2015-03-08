<?php 

	// Let's send the contact form!
    // Lines you need to change: 6, 7, 35, 42
    // If you added/changed variables, also edit lines 13-15, 23-26
      
    $to = "YOURNAME@DOMAIN.com, ANOTHER@DOMAIN.COM"; // emails that receive the message
    $subject = "Contact Form Submitted - YOURSITENAME"; // subject title of the email
    
    // Variables to receive from the form
    // make sure to add your custom variables in here! 

        $name = strip_tags($_POST['name']); // name of sender
        $email = strip_tags($_POST['email']); // email of sender
        $message = strip_tags($_POST['message']); // sender 
    
    // HTML email message
    // also add your custom variables here or else you won't receive them via email!

        $output = 
        '<html><body>' . 
          	'<table rules="all" style="border-color: #666; font-size: 14px; width: 100%;" cellpadding="20">' .
            "<tr><th>Contact Information</th></tr>\n" .
            "<tr><td>Name:</td><td>" . $name . "</td></tr>\n" .
            "<tr><td>Email:</td><td>" . $email . "</td></tr>\n" .
            "<tr><td>Message:</td><td>" . $message . "</td></tr>\n" .
        '</body></html>';
  
    
    // Special headers - DON'T CHANGE

    	$headers = "MIME-Version: 1.0" . "\r\n";
    	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	
	// More headers
	   $headers .= 'From: <noreply@YOURDOMAIN.com>' . "\r\n";
    
    
    // Woot! Everything ready to send!
    // the email follow -r will help push the multiple emails through
    // just put in one email

        mail($to, $subject, wordwrap($output), $headers, "-r YOURNAME@DOMAIN.com");
        
?>

