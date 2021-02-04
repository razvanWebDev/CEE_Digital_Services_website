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
        <h1><img src="img/SVG/News_videos_icon.svg" alt="event icon" class="section-title-icon">NEWS / VIDEOS</h1>
        <div class="separator blue"></div>

        <div class="news-content">
            <h2>Bulgaria's SpaceCAD, New Horizons win World Bank-financed deal</h2>
            <p class="date">6/12/2020</p>
            <p>
                A consortium between Bulgaria's SpaceCAD and New Horizons Bulgaria said on Tuesday it has won a deal to
                carry out online ICT trainings as part of the $23.5 million (19.9 million euro) Georgia National
                Innovation Ecosystem (GENIE) project financed by the World Bank.
            </p>
            <!-- <a href="#" class="button green">
                Read More
            </a> -->
        </div>

        <div class="separator blue"></div>

        <div class="news-content-with-video">
            <div class="news-description">
                <h2>City of Charlotte - Showcase - at CEE Digital Services Summit</h2>
                <p class="date">27/9/2020</p>
                <!-- <a href="#" class="button green">
                    Recording
                </a> -->
            </div>
            <div class="news-video">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/OpdnGbrCmbk" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>

        </div>

        <div class="separator blue"></div>

        <div class="news-content-with-video">
            <div class="news-description">
                <h2>SportsTech.ai and Agilent on US Panel at CEE Digital Services Summit</h2>
                <p class="date">22/9/2020</p>
                <!-- <a href="#" class="button green">
                    Recording
                </a> -->
            </div>
            <div class="news-video">
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/sTbKSXUML8g" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="separator blue"></div>

        <div class="news-content-with-video">
            <div class="news-description">
                <h2>CEE Digital Services Summit - 17 September 2020. US Panel IV</h2>
                <p class="date">20/9/2020</p>
                <!-- <a href="#" class="button green">
                    Recording
                </a> -->
            </div>
            <div class="news-video">
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/2zebnSBOcJM" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

        <div class="separator blue"></div>

        <div class="news-content-with-video">
            <div class="news-description">
                <h2>CEE Digital Services Summit - 17 September, US Panel I</h2>
                <p class="date">20/9/2020</p>
                <!-- <a href="#" class="button green">
                    Recording
                </a> -->
            </div>
            <div class="news-video">
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/Cc3UZWWH2-M" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="separator blue"></div>

        <div class="news-content-with-video">
            <div class="news-description">
                <h2>Germany Panel at CEE Digital Services Summit</h2>
                <p class="date">17/9/2020</p>
                <!-- <a href="#" class="button green">
                    Recording
                </a> -->
            </div>
            <div class="news-video">
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/QQU_QpE17iw" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="separator blue"></div>

        <div class="news-content-with-video">
            <div class="news-description">
                <h2>UK Panel at CEE Digital Services Summit</h2>
                <p class="date">17/9/2020</p>
                <!-- <a href="#" class="button green">
                    Recording
                </a> -->
            </div>
            <div class="news-video">
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/QbkXH9vTsNU" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p><a href="https://www.ctotech.io/" target="_blank">Developed by CTOtech</a></p>
    </footer>
    <?php exit(); ?>

    <script src="JS/app.js"></script>
</body>

</html>