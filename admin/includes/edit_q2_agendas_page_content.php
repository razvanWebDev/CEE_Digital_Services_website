<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }
        
        $query = "SELECT * FROM q2_agendas_page_content WHERE id = $edit_id";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $slot_type = $row['slot_type'];
            //Left Column
            $stage_name = $row['stage_name'];
            $start_time = $row['start_time'];
            $end_time = $row['end_time'];
            $title = $row['title'];
            $content = $row['content'];
            $foto_1 = $row['foto_1'];
            $foto_2 = $row['foto_2'];
            $foto_3 = $row['foto_3'];
            $foto_4 = $row['foto_4'];

            //Right Column
            $right_column_stage_name = $row['right_column_stage_name'];
            $right_column_start_time = $row['right_column_start_time'];
            $right_column_end_time = $row['right_column_end_time'];
            $right_column_title = $row['right_column_title'];
            $right_column_content = $row['right_column_content'];
            $right_column_foto_1 = $row['right_column_foto_1'];
            $right_column_foto_2 = $row['right_column_foto_2'];
            $right_column_foto_3 = $row['right_column_foto_3'];
            $right_column_foto_4 = $row['right_column_foto_4'];

            $rightColumnVisible =( $slot_type == "one_column") ? "none" : "block";
        }

        if(isset($_POST['edit'])) {
            // Left column
            $stage_name = escape($_POST['stage_name']);
            $start_time = escape($_POST['start_time']);
            $end_time = escape($_POST['end_time']);
            $title = escape($_POST['title']); 
            $content = escape($_POST['content']);

            if(ifExists(escape($_FILES['foto_1']['name']))){
                $foto_1 = escape($_FILES['foto_1']['name']);
                $foto_1_temp = $_FILES['foto_1']['tmp_name'];
                move_uploaded_file($foto_1_temp, "../img/Event_speakers/$foto_1");
            }

            if(ifExists(escape($_FILES['foto_2']['name']))){
                $foto_2 = escape($_FILES['foto_2']['name']);
                $foto_2_temp = $_FILES['foto_2']['tmp_name'];
                move_uploaded_file($foto_2_temp, "../img/Event_speakers/$foto_2");
            }

            if(ifExists(escape($_FILES['foto_3']['name']))){
                $foto_3 = escape($_FILES['foto_3']['name']);
                $foto_3_temp = $_FILES['foto_3']['tmp_name'];
                move_uploaded_file($foto_3_temp, "../img/Event_speakers/$foto_3");
            }

            if(ifExists(escape($_FILES['foto_4']['name']))){
                $foto_4 = escape($_FILES['foto_4']['name']);
                $foto_4_temp = $_FILES['foto_4']['tmp_name'];
                move_uploaded_file($foto_4_temp, "../img/Event_speakers/$foto_4");
            }
    
            // right column
            $right_column_stage_name = escape($_POST['right_column_stage_name']);
            $right_column_start_time = escape($_POST['right_column_start_time']);
            $right_column_end_time = escape($_POST['right_column_end_time']);
            $right_column_title = escape($_POST['right_column_title']); 
            $right_column_content = escape($_POST['right_column_content']);

            if(ifExists(escape($_FILES['right_column_foto_1']['name']))){
                $right_column_foto_1 = escape($_FILES['right_column_foto_1']['name']);
                $right_column_foto_1_temp = $_FILES['right_column_foto_1']['tmp_name'];
                move_uploaded_file($right_column_foto_1_temp, "../img/Event_speakers/$right_column_foto_1");
            }

            if(ifExists(escape($_FILES['right_column_foto_2']['name']))){
                $right_column_foto_2 = escape($_FILES['right_column_foto_2']['name']);
                $right_column_foto_2_temp = $_FILES['right_column_foto_2']['tmp_name'];
                move_uploaded_file($right_column_foto_2_temp, "../img/Event_speakers/$right_column_foto_2");
            }

            if(ifExists(escape($_FILES['right_column_foto_3']['name']))){
                $right_column_foto_3 = escape($_FILES['right_column_foto_3']['name']);
                $right_column_foto_3_temp = $_FILES['right_column_foto_3']['tmp_name'];
                move_uploaded_file($right_column_foto_3_temp, "../img/Event_speakers/$right_column_foto_3");
            }

            if(ifExists(escape($_FILES['right_column_foto_4']['name']))){
                $right_column_foto_4 = escape($_FILES['right_column_foto_4']['name']);
                $right_column_foto_4_temp = $_FILES['right_column_foto_4']['tmp_name'];
                move_uploaded_file($right_column_foto_4_temp, "../img/Event_speakers/$right_column_foto_4");
            }

            $query = "UPDATE q2_agendas_page_content SET ";
            $query .= "stage_name = '{$stage_name}', ";
            $query .= "start_time = '{$start_time}', ";
            $query .= "end_time = '{$end_time}', ";
            $query .= "title = '{$title}', ";
            $query .= "content = '{$content}', ";
            $query .= "foto_1 = '{$foto_1}', ";
            $query .= "foto_2 = '{$foto_2}', ";
            $query .= "foto_3 = '{$foto_3}', ";
            $query .= "foto_4 = '{$foto_4}', ";
            $query .= "right_column_stage_name = '{$right_column_stage_name}', ";
            $query .= "right_column_start_time = '{$right_column_start_time}', ";
            $query .= "right_column_end_time = '{$right_column_end_time}', ";
            $query .= "right_column_title = '{$right_column_title}', ";
            $query .= "right_column_content = '{$right_column_content}', ";
            $query .= "right_column_foto_1 = '{$right_column_foto_1}', ";
            $query .= "right_column_foto_2 = '{$right_column_foto_2}', ";
            $query .= "right_column_foto_3 = '{$right_column_foto_3}', ";
            $query .= "right_column_foto_4 = '{$right_column_foto_4}' ";
            $query .= "WHERE id = {$edit_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: q2_agendas_page_content.php");
            exit();
        }
?>

<form action="" method="post" enctype="multipart/form-data">
     <h2 style="display:<?php echo $rightColumnVisible ?>;">Left column time slot</h2><br>

    <div class="form-group">
        <label for="stage_name">Stage Name (optional)</label>
        <input value='<?php echo $stage_name; ?>' type="text" class="form-control" name="stage_name">
    </div>

    <div class="form-group">
        <label for="start_time">Start Time</label>
        <input value='<?php echo $start_time; ?>' type="time" class="form-control" name="start_time">
    </div>

    <div class="form-group">
        <label for="end_time">End Time</label>
        <input value='<?php echo $end_time; ?>' type="time" class="form-control" name="end_time">
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input value='<?php echo $title; ?>' type="text" class="form-control" name="title">
    </div>
 
    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="body" class="form-control" name="content"><?php echo $content; ?></textarea>
    </div>

    <div class="choose-file-container">
        <div class="form-group">
            <img class='agendas-content-img' src="../img/Event_speakers/<?php echo $foto_1; ?>" alt="">
            <label class="choose-file" for="foto_1">Image 1</label>
            <input type="file" name="foto_1" id="foto_1">
        </div>

        <div class="form-group">
            <img class='agendas-content-img' src="../img/Event_speakers/<?php echo $foto_2; ?>" alt="">
            <label class="choose-file" for="foto_2">Image 2</label>
            <input type="file" name="foto_2" id="foto_2">
        </div>

        <div class="form-group">
            <img class='agendas-content-img' src="../img/Event_speakers/<?php echo $foto_3; ?>" alt="">
            <label class="choose-file" for="foto_3">Image 3</label>
            <input type="file" name="foto_3" id="foto_3">
        </div>
        
        <div class="form-group">
            <img class='agendas-content-img' src="../img/Event_speakers/<?php echo $foto_4; ?>" alt="">
            <label class="choose-file" for="foto_4">Image 4</label>
            <input type="file" name="foto_4" id="foto_4">
        </div>
    </div>

    <div style="display:<?php echo $rightColumnVisible ?>;">
        <br><br><h2>Right column time slot</h2><br>
        <div class="form-group">
            <label for="right_column_stage_name">Stage Name (optional)</label>
            <input value='<?php echo $right_column_stage_name; ?>' type="text" class="form-control" name="right_column_stage_name">
        </div>

        <div class="form-group">
            <label for="right_column_start_time">Start Time</label>
            <input value='<?php echo $right_column_start_time; ?>' type="time" class="form-control" name="right_column_start_time">
        </div>

        <div class="form-group">
            <label for="right_column_end_time">End Time</label>
            <input value='<?php echo $right_column_end_time; ?>' type="time" class="form-control" name="right_column_end_time">
        </div>

        <div class="form-group">
            <label for="right_column_title">Title</label>
            <input value='<?php echo $right_column_title; ?>' type="text" class="form-control" name="right_column_title">
        </div>
    
        <div class="form-group">
            <label for="right_column_content">Content</label>
            <textarea id="body2" class="form-control" name="right_column_content"><?php echo $right_column_content; ?></textarea>
        </div>

        <div class="choose-file-container">
            <div class="form-group">
                <img class='agendas-content-img' src="../img/Event_speakers/<?php echo $right_column_foto_1; ?>" alt="">
                <label class="choose-file" for="right_column_foto_1">Image 1</label>
                <input type="file" name="right_column_foto_1" id="right_column_foto_1">
            </div>

            <div class="form-group">
                <img class='agendas-content-img' src="../img/Event_speakers/<?php echo $right_column_foto_2; ?>" alt="">
                <label class="choose-file" for="right_column_foto_2">Image 2</label>
                <input type="file" name="right_column_foto_2" id="right_column_foto_2">
            </div>

            <div class="form-group">
                <img class='agendas-content-img' src="../img/Event_speakers/<?php echo $right_column_foto_3; ?>" alt="">
                <label class="choose-file" for="right_column_foto_3">Image 3</label>
                <input type="file" name="right_column_foto_3" id="right_column_foto_3">
            </div>
            
            <div class="form-group">
                <img class='agendas-content-img' src="../img/Event_speakers/<?php echo $right_column_foto_4; ?>" alt="">
                <label class="choose-file" for="right_column_foto_4">Image 4</label>
                <input type="file" name="right_column_foto_4" id="right_column_foto_4">
            </div>
        </div>
    </div>
    <br><br>
    <div class="form-group">
        <input onclick="return confirm('Update time slot?')" class="btn btn-primary" type="submit" name="edit" value="Update">
    </div>
</form>