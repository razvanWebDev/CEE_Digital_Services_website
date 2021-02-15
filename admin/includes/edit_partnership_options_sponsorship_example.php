<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }

        // Get data from db
        $query = "SELECT * FROM partnership_options_sponsorship_example WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $content = $row['content'];
            $video = $row['video'];
        }
        
        if(isset($_POST['edit'])) {
            // Left column
            $content = escape($_POST['content']);
            $video = escape($_POST['video']);
            $video = getYTVideoId($video);
            
            $query = "UPDATE partnership_options_sponsorship_example SET ";
            $query .= "content = '{$content}', ";
            $query .= "video = '{$video}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: partnership_options_sponsorship_example.php");
            exit();
        }
?>

<!-- TEXT FORM -->
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="body" class="form-control" name="content"><?php echo $content; ?></textarea>
    </div>

    <div class="form-group">
        <label for="video">Youtube Video link</label>
        <input value='<?php echo $video; ?>' tipe="link"  class="form-control" name="video">
    </div>
    <br><br>
    <div class="form-group">
        <input onclick="return confirm('Update?')" class="btn btn-primary" type="submit" name="edit" value="Update">
    </div>
</form>