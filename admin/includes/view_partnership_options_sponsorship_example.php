<!-- DISPLAY INFO -->
<a class="btn btn-primary" href="partnership_options_sponsorship_example.php?source=edit_partnership_options_sponsorship_example&id=1">Edit</a>
<br><br>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Text</th>
            <th>Video</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM partnership_options_sponsorship_example WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $content = $row['content'];
            $video = $row['video'];

            echo "<tr>";
            echo "<td>{$content}</td>";
            echo "<td>";
                echo "<div class='table-iframe-container'>";
                echo "<iframe width=\"420\" height=\"315\" src=\"http://www.youtube.com/embed/$video\" frameborder=\"0\" allowfullscreen></iframe>";
                echo "</div>";
             echo "</td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>