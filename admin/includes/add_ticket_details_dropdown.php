<?php 

    if(isset($_POST['add_item'])) {
        $position = escape($_POST['position']);
        $dropdown_value = escape($_POST['dropdown_value']);

        $query = "INSERT INTO ticket_details_dropdown (position, dropdown_value)";
        $query .= "VALUES('{$position}', '{$dropdown_value}')";
        
        $create_post_query = mysqli_query($connection, $query);

        if(!$create_post_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        header("Location: ticket_details_dropdown.php");
        exit();
    }

?>

<h2>Add dropdown</h2><br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="position">Position </label>
        <input type="number" class="form-control" name="position" required>
    </div>

    <div class="form-group">
        <label for="dropdown_value">Dropdown Text</label>
        <input type="text" class="form-control" name="dropdown_value" required></input>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Add new dropdown?')" class="btn btn-primary" type="submit" name="add_item" value="Add new value">
    </div>
</form>
