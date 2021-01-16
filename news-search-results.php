<?php include "PHP/db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/Logo.png">
    <meta charset="UTF-8" lang="EN">
    <title>CEE Digital Services | News</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
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
                <!-- <a href="news.html" class="nav-item">News</a> -->
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
            if(isset($_POST['submit'])) {
                $search = $_POST['search'];
                $query = "SELECT * FROM news WHERE post_title LIKE '%$search%' OR post_tags LIKE '%$search%' OR post_date LIKE '%$search%' ";
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

        <div class="search-container">
            <?php include "PHP/news-search.php" ?>
            <p class="clear-search centered"><a href="news-page.php">clear search</a></p>
            <div class="separator blue"></div>
            <div class="news-titles">
                <h2>News Titles</h2>
                
                    <?php 
                        $query = "SELECT * FROM news";
                        $select_all_posts_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                            $post_title = $row['post_title'];
                            $post_date = $row['post_date'];
                    
                    ?>
                    <div class="news-title-container">
                        <p class="news-date"><?php echo $post_date ?></p>
                        <p class="news-title"><b><?php echo $post_title ?></b></p>
                    </div>
                    <?php } ?>
                
            </div>
        </div>

    </section>
    <!-- /.container -->

    <footer>
        <p><a href="https://www.ctotech.io/" target="_blank">Developed by CTOtech</a></p>
    </footer>

    <!-- jQuery -->
    <!-- <script src="js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <!--Custom JS -->
    <script src="js/app.js"></script>

</body>

</html>