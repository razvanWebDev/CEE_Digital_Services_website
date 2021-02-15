<?php 
        if(isset($_GET['id'])) {
            $edit_id = $_GET['id'];
        }

        //DELETE IMAGE FILE
        if(isset($_POST['delete_foto_1'])){
            deleteFile("delete_foto_1", "q2_agendas_page_content", "foto_1", "id", $edit_id);
        }
        if(isset($_POST['delete_foto_2'])){
            deleteFile("delete_foto_2", "q2_agendas_page_content", "foto_2", "id", $edit_id);
        }
        if(isset($_POST['delete_foto_3'])){
            deleteFile("delete_foto_3", "q2_agendas_page_content", "foto_3", "id", $edit_id);
        }
        if(isset($_POST['delete_foto_4'])){
            deleteFile("delete_foto_4", "q2_agendas_page_content", "foto_4", "id", $edit_id);
        }
        if(isset($_POST['delete_right_column_foto_1'])){
            deleteFile("delete_right_column_foto_1", "q2_agendas_page_content", "right_column_foto_1", "id", $edit_id);
        }
        if(isset($_POST['delete_right_column_foto_2'])){
            deleteFile("delete_right_column_foto_2", "q2_agendas_page_content", "right_column_foto_2", "id", $edit_id);
        }
        if(isset($_POST['delete_right_column_foto_3'])){
            deleteFile("delete_right_column_foto_3", "q2_agendas_page_content", "right_column_foto_3", "id", $edit_id);
        }
        if(isset($_POST['delete_right_column_foto_4'])){
            deleteFile("delete_right_column_foto_4", "q2_agendas_page_content", "right_column_foto_4", "id", $edit_id);
        }
        
        // Get data from db
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

        $display_delete_image_button_1 = ifExists($foto_1) ? "block" : "none";
        $display_delete_image_button_2 = ifExists($foto_2) ? "block" : "none";
        $display_delete_image_button_3 = ifExists($foto_3) ? "block" : "none";
        $display_delete_image_button_4 = ifExists($foto_4) ? "block" : "none";
        $display_delete_image_button_5 = ifExists($right_column_foto_1) ? "block" : "none";
        $display_delete_image_button_6 = ifExists($right_column_foto_2) ? "block" : "none";
        $display_delete_image_button_7 = ifExists($right_column_foto_3) ? "block" : "none";
        $display_delete_image_button_8 = ifExists($right_column_foto_4) ? "block" : "none";

        if(isset($_POST['edit'])) {
            // Left column
            $stage_name = escape($_POST['stage_name']);
            $start_time = escape($_POST['start_time']);
            $end_time = escape($_POST['end_time']);
            $title = escape($_POST['title']); 
            $content = escape($_POST['content']);

            if(ifExists(escape($_FILES['foto_1']['name']))){
                deleteFileFromRow("q2_agendas_page_content", "foto_1", $edit_id, "../img/Event_speakers/");
                uploadImage('foto_1', '../img/Event_speakers/', 'foto_1');
            }

            if(ifExists(escape($_FILES['foto_2']['name']))){
                deleteFileFromRow("q2_agendas_page_content", "foto_2", $edit_id, "../img/Event_speakers/");
                uploadImage('foto_2', '../img/Event_speakers/', 'foto_2');
            }

            if(ifExists(escape($_FILES['foto_3']['name']))){
                deleteFileFromRow("q2_agendas_page_content", "foto_3", $edit_id, "../img/Event_speakers/");
                uploadImage('foto_3', '../img/Event_speakers/', 'foto_3');
            }

            if(ifExists(escape($_FILES['foto_4']['name']))){
                deleteFileFromRow("q2_agendas_page_content", "foto_4", $edit_id, "../img/Event_speakers/");
                uploadImage('foto_4', '../img/Event_speakers/', 'foto_4');
            }
    
            // right column
            $right_column_stage_name = escape($_POST['right_column_stage_name']);
            $right_column_start_time = escape($_POST['right_column_start_time']);
            $right_column_end_time = escape($_POST['right_column_end_time']);
            $right_column_title = escape($_POST['right_column_title']); 
            $right_column_content = escape($_POST['right_column_content']);

            if(ifExists(escape($_FILES['right_column_foto_1']['name']))){
                deleteFileFromRow("q2_agendas_page_content", "right_column_foto_1", $edit_id, "../img/Event_speakers/");
                uploadImage('right_column_foto_1', '../img/Event_speakers/', 'right_column_foto_1');
            }

            if(ifExists(escape($_FILES['right_column_foto_2']['name']))){
                deleteFileFromRow("q2_agendas_page_content", "right_column_foto_2", $edit_id, "../img/Event_speakers/");
                uploadImage('right_column_foto_2', '../img/Event_speakers/', 'right_column_foto_2');
            }

            if(ifExists(escape($_FILES['right_column_foto_3']['name']))){
                deleteFileFromRow("q2_agendas_page_content", "right_column_foto_3", $edit_id, "../img/Event_speakers/");
                uploadImage('right_column_foto_3', '../img/Event_speakers/', 'right_column_foto_3');
            }

            if(ifExists(escape($_FILES['right_column_foto_4']['name']))){
                deleteFileFromRow("q2_agendas_page_content", "right_column_foto_4", $edit_id, "../img/Event_speakers/");
                uploadImage('right_column_foto_4', '../img/Event_speakers/', 'right_column_foto_4');
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

<h2 style="display:<?php echo $rightColumnVisible ?>;">Left column time slot</h2><br>

<!-- Left columns delete fotos -->
<div class="delete-buttons-container">
    <form action="" method="post">
        <input type="hidden" value="../img/Event_speakers/<?php echo $foto_1; ?>" name="delete_foto_1" />
        <input onclick="return confirm('Delete image 1?')"  type="submit" value="Delete image 1" class="btn btn-danger" style="display:<?php echo $display_delete_image_button_1; ?>;"/>
    </form>
    <form action="" method="post">
        <input type="hidden" value="../img/Event_speakers/<?php echo $foto_2; ?>" name="delete_foto_2" />
        <input onclick="return confirm('Delete image 2?')"  type="submit" value="Delete image 2" class="btn btn-danger" style="display:<?php echo $display_delete_image_button_2; ?>;"/>
    </form>
    <form action="" method="post">
        <input type="hidden" value="../img/Event_speakers/<?php echo $foto_3; ?>" name="delete_foto_3" />
        <input onclick="return confirm('Delete image 3?')"  type="submit" value="Delete image 3" class="btn btn-danger" style="display:<?php echo $display_delete_image_button_3; ?>;"/>
    </form>
    <form action="" method="post">
        <input type="hidden" value="../img/Event_speakers/<?php echo $foto_4; ?>" name="delete_foto_4" />
        <input onclick="return confirm('Delete image 4?')"  type="submit" value="Delete image 4" class="btn btn-danger" style="display:<?php echo $display_delete_image_button_4; ?>;"/>
    </form>
</div>

<!-- TEXT FORM -->
<form action="" method="post" enctype="multipart/form-data">
<!-- Left columns upload fotos -->
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
<!-- Left column text -->
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

<!-- Right column text -->
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
<!-- Right column foto uploads -->
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

<!-- Right columns delete fotos -->
<div class="delete-buttons-container">
    <form action="" method="post">
        <input type="hidden" value="../img/Event_speakers/<?php echo $right_column_foto_1; ?>" name="delete_right_column_foto_1" />
        <input onclick="return confirm('Delete image 1?')"  type="submit" value="Delete image 1" class="btn btn-danger" style="display:<?php echo $display_delete_image_button_5; ?>;"/>
    </form>
    <form action="" method="post">
        <input type="hidden" value="../img/Event_speakers/<?php echo $right_column_foto_2; ?>" name="delete_right_column_foto_2" />
        <input onclick="return confirm('Delete image 2?')"  type="submit" value="Delete image 2" class="btn btn-danger" style="display:<?php echo $display_delete_image_button_6; ?>;"/>
    </form>
    <form action="" method="post">
        <input type="hidden" value="../img/Event_speakers/<?php echo $right_column_foto_3; ?>" name="delete_right_column_foto_3" />
        <input onclick="return confirm('Delete image 3?')"  type="submit" value="Delete image 3" class="btn btn-danger" style="display:<?php echo $display_delete_image_button_7; ?>;"/>
    </form>
    <form action="" method="post">
        <input type="hidden" value="../img/Event_speakers/<?php echo $right_column_foto_4; ?>" name="delete_right_column_foto_4" />
        <input onclick="return confirm('Delete image 4?')"  type="submit" value="Delete image 4" class="btn btn-danger" style="display:<?php echo $display_delete_image_button_8; ?>;"/>
    </form>
</div>