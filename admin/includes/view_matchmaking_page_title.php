
<!-- DISPLAY INFO -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Main Title</th>
            <th>Sub Title</th>
            <th>Event Date</th>  
            <th>Text</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM matchmaking_summit_title WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $sub_title = $row['sub_title'];
            $text = $row['text'];
            $date = $row['date'];

            echo "<tr>";
            echo "<td>{$title}</td>";
            echo "<td>{$sub_title}</td>";
            echo "<td>{$date}</td>";
            echo "<td>{$text}</td>";
            echo "<td><a href='matchmaking_page_title.php?source=edit_matchmaking_page_title&id=1'>Edit</a></td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>