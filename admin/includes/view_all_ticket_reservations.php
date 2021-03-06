
<!-- DELETE USERS -->
<?php 
 if(isset($_GET['delete'])) {
    if(isset($_SESSION['username'])){
        $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
        $query = "DELETE FROM reserve_tickets WHERE id = {$the_user_id}";
        $delete_query = mysqli_query($connection, $query);
    }
 }

 //delete in bulk
 if(isset($_POST['checkBoxArray'])){
    foreach($_POST['checkBoxArray'] as $valueId){
       $query = "DELETE FROM reserve_tickets WHERE id = {$valueId}";
       $delete_query = mysqli_query($connection, $query);
    }
}
?>

<!-- DISPLAY RESERVATIONS ON ADMIN PAGE -->
<form id="exportForm" action="includes/export.php" method="post" enctype="multipart/form-data">					
</form>

<button form="exportForm" type="submit" id="dataExport" name="dataExport" value="Export to excel" class="btn btn-primary">Export To Excel</button>
<input form="deleteForm" type="submit" name="submit" class="btn btn-danger float-right" name="deleteSelected" value="Delete Selected" onclick="return confirm('ATENTION!!! Delete selected ticket reservations?')">
<br><br>

<form id="deleteForm" action="" method="post">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
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

            //pagination
            $rowCounter_per_page = 0;
            //the number of news per page
            $items_per_page = 25;
        
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            if($page == "" || $page == 1){
                $page_1 = 0;
            }else{
                $page_1 = ($page * $items_per_page) - $items_per_page;
            }

            $post_query_count = "SELECT * FROM reserve_tickets";
            $select_post_query_count = mysqli_query($connection, $post_query_count);
            $count = mysqli_num_rows($select_post_query_count);
            $count = ceil($count / $items_per_page); 
            
            $query = "SELECT * FROM reserve_tickets ORDER BY id DESC LIMIT $page_1, $items_per_page";
            $select_users = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_users)) {
                $rowCounter_per_page++;
                $totalRowCounter = $rowCounter_per_page + (($page-1) * $items_per_page);
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
                ?>
                <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $id; ?>'></td>
                <?php
                echo "<td>{$totalRowCounter}</td>";
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
</form>

 <!-- pagination -->
<ul class="pagination pagination-sm">
    <?php 
    if($count > 1){
        for($i = 1; $i <= $count; $i++){
            if($i == $page){
                echo "<li class='page-item active'><a href='ticket-reservations.php?page={$i}'>$i</a></li>";
            }else{
                echo "<li class='page-item'><a href='ticket-reservations.php?page={$i}'>$i</a></li>";
            }
        }
    }
    ?>
</ul> 
