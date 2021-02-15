<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

    <section class="section-with-bg hero">
        <?php 
        $query = "SELECT * FROM hero_main WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $sub_title = $row['sub_title'];
            $text = $row['text'];
            $event_date = $row['event_date'];
        }
        ?>
        <div class="upcoming-event">
            <h1><img src="img/SVG/Event_icon.svg" alt="" class="section-title-icon"><?php echo $title; ?></h1>
            <div class="separator"></div>
            <div><?php echo $sub_title; ?></div>
            <div class="separator"></div>
            <div><?php echo $text; ?></div>
            <div class="date-apply">
                <div><?php echo $event_date; ?></div>
            </div>
        </div>

        <?php 
        $query = "SELECT * FROM hero_newsletter_signup WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $first_paragraph = $row['first_paragraph'];
            $second_paragraph = $row['second_paragraph'];
            $btn_text = $row['btn_text'];
        }
        ?>
        <div class="newsletter-section">
            <h2><?php echo $title; ?></h2>
            <p><?php echo $first_paragraph; ?>​​</p>
            <p><?php echo $second_paragraph; ?></p>
            <a href="newsletter-signup.html" class="button white" target="_blank">
            <?php echo $btn_text; ?>
            </a>
        </div>
    </section>

    <section class="news-section">
        <h1><img src="img/SVG/News_videos_icon.svg" alt="event icon" class="section-title-icon">NEWS</h1>
        <div class="separator blue"></div>

        <?php 
            $titles_per_page = 25;
            $query = "SELECT * FROM news ORDER BY post_date DESC LIMIT $titles_per_page";
            $select_all_posts_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_id = $row['id'];
                $post_title = $row['post_title'];
                $post_date = $row['post_date'];
                $formated_date = date('d-m-Y',strtotime($post_date));
                $post_image = $row['post_image'];

                $post_content = $row['post_content'];
                $post_content = strip_tags($post_content);

                if (strlen($post_content) > 300) {

                    // truncate string
                    $stringCut = substr($post_content, 0, 300);
                    $endPoint = strrpos($stringCut, ' ');
                
                    //if the string doesn't contain any space then it will cut without word basis.
                    $post_content = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    $post_content .= '...';
                }  
        ?>
            <div class="news-content">
            <h2><a href="news-post.php?p_id=<?php echo $post_id; ?>" target="_blank"><?php echo $post_title ?></a></h2>
                <p class="date"><?php echo $formated_date ?></p>
                <?php if($post_image != "") { ?>
                    <img class="news-article-image" src="img/news/<?php echo $post_image ?>" alt="">
                <?php }?>
                <div class="news-truncated-content"><?php echo $post_content; ?></div>
                <a href="news-post.php?p_id=<?php echo $post_id; ?>" class="button green" target="_blank">
                    Read More
                </a>
            </div>
            <div class="separator blue"></div>
            
        <?php } ?>
    </section>

<?php include "PHP/footer.php"; ?>
