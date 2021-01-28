
<!-- DELETE NEWS ARTICLE -->
<?php 
// delete individually
 if(isset($_GET['delete'])) {
    if(isset($_GET['delete'])){
        $the_post_id = mysqli_real_escape_string($connection, $_GET['delete']);
        $query = "DELETE FROM news WHERE post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);
    }
   
 }

//delete in bulk
 if(isset($_POST['checkBoxArray'])){
     foreach($_POST['checkBoxArray'] as $postValueId){
        $query = "DELETE FROM news WHERE post_id = {$postValueId}";
        $delete_query = mysqli_query($connection, $query);
     }
 }
?>

<!-- DISPLAY NEWS ARTICLES ON ADMIN PAGE -->
<form action="" method="post">
<a class="btn btn-primary" href="news.php?source=add_news">Add news article</a>
<a type="button" class="btn btn-info" href="../news-page.php">Go to news-page</a>
<input type="submit" name="submit" class="btn btn-danger float-right" name="deleteSelected" value="Delete Selected" onclick="return confirm('Delete selected news articles?')">
<br><br>

<table class="table table-responsive table-bordered table-hover">
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Nr</th>
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

        //pagination
        $rowCounter_per_page = 0;
         //the number of news per page
        $articles_per_page = 25;
    
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }

        if($page == "" || $page == 1){
            $page_1 = 0;
        }else{
            $page_1 = ($page * $articles_per_page) - $articles_per_page;
        }

        $post_query_count = "SELECT * FROM news";
        $select_post_query_count = mysqli_query($connection, $post_query_count);
        $count = mysqli_num_rows($select_post_query_count);
        $count = ceil($count / $articles_per_page);  
        
        $query = "SELECT * FROM news ORDER BY post_date DESC, post_id DESC LIMIT $page_1, $articles_per_page";
        $select_news = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_news)) {
           
            $rowCounter_per_page++;
            $totalRowCounter = $rowCounter_per_page + (($page-1) * $articles_per_page);
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
            ?>
            <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
            <?php
            echo "<td>{$totalRowCounter}</td>";
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
</form>

 <!-- pagination -->
<ul class="pagination pagination-sm">
    <?php
    if($count > 1){
        for($i = 1; $i <= $count; $i++){
            if($i == $page){
                echo "<li class='page-item active'><a href='news.php?page={$i}'>$i</a></li>";
            }else{
                echo "<li class='page-item'><a href='news.php?page={$i}'>$i</a></li>";
            }
        }
    }
    ?>
</ul> 
