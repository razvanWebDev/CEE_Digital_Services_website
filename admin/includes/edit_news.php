<?php 
        if(isset($_GET['p_id'])) {
            $the_post_id = $_GET['p_id'];
        }
        
        $query = "SELECT * FROM news WHERE post_id = $the_post_id";
        $select_news_by_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_news_by_id)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $source_link = $row['source_link'];
            $source_link_name = $row['source_link_name'];
        }

        if(isset($_POST['update_post'])) {
          
            $post_title = $_POST['title'];

            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];

            $post_content = $_POST['content'];
            $post_tags = $_POST['tags'];
            $source_link = $_POST['source_link'];
            $source_link_name = $_POST['source_link_name'];

            if($source_link != "" && $source_link_name == ""){
                die("Enter link name");
            }else if($source_link == "" && $source_link_name != ""){
                die("Enter Source Link");
            }

            move_uploaded_file($post_image_temp, "../img/$post_image");

            $query = "UPDATE news SET ";
            $query .= "post_title = '{$post_title}', ";
            $query .= "post_date = now(), ";
            $query .= "post_image = '{$post_image}', ";
            $query .= "post_content = '{$post_content}', ";
            $query .= "post_tags = '{$post_tags}', ";
            $query .= "source_link = '{$source_link}', ";
            $query .= "source_link_name = '{$source_link_name}' ";
            $query .= "WHERE post_id = {$the_post_id}";

            $update_post = mysqli_query($connection, $query);

            if(!$update_post) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">News Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <img src="../img/<?php echo $post_image?>" alt="" width="150px">
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>

    <div class="form-group">
        <label for="tags">News Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="tags">
    </div>

    <div class="form-group">
        <label for="source_link">Source Link</label>
        <input value="<?php echo $source_link; ?>" type="url" class="form-control" name="source_link">
    </div>

    <div class="form-group">
        <label for="source_link_name">Link Name</label>
        <input value="<?php echo $source_link_name; ?>" type="text" class="form-control" name="source_link_name">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update">
    </div>
</form>