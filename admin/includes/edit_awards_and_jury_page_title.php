<?php 
    if(isset($_GET['id'])) {
        $edit_id = $_GET['id'];
    }
    
    $query = "SELECT * FROM awards_and_jury_page_title WHERE id = $edit_id";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $text_1 = $row['text_1'];
        $text_2 = $row['text_2'];

    }

    if(isset($_POST['edit'])) {          
        $title = escape($_POST['title']);
        $text_1 = escape($_POST['text_1']);
        $text_2 = escape($_POST['text_2']);


        $query = "UPDATE awards_and_jury_page_title SET ";
        $query .= "title = '{$title}', ";
        $query .= "text_1 = '{$text_1}', ";
        $query .= "text_2 = '{$text_2}' ";

        $query .= "WHERE id = {$edit_id}";

        $update_user = mysqli_query($connection, $query);

        if(!$update_user) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        header("Location: awards_and_jury_page_title.php");
        exit();
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title" >Tile</label>
        <input type="text" class="form-control"  name="title" value="<?php echo $title; ?>">
    </div>
    <div class="form-group">
        <label for="text_1">Tile</label>
        <textarea id="body2" class="form-control" name="text_1"><?php echo $text_1; ?></textarea>
    </div>
    <div class="form-group">
        <label for="text_2">Tile</label>
        <textarea id="body3" class="form-control" name="text_2"><?php echo $text_2; ?></textarea>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update?')" class="btn btn-primary" type="submit" name="edit" value="Update">
    </div>
</form>