
<!-- DISPLAY INFO -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Main Title</th>
            <th>First paragraph</th>
            <th>Second paragraph</th>
            <th>Button Text </th>  
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM hero_newsletter_signup WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $first_paragraph = $row['first_paragraph'];
            $second_paragraph = $row['second_paragraph'];
            $btn_text = $row['btn_text'];

            echo "<tr>";
            echo "<td>{$title}</td>";
            echo "<td>{$first_paragraph}</td>";
            echo "<td>{$second_paragraph}</td>";
            echo "<td>{$btn_text}</td>";
            echo "<td><a href='hero_newsletter_signup.php?source=edit_newsletter_signup&id=1'>Edit</a></td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>