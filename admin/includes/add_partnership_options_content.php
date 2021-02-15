<?php 

    if(isset($_POST['add_slot'])) {
        $slot_type = "simple";
        $position = escape($_POST['position']);
        $content = escape($_POST['content']);
       
        $query = "INSERT INTO partnership_options_content(slot_type, position, content)";
        $query .= "VALUES('{$slot_type}', '{$position}', '{$content}')";
        
        $create_post_query = mysqli_query($connection, $query);

        if(!$create_post_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        header("Location: partnership_options_content.php");
        exit();
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="position">Position</label>
        <input type="number" class="form-control" name="position">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="body" class="form-control" name="content"></textarea>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Add simple slot?')" class="btn btn-primary" type="submit" name="add_slot" value="Add slot">
    </div>
</form>
