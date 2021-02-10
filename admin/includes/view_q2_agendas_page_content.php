<!-- DELETE ITEMS -->
<?php 
 deleteItem("q2_agendas_page_content");
 deleteBulk("q2_agendas_page_content");
?>

<!-- DISPLAY ITEMS ON ADMIN PAGE -->
<form action="" method="post">
<a class="btn btn-primary" href="q2_agendas_page_content.php?source=add_q2_agendas_page_content">Add one column time slot</a>
<a class="btn btn-primary" href="q2_agendas_page_content.php?source=add_q2_agendas_page_content_two_columns">Add two columns time slot</a>
<input type="submit" name="submit" class="btn btn-danger float-right" name="deleteSelected" value="Delete Selected" onclick="return confirm('Delete selected time slots?')">
<br><br>

<table class="table table-responsive table-bordered table-hover text-center">
    <thead>
        <tr>
        <th rowspan="2" class="text-center"><input type="checkbox" id="selectAllBoxes"></th>
        <th colspan="4" class="text-center">RIGHT COLUMN</th>
        <th colspan="4" class="text-center">LEFT COLUMN</th>
        <th rowspan="2" class="align-middle">Edit</th>
        <th rowspan="2" class="align-middle">Delete</th>
        </tr>
        <tr>
            <th class="text-center">Stage Name</th>
            <th class="text-center">Title</th>
            <th class="text-center">Content</th>
            <th class="text-center">Photos</th>
            <th class="text-center">Stage Name</th>
            <th class="text-center">Title</th>
            <th class="text-center">Content</th>
            <th class="text-center">Photos</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM q2_agendas_page_content ORDER BY start_time";
        $select_all_posts_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
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

            //table data colspan -> spread tables it there is only one column
            $colspan = $slot_type == "one_column" ? 2 : 1;

            echo "<tr>";
            ?>
            <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $id; ?>'></td>
            <?php
            echo "<td colspan='{$colspan}'>{$stage_name}</td>";
            echo "<td colspan='{$colspan}'>{$start_time} {$end_time} {$title}</td>";
            echo "<td colspan='{$colspan}'>{$content}</td>";
            echo "<td colspan='{$colspan}'>";
                echo "<img class='agendas-content-img' src='../img/Event_speakers/{$foto_1}' alt=''>";
                echo "<img class='agendas-content-img' src='../img/Event_speakers/{$foto_2}' alt=''>";
                echo "<img class='agendas-content-img' src='../img/Event_speakers/{$foto_3}' alt=''>";
                echo "<img class='agendas-content-img' src='../img/Event_speakers/{$foto_4}' alt=''>";
            echo "</td>";
            if($slot_type == "two_columns"){
                echo "<td>{$right_column_stage_name}</td>";    
                echo "<td>{$right_column_start_time} {$right_column_end_time} {$right_column_title}</td>";
                echo "<td>{$right_column_content}</td>";
                echo "<td>";
                    echo "<img class='agendas-content-img' src='../img/Event_speakers/{$right_column_foto_1}' alt=''>";
                    echo "<img class='agendas-content-img' src='../img/Event_speakers/{$right_column_foto_2}' alt=''>";
                    echo "<img class='agendas-content-img' src='../img/Event_speakers/{$right_column_foto_3}' alt=''>";
                    echo "<img class='agendas-content-img' src='../img/Event_speakers/{$right_column_foto_4}' alt=''>";
                echo "</td>";
            }
            echo "<td><a href='q2_agendas_page_content.php?source=edit_q2_agendas_page_content&id={$id}'>Edit</a></td>";
            echo "<td><a href='q2_agendas_page_content.php?delete={$id}' onClick=\"javascript:return confirm('Delete time slot?');\">Delete</a></td>";
            echo "</tr>";
        }         
        ?>
    </tbody>            
</table>
</form>
 
