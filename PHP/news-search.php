

    <div class="search-container">
    <h2>Search News</h2>
    <form action="news-search-results.php" method="post">
    <input name="search" type="text" class="input-blue search-input"><br>
    <button name="submit" class="button blue search-button" type="submit">Search</button>
    </form>
    <div class="separator blue"></div>
        <div class="news-titles">
            <h2>Latest News</h2>
            
            <?php 
                $titles_per_page = 20;
                $query = "SELECT * FROM news ORDER BY post_date DESC LIMIT $titles_per_page";
                $select_all_posts_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_date = $row['post_date'];
                    $formated_date = date('d-m-Y',strtotime($post_date));
            ?>
            <div class="news-title-container">
                <a href="news-post.php?p_id=<?php echo $post_id; ?>" class="search-news-titles">
                    <p class="news-date"><?php echo $formated_date ?></p>
                    <p class="news-title"><b><?php echo $post_title ?></b></p>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>