<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }
        
        $query = "SELECT * FROM matchmaking_summit_title WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $sub_title = $row['sub_title'];
            $text = $row['text'];
            $date = $row['date'];
        }

        if(isset($_POST['edit'])) {
          
            $title = escape($_POST['title']);
            $sub_title = escape($_POST['sub_title']);
            $text = escape($_POST['text']);
            $date = escape($_POST['date']);

            $query = "UPDATE matchmaking_summit_title SET ";
            $query .= "title = '{$title}', ";
            $query .= "sub_title = '{$sub_title}', ";
            $query .= "text = '{$text}', ";
            $query .= "date = '{$date}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: matchmaking_page_title.php");
            exit();
        }

    
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title</label>
        <input value='<?php echo $title; ?>' type="text" class="form-control" name="title" required>
    </div>

    <div class="form-group">
        <label for="sub_title">Sub Title</label>
        <input value='<?php echo $sub_title; ?>' type="text" class="form-control" name="sub_title" required>
    </div>

    <div class="form-group">
        <label for="date"> Date</label>
        <input value='<?php echo $date; ?>' type="text" class="form-control" name="date">
    </div>

    <div class="form-group">
        <label for="text">Text *</label>
        <textarea id="body" class="form-control" name="text"><?php echo $text; ?></textarea>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update Matchmaking Title?')" class="btn btn-primary" type="submit" name="edit" value="Update">
    </div>
</form>