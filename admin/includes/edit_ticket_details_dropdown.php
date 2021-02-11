<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }
        
        $query = "SELECT * FROM ticket_details_dropdown WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $position = $row['position'];
            $dropdown_value = $row['dropdown_value'];
        }

        if(isset($_POST['edit'])) {
          
            $position = escape($_POST['position']);
            $dropdown_value = escape($_POST['dropdown_value']);

            $query = "UPDATE ticket_details_dropdown SET ";
            $query .= "position = '{$position}', ";
            $query .= "dropdown_value = '{$dropdown_value}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: ticket_details_dropdown.php");
            exit();
        }    
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="position">Position</label>
        <input value='<?php echo $position; ?>' type="number" class="form-control" name="position" required>
    </div>

    <div class="form-group">
        <label for="dropdown_value">Dropdown Text</label>
        <input value='<?php echo $dropdown_value; ?>' type="text" class="form-control" name="dropdown_value" >
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update agendas page title?')" class="btn btn-primary" type="submit" name="edit" value="Update">
    </div>
</form>