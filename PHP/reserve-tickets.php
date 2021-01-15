<?php include "db.php";
if(isset($_POST['submit'])) {
    $email_to = "tb@biznespolska.pl, razvan.crisan@ctotech.io, crsn_razvan@yahoo.com";
    $email_subject = "Website Matchmacking Summit ticket reservation";
     
    function died($error) {
        // your error code can go here
        echo $error."<br>";
        die();
    };
     
    // validation expected data exists
    if(!isset($_POST['company-name']) ||
        !isset($_POST['matchmaking-option-select']) ||
        !isset($_POST['name']) ||
        !isset($_POST['position']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['invoicing-company-name']) ||
        !isset($_POST['contact-email']) ||
        !isset($_POST['contact-phone']) ||
        !isset($_POST['tax-id']) ||
        !isset($_POST['ticket-reservation-details-select']) ||
        !isset($_POST['2nd-participant-name']) ||
        !isset($_POST['2nd-participant-title']) ||
        !isset($_POST['2nd-participant-email']) ||
        !isset($_POST['2nd-participant-telephone']) ||
        !isset($_POST['aditional-notes'])) {
        died('We are sorry, but the form conains errors');       
    };
     
    $companyName = $_POST['company-name']; // required
    $matchmakingOptionSelect = $_POST['matchmaking-option-select'];
    $name = $_POST['name']; // required
    $position = $_POST['position']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // required
    $invoicingCompanyName = $_POST['invoicing-company-name']; // required
    $contactEmail = $_POST['contact-email']; // required
    $contactPhone = $_POST['contact-phone']; // required
    $taxId = $_POST['tax-id'];
    $ticketReservationDetailsSelect = $_POST['ticket-reservation-details-select']; // required
    $secondParticipantName = $_POST['2nd-participant-name'];
    $secondParticipantTitle = $_POST['2nd-participant-title'];
    $secondParticipantEmail = $_POST['2nd-participant-email'];
    $secondParticipantTelephone = $_POST['2nd-participant-telephone'];
    $aditionalNotes = $_POST['aditional-notes'];
   
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    $string_exp = "/^[A-Za-z .'-]+$/";
    $phone_exp = '/^[0-9\-\(\)\/\+\s]*$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Your email address is invalid<br>';
  }

  if(!preg_match($string_exp,$name)) {
    $error_message .= 'Please fill in your name<br>';
  }

 if(!preg_match($phone_exp,$telephone)) {
    $error_message .= 'Please write your telephone number<br>';
  }

  if(!preg_match($email_exp,$contactEmail)) {
    $error_message .= 'Please fill in your contact email<br>';
  }
  if(!preg_match($phone_exp,$contactPhone)) {
    $error_message .= 'Please fill in your contact phone number<br>';
  }
  if($ticketReservationDetailsSelect == '0') {
    $error_message .= 'Please select the ticket reservation option<br>';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }

//Email to client=========================================
$submitter_email_subject = "Confirmation of your Ticket Reservation - CEE Digital Services Summit, 13 January";

$submitter_email_message = "
<html>
<head>
    <title>Thanks for reserving your Ticket for CEE Digital Services Summit, 13 January 2021.</title>
</head>
<body>
    <h2>These are next steps:</h2>
    <ul>
        <li>
            You will receive automatic update just one day before the event about final Speakers and Agenda.  
        </li>
        <li>
            On 11 January, you will receive automatic notice from Hopin (this is the platform that we are using for the
            event), asking you to register your profile on Hopin. <a href='https://www.youtube.com/watch?v=EpErMqMyNN4'
                target='_blank'>(It's very easy and takes about 90 seconds to do. Here is Video of how the Hopin
                platform works.)</a>
        </li>
        <li>
            For those of you with full access (1-on-1 Video Meetings, video-networking) to the event, it is especially
            important to fill out your Registration profile fully on Hopin.
        </li>
        <li>
            The event begins on 13 January (8am CET). You will get 1 more reminder from Hopin 1 hour before the event
            starts.
        </li>
        <li>
            Danuta from our office will issue you invoice within 24 hours (for those of you who have requested 1-on-1 meetings option).
        </li>
        <li>
            Please feel free to email Thom Barnhardt (tb@biznespolska.pl) with any questions.
        </li>
    </ul>
</body>
</html>
";

$submitter_headers = "From: CEE Digital Services <fdipolan@es48.siteground.eu> \r\n";
$submitter_headers .= "Reply-To: Thom Barnhardt <tb@biznespolska.pl>" . "\r\n" . "X-Mailer: PHP/" . phpversion();
$submitter_headers .= "MIME-Version: 1.0" . "\r\n";
$submitter_headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


mail($email_from, $submitter_email_subject, $submitter_email_message, $submitter_headers);

//Own Email==========================================  
    $email_message = "Message details.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Company name: ".clean_string($companyName)."\n";
    $email_message .= "Matchmaking option: ".clean_string($matchmakingOptionSelect)."\n";
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Title: ".clean_string($position)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($telephone)."\n";
    $email_message .= "Invoicing Company: ".clean_string($invoicingCompanyName)."\n";
    $email_message .= "Contact Email: ".clean_string($contactEmail)."\n";
    $email_message .= "Contact Phone: ".clean_string($contactPhone)."\n";
    $email_message .= "Tax ID: ".clean_string($taxId)."\n";
    $email_message .= "Ticket reservation details: ".clean_string($ticketReservationDetailsSelect)."\n";
    $email_message .= "Secondary Participant Name: ".clean_string($secondParticipantName)."\n";
    $email_message .= "Secondary Participant Title: ".clean_string($secondParticipantTitle)."\n";
    $email_message .= "Secondary Participant Email: ".clean_string($secondParticipantEmail)."\n";
    $email_message .= "Secondary Participant Phone: ".clean_string($secondParticipantTelephone)."\n";
    $email_message .= "Aditional Notes: ".clean_string($aditionalNotes)."\n";
         
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  

//DB=======================================================

$companyName = mysqli_real_escape_string($connection, $companyName);
$matchmakingOptionSelect = mysqli_real_escape_string($connection, $matchmakingOptionSelect);
$name = mysqli_real_escape_string($connection, $name);
$position = mysqli_real_escape_string($connection, $position);
$email_from = mysqli_real_escape_string($connection, $email_from);
$telephone = mysqli_real_escape_string($connection, $telephone);
$invoicingCompanyName = mysqli_real_escape_string($connection, $invoicingCompanyName);
$contactEmail = mysqli_real_escape_string($connection, $contactEmail);
$contactPhone = mysqli_real_escape_string($connection, $contactPhone);
$taxId = mysqli_real_escape_string($connection, $taxId);
$ticketReservationDetailsSelect = mysqli_real_escape_string($connection, $ticketReservationDetailsSelect);
$secondParticipantName = mysqli_real_escape_string($connection, $secondParticipantName);
$secondParticipantTitle = mysqli_real_escape_string($connection, $secondParticipantTitle);
$secondParticipantEmail = mysqli_real_escape_string($connection, $secondParticipantEmail);
$secondParticipantTelephone = mysqli_real_escape_string($connection, $secondParticipantTelephone);
$aditionalNotes = mysqli_real_escape_string($connection, $aditionalNotes);

$query = "INSERT INTO reserve_tickets(company_name, matchmacking_options, participant_name, position, ";
$query .= "email, phone, invoicing_company_name, contact_email, contact_phone, ";
$query .= "tax_id, ticket_reservation_details, second_participant_name, second_participant_position, ";
$query .= "second_participant_email, second_participant_phone, additional_notes) ";
$query .= "VALUES ('$companyName', '$matchmakingOptionSelect', '$name', '$position', '$email_from', ";
$query .= "'$telephone', '$invoicingCompanyName', '$contactEmail', '$contactPhone', ";
$query .= "'$taxId', '$ticketReservationDetailsSelect', '$secondParticipantName', '$secondParticipantTitle', ";
$query .= "'$secondParticipantEmail', '$secondParticipantTelephone', '$aditionalNotes')";

$result =  mysqli_query($connection, $query);

if(!$result) {
  die("Failed" . mysqli_error());
}

mysqli_close($connection);

header("Location: ../reserve-tickets-success.html");

?>

<?php
}
die();
?>