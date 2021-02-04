<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }
        
        $query = "SELECT * FROM hero_newsletter_signup WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $first_paragraph = $row['first_paragraph'];
            $second_paragraph = $row['second_paragraph'];
            $btn_text = $row['btn_text'];
        }

        if(isset($_POST['edit'])) {
          
            $title = escape($_POST['title']);
            $first_paragraph = escape($_POST['first_paragraph']);
            $second_paragraph = escape($_POST['second_paragraph']);
            $btn_text = escape($_POST['btn_text']);

            $query = "UPDATE hero_newsletter_signup SET ";
            $query .= "title = '{$title}', ";
            $query .= "first_paragraph = '{$first_paragraph}', ";
            $query .= "second_paragraph = '{$second_paragraph}', ";
            $query .= "btn_text = '{$btn_text}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: hero_newsletter_signup.php");
            exit();
        }

    
?>

<h2>Edit</h2><br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title *</label>
        <input value='<?php echo $title; ?>' type="text" class="form-control" name="title" required>
    </div>

    <div class="form-group">
        <label for="first_paragraph">First Paragraph </label>
        <input value='<?php echo $first_paragraph; ?>' type="text" class="form-control" name="first_paragraph"></input>
    </div>

    <div class="form-group">
        <label for="second_paragraph">Second Paragraph </label>
        <input value='<?php echo $second_paragraph; ?>' type="text" class="form-control" name="second_paragraph">
    </div>

    <div class="form-group">
        <label for="btn_text">Button Text *</label>
        <input value='<?php echo $btn_text; ?>' type="text" class="form-control" name="btn_text" required>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update main page newsletter signup?')" class="btn btn-primary" type="submit" name="edit" value="Edit">
    </div>
</form>