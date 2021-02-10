<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }
        
        $query = "SELECT * FROM agendas_page_open_close WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $open = $row['open'];
            $close = $row['close'];
        }

        if(isset($_POST['edit'])) {
          
            $open = escape($_POST['open']);
            $close = escape($_POST['close']);

            $query = "UPDATE agendas_page_open_close SET ";
            $query .= "open = '{$open}', ";
            $query .= "close = '{$close}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: agendas_open_close.php");
            exit();
        }

    
?>

<h2>Edit main page</h2><br>
<form action="" method="post" enctype="multipart/form-data">
  

    <div class="form-group">
        <label for="open">Open Text</label>
        <textarea id="body" class="form-control" name="open"><?php echo $open; ?></textarea>
    </div>

    <div class="form-group">
        <label for="close">Text *</label>
        <textarea id="body2" class="form-control" name="close"><?php echo $close; ?></textarea>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update?')" class="btn btn-primary" type="submit" name="edit" value="Update">
    </div>
</form>