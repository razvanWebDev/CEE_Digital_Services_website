<!-- DISPLAY INFO -->
<a class="btn btn-primary" href="ticket-reservations_page_title.php?source=edit_ticket_reservations_page_title&id=1">Edit Page</a>
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
        
        $query = "SELECT * FROM ticket_reservations_page_title WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $text = $row['text'];

            echo "<tr>";
            echo "<td>{$title}</td>";
            echo "<td>{$text}</td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>