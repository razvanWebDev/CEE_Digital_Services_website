<?php 

    if(isset($_POST['create_post'])) {
        $post_title = $_POST['title'];

        $post_date = date('d-m-y');

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

        $query = "INSERT INTO news(post_title, post_date, post_image, post_content, post_tags, source_link, source_link_name)";
        $query .= "VALUES('{$post_title}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$source_link}', '{$source_link_name}')";
        
        $create_post_query = mysqli_query($connection, $query);

        if(!$create_post_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">News Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="tags">News Tags</label>
        <input type="text" class="form-control" name="tags">
    </div>

    <div class="form-group">
        <label for="source_link">Source Link</label>
        <input type="url" class="form-control" name="source_link">
    </div>

    <div class="form-group">
        <label for="source_link_name">Link Name</label>
        <input type="text" class="form-control" name="source_link_name">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish">
    </div>
</form>