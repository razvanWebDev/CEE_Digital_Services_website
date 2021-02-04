
<!-- DISPLAY INFO -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Main Title</th>
            <th>Sub Title</th>
            <th>Text</th>
            <th>Event Date</th>  
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM hero_main WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $sub_title = $row['sub_title'];
            $text = $row['text'];
            $event_date = $row['event_date'];

            echo "<tr>";
            echo "<td>{$title}</td>";
            echo "<td>{$sub_title}</td>";
            echo "<td>{$text}</td>";
            echo "<td>{$event_date}</td>";
            echo "<td><a href='hero_main.php?source=edit_hero_main&id=1'>Edit</a></td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>