<!-- DISPLAY INFO -->
<a class="btn btn-primary" href="ticket_reservations_text.php?source=edit_ticket_reservations_text&id=1">Edit Page</a>
<br><br>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Text</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM ticket_reservations_text WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $text = $row['text'];

            echo "<tr>";
            echo "<td>{$text}</td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>