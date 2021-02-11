<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }
        
        $query = "SELECT * FROM solutions_showcase_title WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $content = $row['content'];
        }

        if(isset($_POST['edit'])) {
          
            $title = escape($_POST['title']);
            $content = escape($_POST['content']);

            $query = "UPDATE solutions_showcase_title SET ";
            $query .= "title = '{$title}', ";
            $query .= "content = '{$content}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: solutions_showcase_title.php");
            exit();
        }

    
?>

<form action="" method="post" enctype="multipart/form-data">
  

    <div class="form-group">
        <label for="title">Tile</label>
        <textarea id="body" class="form-control" name="title"><?php echo $title; ?></textarea>
    </div>

    <div class="form-group">
        <label for="content">Text </label>
        <textarea id="body2" class="form-control" name="content"><?php echo $content; ?></textarea>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update?')" class="btn btn-primary" type="submit" name="edit" value="Update">
    </div>
</form>