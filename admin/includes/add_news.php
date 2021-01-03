<?php 

    if(isset($_POST['create_post'])) {
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];

        $post_date = date('d-m-y');

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_content = $_POST['content'];
        $post_tags = $_POST['tags'];
        $post_comment_count = 4;
        $post_status = $_POST['status'];

        move_uploaded_file($post_image_temp, "../img/$post_image");

        $query = "INSERT INTO news(post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
        $query .= "VALUES('{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', {$post_comment_count}, '{$post_status}')";
        
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
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author">
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
        <label for="comments_count">Comments Count</label>
        <input type="text" class="form-control" name="comments_count">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" class="form-control" name="status">
    </div>
    <div class="form-group">
        <input class="btn btn-rpimary" type="submit" name="create_post" value="Publish">
    </div>
</form>
