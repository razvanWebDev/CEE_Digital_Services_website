<?php include "PHP/db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="img/Logo.png">
    <meta charset="UTF-8" lang="EN">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/style.css">
    <title>CEE Digital Services</title>
</head>

<body>
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
                <a href="news-page.php" class="nav-item">News</a>
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
            <h2><?php echo $sub_title; ?></h2>
            <div class="separator"></div>
            <p><?php echo $text; ?></p>
            <div class="date-apply">
                <h2><?php echo $event_date; ?></h2>
                <a href="matchmaking-summit-13-january.html" class="button white">
                    Read more & Apply
                </a>
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
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_date = $row['post_date'];
                $formated_date = date('d-m-Y',strtotime($post_date));
                $post_image = $row['post_image'];

                $post_content = $row['post_content'];
                $post_content = strip_tags($post_content);

                if (strlen($post_content) > 200) {

                    // truncate string
                    $stringCut = substr($post_content, 0, 200);
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
                    <img class="news-article-image" src="img/<?php echo $post_image ?>" alt="">
                <?php }?>
                <div class="news-truncated-content"><?php echo $post_content; ?></div>
                <a href="news-post.php?p_id=<?php echo $post_id; ?>" class="button green" target="_blank">
                    Read More
                </a>
            </div>
            <div class="separator blue"></div>
            
        <?php } ?>
    </section>
    <footer>
        <p><a href="https://www.ctotech.io/" target="_blank">Developed by CTOtech</a></p>
    </footer>
    

    <script src="JS/app.js"></script>
    <?php exit(); ?>
</body>

</html>