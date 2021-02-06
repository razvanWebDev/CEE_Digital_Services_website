
<!-- DISPLAY INFO -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th>Page Content</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM matchmaking_summit_content WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $content = $row['content'];

            echo "<tr>";
            echo "<td>{$title}</td>";
            echo "<td>{$content}</td>";
            echo "<td><a href='matchmaking_page_content.php?source=edit_matchmaking_page_content&id=1'>Edit</a></td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>