<?php include "PHP/db.php" ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/Logo.png">
    <meta charset="UTF-8" lang="EN">
    <link rel="stylesheet" href="CSS/style.css">
    <title>CEE Digital Services | News</title>

</head>

<body>

    <!-- Navigation -->
    <header>
        <a href="/" id="logo-section">
            <img id="logo" src="img/Logo.png" alt="Logo">
            <h1>CEE Digital Services<br>Association</h1>
        </a>
        <nav class="header-menu">
            <div class="nav-links flex">
                <div class="dropdown-header-item nav-item">
                    <div class="drop flex">
                        <a href="matchmaking-summit-13-january.html">Matchmaking <br> Summit 13
                            January
                        </a>
                    </div>
                    <div class="dropdown">
                        <a href="agendas.html">Agendas</a>
                        <a href="reserve-tickets.html">Reserve Tickets</a>
                        <a href="submit-solutions-showcase.html">Submit Solutions <br>Showcase</a>
                        <a href="partnership-options.html">Partnership Options</a>
                        <a href="q2-agenda-september.html">Q2 Agenda September</a>
                    </div>
                </div>
                <a href="awards-and-jury.html" class="nav-item">Awards and Jury</a>
                <div class="dropdown-header-item nav-item">
                    <div class="drop flex">
                        <a href="services-directory.html">Services Directory</a>
                    </div>
                    <div class="dropdown">
                        <a href="https://ceedigitalservices.clutch.co/directory" target="_blank">Service Provider
                            Directory</a>
                    </div>
                </div>
                <a href="news-page.php" class="nav-item current">News</a>
                <a href="event-recording.html" class="nav-item">Event Recordings</a>
                <div class="dropdown-header-item nav-item">
                    <div class="drop flex">
                        <a href="about.html">About Us</a>
                    </div>
                    <div class="dropdown">
                        <a href="newsletter-signup.html">Newsletter Signup</a>
                    </div>
                </div>
            </div>
        </nav>
        <div id="hamburger">
            <div class="line1 blue-bg"></div>
            <div class="line2 blue-bg"></div>
            <div class="line3 blue-bg"></div>
        </div>
    </header>

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


                $query = "SELECT * FROM news ORDER BY post_date DESC, post_id DESC LIMIT $page_1, $articles_per_page";
                $select_all_posts_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_date = $row['post_date'];
                    $formated_date = date('d-m-Y',strtotime($post_date));
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $source_link = $row['source_link'];
                    $source_link_name = $row['source_link_name'];

            ?>

            <div class="news-article">
                <h2><a href="news-post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h2>
                <p class="news-article-date"><?php echo $formated_date ?></p>
                <?php if($post_image != "") { ?>
                    <img class="news-article-image" src="img/<?php echo $post_image ?>" alt="">
                <?php }?>
                <p><?php echo $post_content ?></p>
                <p class="news-source"><b>Source:</b> <a href=<?php echo $source_link ?> target="_blank">
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

    <footer>
        <p><a href="https://www.ctotech.io/" target="_blank">Developed by CTOtech</a></p>
    </footer>

    <!--Custom JS -->
    <script src="js/app.js"></script>

    <?php exit(); ?>
</body>

</html>