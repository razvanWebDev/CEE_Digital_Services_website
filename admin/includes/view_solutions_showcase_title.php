<!-- DISPLAY INFO -->
<a class="btn btn-primary" href="solutions_showcase_title.php?source=edit_solutions_showcase_title&id=1">Edit Title</a>
<br><br>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Main Title</th>
            <th>Text</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM solutions_showcase_title WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $content = $row['content'];

            echo "<tr>";
            echo "<td>{$title}</td>";
            echo "<td>{$content}</td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>