<?php 
if(isset($_POST['email'])) {
    $email_to = "tb@biznespolska.pl, razvan.crisan@ctotech.io, crsn_razvan@yahoo.com";
    $email_subject = "Website new submit solutions showcase";
     
     
    function died($error) {
        // your error code can go here
        echo "We are sorry, but the form conains errors";
        echo $error."<br /><br />";
        echo "Please correct the errors above<br /><br />";
        die();
    };
     
    // validation expected data exists
    if(!isset($_POST['company-name']) ||
        !isset($_POST['primary-location']) ||
        !isset($_POST['secondary-locations']) ||
        !isset($_POST['name-of-ceo-or-founder']) ||
        !isset($_POST['showcase-presenter']) ||
        !isset($_POST['form-submitter']) ||
        !isset($_POST['telephone'])||
        !isset($_POST['email'])||
        !isset($_POST['more-details'])||
        !isset($_POST['other-comments'])||
        !isset($_POST['invoicing-company-name'])||
        !isset($_POST['address-tax-id'])||
        !isset($_POST['problem-description'])||
        !isset($_POST['solution-description'])||
        !isset($_POST['solution-justification'])||
        !isset($_POST['solution-references'])) {
        died('We are sorry, but the form conains errors');       
    }
     
    $companyName = $_POST['company-name']; // required
    $primaryLocation = $_POST['primary-location']; // required
    $secondaryLocations = $_POST['secondary-locations']; 
    $nameOfCeoOrFounder = $_POST['name-of-ceo-or-founder']; 
    $showcasePresenter = $_POST['showcase-presenter']; // required
    $formSubmitter = $_POST['form-submitter']; // required
    $telephone = $_POST['telephone']; // required
    $email_from = $_POST['email']; // required
    $moreDetails = $_POST['more-details']; 
    $otherComments = $_POST['other-comments'];
    $invoicingCompanyName = $_POST['invoicing-company-name']; // required
    $addressTaxId = $_POST['address-tax-id']; // required
    $problemDescription = $_POST['problem-description']; 
    $solutionDescription = $_POST['solution-description'];
    $solutionJustification = $_POST['solution-justification'];
    $solutionReferences = $_POST['solution-references'];
   
    
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    $phone_exp = '/^[0-9\-\(\)\/\+\s]*$/';
    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Your email address is invalid<br/>';
  }

  if(!preg_match($string_exp,$companyName)) {
    $error_message .= 'Please fill in the company name<br/>';
  }

  if(!preg_match($string_exp,$primaryLocation)) {
    $error_message .= 'Please fill in your primary location<br/>';
  }

  if(!preg_match($string_exp,$showcasePresenter)) {
    $error_message .= 'Please tell us who will present the showcase<br/>';
  }

  if(!preg_match($string_exp,$formSubmitter)) {
    $error_message .= 'Please tell us who is submitting this form<br/>';
  }

  if(!preg_match($phone_exp,$telephone)) {
    $error_message .= 'Please fill in your phone number<br/>';
  }

  if(!preg_match($string_exp,$invoicingCompanyName)) {
    $error_message .= 'Please fill in the invoicing company name<br/>';
  }

  if(!preg_match($string_exp,$addressTaxId)) {
    $error_message .= 'Please fill in your address and tax id<br/>';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Message details.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Company name: ".clean_string($companyName)."\n";
    $email_message .= "Primary location: ".clean_string($primaryLocation)."\n";
    $email_message .= "Secondary locations: ".clean_string($secondaryLocations)."\n";
    $email_message .= "CEO / founder: ".clean_string($nameOfCeoOrFounder)."\n";
    $email_message .= "The showcase will be presented by: ".clean_string($showcasePresenter)."\n";
    $email_message .= "Form submitted by: ".clean_string($formSubmitter)."\n";
    $email_message .= "Phone: ".clean_string($telephone)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "More details: ".clean_string($moreDetails)."\n";
    $email_message .= "Other Comments: ".clean_string($otherComments)."\n";
    $email_message .= "Invoicing company name: ".clean_string($invoicingCompanyName)."\n";
    $email_message .= "Address and tax ID: ".clean_string($addressTaxId)."\n";
    $email_message .= "Problem description: ".clean_string($problemDescription)."\n";
    $email_message .= "Solution Description: ".clean_string($solutionDescription)."\n";
    $email_message .= "Solution Justification: ".clean_string($solutionJustification)."\n";
    $email_message .= "Solution References: ".clean_string($solutionReferences)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
// 'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
echo "Success! <a href='../submit-solutions-showcase.html' style='text-decoration:none;color:#176083;'> Back</a>";
// header("Location: contact.html?mailsend")
?>

<?php
}
die();
?>