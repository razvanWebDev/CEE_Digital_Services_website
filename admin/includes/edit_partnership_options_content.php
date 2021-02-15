<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }

        //DELETE IMAGE FILE
        if(isset($_POST['delete_foto_1'])){
            deleteFile("delete_image", "partnership_options_content", "p_image", "id", $edit_id);
        }
    
        
        // Get data from db
        $query = "SELECT * FROM partnership_options_content WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $slot_type = $row['slot_type'];
            //Left Column
            $position = $row['position'];
            $content = $row['content'];
            $p_image = $row['p_image'];
            $video = $row['video'];

            $imageInputVisible =( $slot_type == "with_image") ? "block" : "none";
            $videoInputVisible =( $slot_type == "with_video") ? "block" : "none";

        }
        
        if(isset($_POST['edit'])) {
            // Left column
            $position = escape($_POST['position']);
            $content = escape($_POST['content']);

            $video = escape($_POST['video']);
            $video = getYTVideoId($video);

            if(ifExists(escape($_FILES['p_image']['name']))){
                deleteFileFromRow("partnership_options_content", "p_image", $edit_id, "../img/Partnership_options/");
                uploadImage('p_image', '../img/Partnership_options/', 'p_image');
            }

            $query = "UPDATE partnership_options_content SET ";
            $query .= "position = '{$position}', ";
            $query .= "content = '{$content}', ";
            $query .= "p_image = '{$p_image}', ";
            $query .= "video = '{$video}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: partnership_options_content.php");
            exit();
        }
?>

<!-- Delete image file -->
<!-- <form style="display:<?php echo $imageInputVisible ?>;" action="" method="post">
    <input type="hidden" value="../img/Partnership_options/<?php echo $p_image; ?>" name="delete_image" />
    <input onclick="return confirm('Delete image?')"  type="submit" value="Delete image" class="btn btn-danger"/>
</form>
<br> -->

<!-- TEXT FORM -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <img class='agendas-content-img' src="../img/Partnership_options/<?php echo $p_image; ?>" alt="">
        <label class="choose-file" for="p_image">Image 1</label>
        <input type="file" name="p_image">
    </div>

    <div class="form-group">
        <label for="position">Position</label>
        <input value='<?php echo $position; ?>' type="number" class="form-control" name="position">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="body" class="form-control" name="content"><?php echo $content; ?></textarea>
    </div>

    <div style="display:<?php echo $videoInputVisible; ?>;" class="form-group">
        <label for="video">Video link</label>
        <input value='<?php echo $video; ?>' tipe="link"  class="form-control" name="video">
    </div>
    <br><br>
    <div class="form-group">
        <input onclick="return confirm('Update slot?')" class="btn btn-primary" type="submit" name="edit" value="Update">
    </div>
</form>