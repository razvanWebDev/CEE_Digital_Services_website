
<!-- DISPLAY INFO -->
<a class="btn btn-primary" href="q2_agendas_page_title.php?source=edit_q2_agendas_page_title&id=1">Edit Page</a>
<br><br>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Main Title</th>
            <th>Date</th>
            <th>Sub Title</th>
            <th>Left Button</th>  
            <th>Right Button</th>
            <th>Text</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM q2_agendas_page_title WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $date = $row['date'];
            $sub_title = $row['sub_title'];
            $btn_left = $row['btn_left'];
            $btn_right = $row['btn_right'];
            $text = $row['text'];

            echo "<tr>";
            echo "<td>{$title}</td>";
            echo "<td>{$date}</td>";
            echo "<td>{$sub_title}</td>";
            echo "<td>{$btn_left}</td>";
            echo "<td>{$btn_right}</td>";
            echo "<td>{$text}</td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>