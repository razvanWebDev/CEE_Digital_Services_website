<!-- DISPLAY INFO -->
<a class="btn btn-primary" href="awards_and_jury_page_title.php?source=edit_awards_and_jury_page_title&id=1">Edit Page Title</a>
<br><br>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th>Text 1</th>
            <th>Text 2</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * FROM awards_and_jury_page_title WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $text_1 = $row['text_1'];
            $text_2 = $row['text_2'];

            echo "<tr>";
            echo "<td>{$title}</td>";
            echo "<td>{$text_1}</td>";
            echo "<td>{$text_2}</td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>