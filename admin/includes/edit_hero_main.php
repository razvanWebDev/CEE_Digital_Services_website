<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }
        
        $query = "SELECT * FROM hero_main WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $sub_title = $row['sub_title'];
            $text = $row['text'];
            $event_date = $row['event_date'];
        }

        if(isset($_POST['edit'])) {
          
            $title = escape($_POST['title']);
            $sub_title = escape($_POST['sub_title']);
            $text = escape($_POST['text']);
            $event_date = escape($_POST['event_date']);

            $query = "UPDATE hero_main SET ";
            $query .= "title = '{$title}', ";
            $query .= "sub_title = '{$sub_title}', ";
            $query .= "text = '{$text}', ";
            $query .= "event_date = '{$event_date}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: hero_main.php");
            exit();
        }

    
?>

<h2>Edit main page</h2><br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title *</label>
        <input value='<?php echo $title; ?>' type="text" class="form-control" name="title" required>
    </div>

    <div class="form-group">
        <label for="sub_title">Sub Title *</label>
        <textarea id="hero-subtitle" class="form-control" name="sub_title"><?php echo $sub_title; ?></textarea>
    </div>

    <div class="form-group">
        <label for="text">Text *</label>
        <textarea id="body" class="form-control" name="text"><?php echo $text; ?></textarea>
    </div>

    <div class="form-group">
        <label for="event_date">Event Date *</label>
        <textarea id="hero-date" class="form-control" name="event_date"><?php echo $event_date; ?></textarea>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update Main Page?')" class="btn btn-primary" type="submit" name="edit" value="Edit">
    </div>
</form>