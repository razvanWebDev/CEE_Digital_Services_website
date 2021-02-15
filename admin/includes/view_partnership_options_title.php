<!-- DISPLAY INFO -->
<a class="btn btn-primary" href="partnership_options_title.php?source=edit_partnership_options_title&id=1">Edit Title</a>
<br><br>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Main Title</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM partnership_options_title WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];

            echo "<tr>";
            echo "<td>{$title}</td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>