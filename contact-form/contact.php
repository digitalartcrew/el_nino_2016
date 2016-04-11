<?php

// configure
$from = '<summercamp@elninomma.com>,';
$sendTo = '<alyssaewerselnino@gmail.com >,<keri.taylor@gmail.com>';
$subject = 'El Niño Summer Camp Applicant';
$fields = array('name' => 'First Name',
 'lastname' => 'Last Name', 
 'sex' => 'Sex',
 'address' => 'Address', 
 'city' => 'City', 
 'state' => 'State',
 'zipcode' => 'Zip Code',
 'phone' => 'Phone', 
 'cell' => 'Cell', 
 'email' => 'Email', 
 'dob' => 'Date of Birth', 
 'age' => 'Age', 
 'camp' => 'Camp', 
 'name_emerg' => 'Emergency Contact',
 'relation_emerg' => 'Relationship', 
 'address_emerg' => 'Emergency Address', 
 'city_emerg' => 'City', 
 'state_emerg' => 'State', 
 'zip_emerg' => 'Zip Code', 
 'phone_emerg' => 'Phone', 
 'cell_emerg' => 'Cell',
 'phone2_emerg' => 'Phone #2',
 'email_emerg' => 'Email', 
 'name_emerg_2' => 'Name', 
 'relation_2' => 'Relationship', 
 'cell_emerg_2' => 'Cell', 
 'phone2_emerg2' => 'Emergency Phone #2',
 'mcn' => 'Medical Center Name',
 'mc_contact' => 'Contact Person', 
 'allergies' => 'Allergies', 
 'food' => 'Food', 
 'other' => 'Other', 
 'epi_pen' => 'EPI Pen', 
 'special' => 'Special', 
 'diet' => 'Diet', 
 'infect' => 'Infect Issues',
 'aware' => 'Issue to be aware', 
 'signature' => 'Signature', 
 'date' => 'Date', 
 'hear' => 'Heard About', 
 'visit' => 'Visit' ); // array variable name => Text to appear in email // array variable name => Text to appear in email
$okMessage = 'Contact form succesfully submitted. Thank you, I will get back to you soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later';

// let's do the sending

try
{
    $emailText = "You have new message from contact form\n=============================\n";

    foreach ($_POST as $key => $value) {

        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    mail($sendTo, $subject, $emailText, "From: " . $from);

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    
    header('Content-Type: application/json');
    
    echo $encoded;
}
else {
    echo $responseArray['message'];
}
