<!-- DISPLAY INFO -->
<a class="btn btn-primary" href="partnership_options_features.php?source=edit_partnership_options_features&id=1">Edit</a>
<br><br>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Main Title</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM partnership_options_features WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $content = $row['content'];

            echo "<tr>";
            echo "<td>{$content}</td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>