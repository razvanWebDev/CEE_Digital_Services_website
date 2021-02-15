<?php 
// DELETE ITEMS
// delete individually
if(isset($_GET['delete'])) {
    $delete_id = mysqli_real_escape_string($connection, $_GET['delete']);
    //remove image file from folder
    deleteFileFromRow("partnership_options_content", 'p_image', $delete_id, "../img/Partnership_options/");
    //remove from db
    deleteItem('partnership_options_content', $delete_id);
}

//delete in bulk
if(isset($_POST['checkBoxArray'])){
    foreach($_POST['checkBoxArray'] as $delete_id){
        deleteFileFromRow("partnership_options_content", 'p_image', $delete_id, "../img/Partnership_options/");
        deleteItem("partnership_options_content", $delete_id);
    }
}
 
?>

<!-- DISPLAY ITEMS ON ADMIN PAGE -->
<form action="" method="post">
<a class="btn btn-primary" href="partnership_options_content.php?source=add_partnership_options_content">Add simple slot</a>
<a class="btn btn-primary" href="partnership_options_content.php?source=add_partnership_options_content_with_image">Add slot with image</a>
<a class="btn btn-primary" href="partnership_options_content.php?source=add_partnership_options_content_with_video">Add slot with video</a>
<input type="submit" name="submit" class="btn btn-danger float-right" name="deleteSelected" value="Delete Selected" onclick="return confirm('Delete selected time slots?')">
<br><br>

<table class="table table-responsive table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center" class="text-center"><input type="checkbox" id="selectAllBoxes"></th>
            <th class="text-center">Position</th>
            <th>text</th>
            <th>Image</th>
            <th>Video</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM partnership_options_content ORDER BY position";
        $select_all_posts_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
            $id = $row['id'];
            $slot_type = $row['slot_type'];
            //Left Column
            $position = $row['position'];
            $content = $row['content'];
            $p_image = $row['p_image'];
            $video = $row['video'];

            echo "<tr>";
                ?>
                <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $id; ?>'></td>
                <?php
                echo "<td>{$position}</td>";
                echo "<td>{$content}</td>";
                echo "<td>";
                    if(ifExists($p_image)){
                        echo "<img class='table-img' src='../img/Partnership_options/{$p_image}' alt=''>";
                    }
                echo "</td>";
                echo "<td>";
                    if(ifExists($video)){
                        echo "<div class='table-iframe-container'>";
                        echo "<iframe width=\"420\" height=\"315\" src=\"http://www.youtube.com/embed/$video\" frameborder=\"0\" allowfullscreen></iframe>";
                        echo "</div>";
                    }
                echo "</td>";
                echo "<td><a href='partnership_options_content.php?source=edit_partnership_options_content&id={$id}'>Edit</a></td>";
                echo "<td><a href='partnership_options_content.php?delete={$id}' onClick=\"javascript:return confirm('Delete slot?');\">Delete</a></td>";
            echo "</tr>";
        }         
        ?>
    </tbody>            
</table>
</form>
 
