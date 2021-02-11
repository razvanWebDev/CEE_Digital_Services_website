<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }
        
        $query = "SELECT * FROM solutions_showcase_content WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $content = $row['content'];
        }

        if(isset($_POST['edit'])) {

            $content = escape($_POST['content']);

            $query = "UPDATE solutions_showcase_content SET ";
            $query .= "content = '{$content}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: solutions_showcase_content.php");
            exit();
        }

    
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="content">Text </label>
        <textarea id="body2" class="form-control" name="content"><?php echo $content; ?></textarea>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update?')" class="btn btn-primary" type="submit" name="edit" value="Update">
    </div>
</form>