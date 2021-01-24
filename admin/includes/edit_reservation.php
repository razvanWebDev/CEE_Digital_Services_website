<?php 
        if(isset($_GET['r_id'])) {
            $the_reservation_id = $_GET['r_id'];
        }
        
        $query = "SELECT * FROM reserve_tickets WHERE id = $the_reservation_id";
        $select_reservation_by_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_reservation_by_id)) {
            $id = $row['id'];
            $company_name = $row['company_name'];
            $matchmacking_options = $row['matchmacking_options'];
            $participant_name = $row['participant_name'];
            $position = $row['position'];
            $email = $row['email'];
            $phone = $row['phone'];
            $invoicing_company_name = $row['invoicing_company_name'];
            $contact_email = $row['contact_email'];
            $contact_phone = $row['contact_phone'];
            $tax_id = $row['tax_id'];
            $ticket_reservation_details = $row['ticket_reservation_details'];
            $second_participant_name = $row['second_participant_name'];
            $second_participant_position = $row['second_participant_position'];
            $second_participant_email = $row['second_participant_email'];
            $second_participant_phone = $row['second_participant_phone'];
            $additional_notes = $row['additional_notes'];
        }

        if(isset($_POST['update_reservation'])) {
          
            $company_name = escape($_POST['company_name']);
            $matchmacking_options = escape($_POST['matchmacking_options']);
            $participant_name = escape($_POST['participant_name']);
            $position = escape($_POST['position']);
            $email = escape($_POST['email']);
            $phone = escape($_POST['phone']);
            $invoicing_company_name = escape($_POST['invoicing_company_name']);
            $contact_email = escape($_POST['contact_email']);
            $contact_phone = escape($_POST['contact_phone']);
            $tax_id = escape($_POST['tax_id']);
            $ticket_reservation_details = escape($_POST['ticket_reservation_details']);
            $second_participant_name = escape($_POST['second_participant_name']);
            $second_participant_position = escape($_POST['second_participant_position']);
            $second_participant_email = escape($_POST['second_participant_email']);
            $second_participant_phone = escape($_POST['second_participant_phone']);
            $additional_notes = escape($_POST['additional_notes']);
            
            


            $query = "UPDATE reserve_tickets SET ";
            $query .= "company_name = '{$company_name}', ";
            $query .= "matchmacking_options = '{$matchmacking_options}', ";
            $query .= "participant_name = '{$participant_name}', ";
            $query .= "position = '{$position}', ";
            $query .= "email = '{$email}', ";
            $query .= "phone = '{$phone}', ";
            $query .= "invoicing_company_name = '{$invoicing_company_name}', ";
            $query .= "contact_email = '{$contact_email}', ";
            $query .= "contact_phone = '{$contact_phone}', ";
            $query .= "tax_id = '{$tax_id}', ";
            $query .= "ticket_reservation_details = '{$ticket_reservation_details}', ";
            $query .= "second_participant_name = '{$second_participant_name}', ";
            $query .= "second_participant_position = '{$second_participant_position}', ";
            $query .= "second_participant_email = '{$second_participant_email}', ";
            $query .= "second_participant_phone = '{$second_participant_phone}', ";
            $query .= "additional_notes = '{$additional_notes}' ";
            $query .= "WHERE id = {$the_reservation_id}";

            $update_post = mysqli_query($connection, $query);

            if(!$update_post) {
                die("QUERY FAILED" . mysqli_error($connection));
            }

            header("Location: ticket-reservations.php");
            exit();
        }
        
?>

<h2>Edit reservation</h2><br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="company_name">Company Name *</label>
        <input value="<?php echo $company_name; ?>" type="text" class="form-control" name="company_name" required>
    </div>

    <div class="form-group">
        <label for="matchmacking_options">Matchmacking Options</label>
        <input type="text" value="<?php echo $matchmacking_options ?>" class="form-control" name="matchmacking_options">
    </div>

    <div class="form-group">
        <label for="ticket_reservation_details">Reservation Details *</label>
        <input value="<?php echo $ticket_reservation_details; ?>" type="text" class="form-control" name="ticket_reservation_details" required>
    </div>

    <div class="form-group">
        <label for="participant_name">Participant Name *</label>
        <input value="<?php echo $participant_name; ?>" type="text" class="form-control" name="participant_name" required>
    </div>

    <div class="form-group">
        <label for="position">Title *</label>
        <input value="<?php echo $position; ?>" type="text" class="form-control" name="position" required>
    </div>

    <div class="form-group">
        <label for="email">Email *</label>
        <input value="<?php echo $email; ?>" type="email" class="form-control" name="email" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone *</label>
        <input value="<?php echo $phone; ?>" type="text" class="form-control" name="phone" required>
    </div>
    
    <div class="form-group">
        <label for="invoicing_company_name">Invoicing Company *</label>
        <input value="<?php echo $invoicing_company_name; ?>" type="text" class="form-control" name="invoicing_company_name" required>
    </div>
    
    <div class="form-group">
        <label for="contact_email">Contact Email *</label>
        <input value="<?php echo $contact_email; ?>" type="email" class="form-control" name="contact_email" required>
    </div>
    
    <div class="form-group">
        <label for="contact_phone">Contact Phone *</label>
        <input value="<?php echo $contact_phone; ?>" type="text" class="form-control" name="contact_phone" required>
    </div>
    
    <div class="form-group">
        <label for="tax_id">Tax Id</label>
        <input value="<?php echo $tax_id; ?>" type="text" class="form-control" name="tax_id">
    </div>
    
    <div class="form-group">
        <label for="second_participant_name">Second Participant Name</label>
        <input value="<?php echo $second_participant_name; ?>" type="text" class="form-control" name="second_participant_name">
    </div>
    
    <div class="form-group">
        <label for="second_participant_position">Second Participant Position</label>
        <input value="<?php echo $second_participant_position; ?>" type="text" class="form-control" name="second_participant_position">
    </div>
    
    <div class="form-group">
        <label for="second_participant_email">Second Participant Email</label>
        <input value="<?php echo $second_participant_email; ?>" type="email" class="form-control" name="second_participant_email">
    </div>
    
    <div class="form-group">
        <label for="second_participant_phone">Second Participant Phone</label>
        <input value="<?php echo $second_participant_phone; ?>" type="text" class="form-control" name="second_participant_phone">
    </div>


    <div class="form-group">
        <label for="additional_notes">Additional Notes</label>
        <textarea id="body" class="form-control" name="additional_notes"><?php echo $additional_notes; ?></textarea>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update reservation?')" class="btn btn-primary" type="submit" name="update_reservation" value="Update">
    </div>
</form>