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
            //the number of news per page
            $articles_per_page = 20;
            //the number of titles on the right side
            $titles_per_page = 40;

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


                $query = "SELECT * FROM news ORDER BY post_date DESC, id DESC LIMIT $page_1, $articles_per_page";
                $select_all_posts_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['id'];
                    $post_title = $row['post_title'];
                    $post_date = $row['post_date'];
                    $formated_date = date('d-m-Y',strtotime($post_date));
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $source_link = $row['source_link'];
                    $source_link_name = $row['source_link_name'];

            ?>

            <div class="news-article">
                <h2><?php echo $post_title ?></h2>
                <p class="news-article-date"><?php echo $formated_date ?></p>
                <?php if($post_image != "") { ?>
                    <img class="news-article-image" src="img/news/<?php echo $post_image ?>" alt="">
                <?php }?>
                <p><?php echo $post_content ?></p>
                <p class="news-source"> <?php if($source_link != ""){echo '<b>Source:</b>';} ?><a href=<?php echo $source_link ?> target="_blank">
                        <?php echo $source_link_name ?></a></p>
                        <?php 
                        if(isset($_SESSION['username'])) {
                            echo "<br><a class='button blue' href='admin/news.php?source=edit_news&p_id={$post_id}'>Edit Article </a><br>";
                        }
                ?>
                <div class="separator blue news-article-separator"></div>
            </div>
        <?php } ?>
        </div>

        <!-- Right side search widget -->
        <?php include "PHP/news-search.php" ?>

    </section>
    <!-- /.container -->

    <!-- pagination -->
    <section>
        <div class="pager-container">
            <ul class="pager">
                <?php
                if($count > 1){
                    for($i = 1; $i <= $count; $i++){
                        if($i == $page){
                            echo "<li><a class='current-page' href='news-page.php?page={$i}'>$i</a></li>";
                        }else{
                            echo "<li><a href='news-page.php?page={$i}'>$i</a></li>";
                        }
                        
                    }
                }
                ?>
                
            </ul>
        </div>
       
    </section>

<?php include "PHP/footer.php"; ?>