<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

    <section class="title-with-bg">
        <h1 class="news-page-title"><img src="img/SVG/News_videos_icon_white.svg" alt="recordings"
                class="section-title-icon"> News
        </h1>
    </section>

    <!-- Page Content -->
    <section class="news-page-container">
        <div class="news-container">
        <?php 
            if(isset($_POST['submit'])) {
                $search = $_POST['search'];
                $query = "SELECT * FROM news WHERE post_title LIKE '%$search%' OR post_tags LIKE '%$search%' OR post_date LIKE '%$search%'  ORDER BY post_date DESC, post_id ";
                $search_query = mysqli_query($connection, $query);

                if(!$search_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }

                $count = mysqli_num_rows($search_query);

                if($count == 0){
                    echo "<h2>No results!</h2>";
                }else{
                    while($row = mysqli_fetch_assoc($search_query)) {
                        $post_title = $row['post_title'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $source_link = $row['source_link'];
                        $source_link_name = $row['source_link_name'];
                        ?>

                        <div class="news-article">
                            <h2><?php echo $post_title ?></h2>
                            <p class="news-article-date"><?php echo $post_date ?></p>
                            <?php if($post_image != "") { ?>
                                <img class="news-article-image" src="img/<?php echo $post_image ?>" alt="">
                            <?php }?>
                            <p><?php echo $post_content ?></p>
                            <p class="news-source"><b>Source:</b> <a href=<?php echo $source_link ?> target="_blank">
                                    <?php echo $source_link_name ?></a></p>
                            <!-- <a class="button blue" href="#">Read More </a> -->
                            <div class="separator blue news-article-separator"></div>
                        </div>
    
            <?php } 
                }
            }
            ?>
        </div>

        <!-- Right side search widget -->
        <?php include "PHP/news-search.php" ?>

    </section>
    <!-- /.container -->

<?php include "PHP/footer.php"; ?>