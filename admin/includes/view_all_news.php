
<!-- DELETE NEWS ARTICLE -->
<?php 
 if(isset($_GET['delete'])) {
    if(isset($_GET['delete'])){
        $the_post_id = mysqli_real_escape_string($connection, $_GET['delete']);
        $query = "DELETE FROM news WHERE post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);
    }
   
 }
?>

<!-- DISPLAY NEWS ARTICLES ON ADMIN PAGE -->
<a class="btn btn-primary" href="news.php?source=add_news">Add news article</a> <br><br>
<table class="table table-responsive table-bordered table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Image</th%>
            <th>Content</th>
            <th>Tags</th>
            <th>Source Link</th>
            <th>Link Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM news ORDER BY post_date DESC, post_id DESC";
        $select_news = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_news)) {
           
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_date = $row['post_date'];
            $formated_date = date('d-m-Y',strtotime($post_date));;
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $source_link = $row['source_link'];
            $source_link_name = $row['source_link_name'];

            echo "<tr>";
            echo "<td>{$post_title}</td>";
            echo "<td>{$formated_date}</td>";
            echo "<td>";
            if($post_image != "") {
                echo "<img width='100px' src='../img/{$post_image}' alt='image'>";
            }
            echo "</td>";
            echo "<td>{$post_content}</td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$source_link}</td>";
            echo "<td>{$source_link_name}</td>";
            echo "<td><a href='news.php?source=edit_news&p_id={$post_id}'>Edit</a></td>";
            echo "<td><a href='news.php?delete={$post_id}' onClick=\"javascript:return confirm('Delete {$post_title}?');\">Delete</a></td>";
            echo "</tr>";
        }                 
        ?>
    </tbody>                            
</table>