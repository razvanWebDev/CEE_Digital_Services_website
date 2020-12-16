<?php 
if(isset($_POST['email'])) {
    $email_to = "tb@biznespolska.pl, razvan.crisan@ctotech.io, crsn_razvan@yahoo.com";
    $email_subject = "Website newslettes signup";
     
     
    function died($error) {
        // your error code can go here
        echo "We are sorry, but the form conains errors";
        echo $error."<br /><br />";
        echo "Please correct the errors above<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first-name']) ||
        !isset($_POST['last-name']) ||
        !isset($_POST['position']) ||
        !isset($_POST['company-name']) ||
        !isset($_POST['email']) {
        died('We are sorry, but the form conains errors');       
    }
     
    $firstName = $_POST['first-name']; // required
    $lastName = $_POST['last-name']; // required
    $position = $_POST['position']; // required
    $companyName = $_POST['company-name']; // required
    $email_from = $_POST['email']; // required
   
    
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Your email address is invalid<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$firstName)) {
    $error_message .= 'Please write your first name<br />';
  }

  if(!preg_match($string_exp,$lastName)) {
    $error_message .= 'Please write your last name<br />';
  }

  if(!preg_match($string_exp,$position)) {
    $error_message .= 'Please write your position/title<br />';
  }

  if(!preg_match($string_exp,$companyName)) {
    $error_message .= 'Please write your company name<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Message details.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($firstName). " ".clean_string($lastName)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Company: ".clean_string($companyName)."\n";
    $email_message .= "Title: ".clean_string($position)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
// 'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
echo "Success! <a href='newsletter-signup.html' style='text-decoration:none;color:#fc9f0a;'> Back</a>";
// header("Location: contact.html?mailsend")
?>

<?php
}
die();
?>