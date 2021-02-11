<!-- DISPLAY INFO -->
<a class="btn btn-primary" href="solutions_showcase_content.php?source=edit_solutions_showcase_content&id=1">Edit Page</a>
<br><br>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Text</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM solutions_showcase_content WHERE id=1";
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