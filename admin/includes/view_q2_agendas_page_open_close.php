
<!-- DISPLAY INFO -->
<a class="btn btn-primary" href="q2_agendas_open_close.php?source=edit_q2_agendas_open_close&id=1">Edit Page</a>
<br><br>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Opening Text</th>
            <th>Closing Text</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM q2_agendas_page_open_close WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $open = $row['open'];
            $close = $row['close'];

            echo "<tr>";
            echo "<td>{$open}</td>";
            echo "<td>{$close}</td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>