<?php 

    if(isset($_POST['add_slot'])) {
        $slot_type = "one_column";

        $stage_name = escape($_POST['stage_name']);
        $start_time = escape($_POST['start_time']);
        $end_time = escape($_POST['end_time']);
        $title = escape($_POST['title']); 
        $content = escape($_POST['content']);

        $foto_1 = escape($_FILES['foto_1']['name']);
        $foto_1_temp = $_FILES['foto_1']['tmp_name'];
        $foto_2 = escape($_FILES['foto_2']['name']);
        $foto_2_temp = $_FILES['foto_2']['tmp_name'];
        $foto_3 = escape($_FILES['foto_3']['name']);
        $foto_3_temp = $_FILES['foto_3']['tmp_name'];
        $foto_4 = escape($_FILES['foto_4']['name']);
        $foto_4_temp = $_FILES['foto_4']['tmp_name'];

        move_uploaded_file($foto_1_temp, "../img/Event_speakers/$foto_1");
        move_uploaded_file($foto_2_temp, "../img/Event_speakers/$foto_2");
        move_uploaded_file($foto_3_temp, "../img/Event_speakers/$foto_3");
        move_uploaded_file($foto_4_temp, "../img/Event_speakers/$foto_4");

        $query = "INSERT INTO q2_agendas_page_content(stage_name, slot_type, start_time, end_time, title, content, foto_1, foto_2, foto_3, foto_4)";
        $query .= "VALUES('{$stage_name}','{$slot_type}','{$start_time}', '{$end_time}', '{$title}', '{$content}', '{$foto_1}', '{$foto_2}', '{$foto_3}', '{$foto_4}')";
        
        $create_post_query = mysqli_query($connection, $query);

        if(!$create_post_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        header("Location: q2_agendas_page_content.php");
    }
?>

<h2>Left column time slot</h2><br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="stage_name">Stage Name (optional)</label>
        <input type="text" class="form-control" name="stage_name">
    </div>

    <div class="form-group">
        <label for="start_time">Start Time</label>
        <input type="time" class="form-control" name="start_time">
    </div>

    <div class="form-group">
        <label for="end_time">End Time</label>
        <input type="time" class="form-control" name="end_time">
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title">
    </div>
 
    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="body" class="form-control" name="content"></textarea>
    </div>

    <div class="form-group">
        <label for="foto_1">Image 1</label>
        <input type="file" name="foto_1">
    </div>
    <div class="form-group">
        <label for="foto_2">Image 2</label>
        <input type="file" name="foto_2">
    </div>
    <div class="form-group">
        <label for="foto_3">Image 3</label>
        <input type="file" name="foto_3">
    </div>
    <div class="form-group">
        <label for="foto_4">Image 4</label>
        <input type="file" name="foto_4">
    </div>

    <div class="form-group">
        <input onclick="return confirm('Add time slot?')" class="btn btn-primary" type="submit" name="add_slot" value="Add time slot">
    </div>
</form>
