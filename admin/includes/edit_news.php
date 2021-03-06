<?php 
//GLOBAL VAR NEEDED FOR IMAGE UPLOAD
$post_image = "";

    if(isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
    }

    //DELETE IMAGE FILE
    if(isset($_POST['delete_file'])){
        deleteFile("delete_file", "news", "post_image", "id", $the_post_id);
    }

    $query = "SELECT * FROM news WHERE id = $the_post_id";
    $select_news_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_news_by_id)) {
        $post_id = $row['id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $source_link = $row['source_link'];
        $source_link_name = $row['source_link_name'];
    }

    $display_delete_image_button = ifExists($post_image) ? "block" : "none";

    if(isset($_POST['update_post'])) {

        $post_title = escape($_POST['title']);
        $post_date = escape($_POST['date']);

        if(ifExists(escape($_FILES['image']['name']))) {
            deleteFileFromRow("news", "post_image", $the_post_id, "../img/");
            uploadImage('image', '../img/news/', 'post_image');
        }

        $post_content = escape($_POST['content']);
        $post_tags = escape($_POST['tags']);
        $source_link = escape($_POST['source_link']);
        $source_link_name = escape($_POST['source_link_name']);

        if($source_link != "" && $source_link_name == ""){
            die("Enter link name");
        }else if($source_link == "" && $source_link_name != ""){
            die("Enter Source Link");
        }

        $query = "UPDATE news SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_date = '{$post_date}', ";
        $query .= "post_image = '{$post_image}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "source_link = '{$source_link}', ";
        $query .= "source_link_name = '{$source_link_name}' ";
        $query .= "WHERE id = {$the_post_id}";

        $update_post = mysqli_query($connection, $query);

        if(!$update_post) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        header("Location: news.php");
        exit();
    }
        
?>

<h2>Edit news article</h2><br>
<!-- Delete image -->
<form action="" method="post">
    <input type="hidden" value="../img/news/<?php echo $post_image; ?>" name="delete_file" />
    <input onclick="return confirm('Delete image?')"  type="submit" value="Delete image" class="btn btn-danger" style="display:<?php echo $display_delete_image_button; ?>;"/>
</form>
<br>

<!-- Update form -->
<form action="" method="post" enctype="multipart/form-data">    
    <div class="form-group">
        <img src="../img/news/<?php echo $post_image?>" alt="" width="150px">
    </div>

    <div class="form-group">
        <label  for="image">Select Image </label>
        <input type="file" name="image" >
    </div>

    <div class="form-group">
        <label for="title">News Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" value="<?php echo $post_date ?>" class="form-control" name="date">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="body" class="form-control" name="content" cols="30" rows="10"><?php echo $post_content; ?></textarea>
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
        <input onclick="return confirm('Update article?')" class="btn btn-primary" type="submit" name="update_post" value="Update">
    </div>
</form>