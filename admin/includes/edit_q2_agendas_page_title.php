<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }
        
        $query = "SELECT * FROM q2_agendas_page_title WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $date = $row['date'];
            $sub_title = $row['sub_title'];
            $btn_left = $row['btn_left'];
            $btn_right = $row['btn_right'];
            $text = $row["text"];
        }

        if(isset($_POST['edit'])) {
          
            $title = escape($_POST['title']);
            $date = escape($_POST['date']);
            $sub_title = escape($_POST['sub_title']);
            $btn_left = escape($_POST['btn_left']);
            $btn_right = escape($_POST['btn_right']);
            $text = escape($_POST['text']);

            $query = "UPDATE q2_agendas_page_title SET ";
            $query .= "title = '{$title}', ";
            $query .= "date = '{$date}', ";
            $query .= "sub_title = '{$sub_title}', ";
            $query .= "btn_left = '{$btn_left}', ";
            $query .= "btn_right = '{$btn_right}', ";
            $query .= "text = '{$text}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: q2_agendas_page_title.php");
            exit();
        }

    
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title</label>
        <input value='<?php echo $title; ?>' type="text" class="form-control" name="title" required>
    </div>

    <div class="form-group">
        <label for="date">Date</label>
        <input value='<?php echo $date; ?>' type="text" class="form-control" name="date" >
    </div>

    <div class="form-group">
        <label for="sub_title">Sub Title</label>
        
        <textarea id="body2" class="form-control" name="sub_title"><?php echo $sub_title; ?></textarea>
    </div>

    <div class="form-group">
        <label for="btn_left">Left Button</label>
        <input value='<?php echo $btn_left; ?>' type="text" class="form-control" name="btn_left" >
    </div>

    <div class="form-group">
        <label for="btn_right">Right Button</label>
        <input value='<?php echo $btn_right; ?>' type="text" class="form-control" name="btn_right" >
    </div>

    <div class="form-group">
        <label for="text">Text</label>
        <textarea id="body" class="form-control" name="text"><?php echo $text; ?></textarea>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update Q2 agendas page title?')" class="btn btn-primary" type="submit" name="edit" value="Update">
    </div>
</form>