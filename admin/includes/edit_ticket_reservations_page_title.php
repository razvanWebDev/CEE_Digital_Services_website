<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }
        
        $query = "SELECT * FROM ticket_reservations_page_title WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $text = $row['text'];
        }

        if(isset($_POST['edit'])) {
          
            $title = escape($_POST['title']);
            $text = escape($_POST['text']);

            $query = "UPDATE ticket_reservations_page_title SET ";
            $query .= "title = '{$title}', ";
            $query .= "text = '{$text}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: ticket-reservations_page_title.php");
            exit();
        }

    
?>

<form action="" method="post" enctype="multipart/form-data">
  

    <div class="form-group">
        <label for="title">Tile</label>
        <textarea id="body" class="form-control" name="title"><?php echo $title; ?></textarea>
    </div>

    <div class="form-group">
        <label for="text">Text </label>
        <textarea id="body2" class="form-control" name="text"><?php echo $text; ?></textarea>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update?')" class="btn btn-primary" type="submit" name="edit" value="Update">
    </div>
</form>