
<!-- DELETE USERS -->
<?php 
 if(isset($_GET['delete'])) {
    if(isset($_SESSION['username'])){
        $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
        $query = "DELETE FROM reserve_tickets WHERE id = {$the_user_id}";
        $delete_query = mysqli_query($connection, $query);
    }
 
 }
?>

<!-- DISPLAY RESERVATIONS ON ADMIN PAGE -->
<form action="includes/export.php" method="post" enctype="multipart/form-data">					
    <button type="submit" id="dataExport" name="dataExport" value="Export to excel" class="btn btn-primary">Export To Excel</button>
    <br><br>
    <a href="includes/export.php">Download</a>
</form>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nr</th>
            <th>Company name</th>
            <th>Matchmaking Options</th>
            <th>Participant Name</th>
            <th>Position</th>
            <th>Email</th> 
            <th>Phone</th> 
            <th>Invoicing Company</th> 
            <th>Contact Email</th> 
            <th>Contact Phone</th> 
            <th>Tax Id</th> 
            <th>Ticket Reservations Details</th> 
            <th>Second Participant Name</th> 
            <th>Second Participant Position</th> 
            <th>Second Participant Email</th>
            <th>Second Participant Phone</th> 
            <th>Additional Notes</th> 
            <th>Edit</>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 

        $row_counter = 0;
        
        $query = "SELECT * FROM reserve_tickets";
        $select_users = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users)) {
            $row_counter++;
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

            echo "<tr>";
            echo "<td>{$row_counter}</td>";
            echo "<td>{$company_name}</td>";
            echo "<td>{$matchmacking_options}</td>";
            echo "<td>{$participant_name}</td>";
            echo "<td>{$position}</td>";
            echo "<td>{$email}</td>";
            echo "<td>{$phone}</td>";
            echo "<td>{$invoicing_company_name}</td>";
            echo "<td>{$contact_email}</td>";
            echo "<td>{$contact_phone}</td>";
            echo "<td>{$tax_id}</td>";
            echo "<td>{$ticket_reservation_details}</td>";
            echo "<td>{$second_participant_name}</td>";
            echo "<td>{$second_participant_position}</td>";
            echo "<td>{$second_participant_email}</td>";
            echo "<td>{$second_participant_phone}</td>";
            echo "<td>{$additional_notes}</td>";
          
            echo "<td><a href='ticket-reservations.php?source=edit_reservation&r_id={$id}'>Edit</a></td>";
            echo "<td><a href='ticket-reservations.php?delete={$id}' onClick=\"javascript:return confirm('Delete {$id}?');\">Delete</a></td>";
            echo "</tr>";
            
        } 
        ?>
    </tbody>                            
</table>