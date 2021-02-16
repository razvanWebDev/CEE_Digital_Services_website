<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

    <section class="event-title-section section-with-bg">
        <div class="event-title">
            <div class="event-title-image">
                <img src="img/Logo.png" alt="logo">
            </div>
            <div class="event-title-text">
            <?php 
                $query = "SELECT * FROM partnership_options_title WHERE id=1";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)){
                    $title = $row['title'];
                }
                echo $title;
            ?>
            </div>
        </div>
    </section>
    <section>
        <?php 
            $query = "SELECT * FROM partnership_options_features WHERE id=1";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)){
                $content = $row['content'];
            }

            echo $content;
        ?>
    </section>
    <section>
        <h1>PARTNERSHIP OPTIONS</h1>
        <div class="separator blue"></div>
        <div>
            <?php
                $query = "SELECT * FROM partnership_options_content ORDER BY position";
                $select_all_posts_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
            
                    $slot_type = $row['slot_type'];
                    $content = $row['content'];
                    $p_image = $row['p_image'];
                    $video = $row['video'];

                    if($slot_type == "with_image"){
                        echo "<div class='flex text-with-media'>";
                            echo "<div class='text-div'>{$content}</div>";
                            echo "<div class='media-div'>";
                                echo "<img src='img/Partnership_options/{$p_image}' alt=''>";
                            echo "</div>";
                        echo "</div>";
                    }else if($slot_type == "with_video"){
                        echo "<div class='flex text-with-media'>";
                            echo "<div class='text-div'>{$content}</div>";
                            echo "<div class='media-div'>";
                                echo "<div class='iframe-container'>";
                                ?>
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video;?>" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                <?php
                                    echo "</div>";
                             echo "</div>";
                        echo "</div>";
                    }else{
                        echo "<div class='text-div'>{$content}</div>";
                    }
                }
            
            ?>
            <!-- <h2>A) Strategic Title Partner:</h2>
            <ul class="list-with-bullet">
                <li>
                    Our most exclusive partnership. Your brand to co-branded with the event ("powered by ....")
                </li>
                <li>
                    Premium placement of your Logo and Company Profile in most-prominent sections of the Website,
                    Summit, and Presentations.
                </li>
                <li>
                    Your top exec is introduced at the opening Plenary session.
                </li>
                <li>
                    Moderator of sessions (to be discussed)
                </li>
                <li>
                    Moderator of sessions (to be discussed)
                </li>
                <li>
                    Virtual Booth/Exhibition space.
                </li>
                <li>
                    Logos on all Email and Social Media promotions (10+)
                </li>
                <li>
                    4 Tickets to attend Virtual Summit.
                </li>
            </ul>
            <h2 class="padding-top-2-em">B) Content Session Partner:</h2>
            <ul class="list-with-bullet">
                <li>
                    <b>Embed your Webinar</b> within the context of CEE Digital Services Matchmaking Summit. 45-55
                    minutes Session. Add context to your webinar and increase your audience (details to be discussed).
                </li>
                <li>
                    This option includes Complimentary attendance to the full event to your partners/attendees.
                    (pre-arranged meetings not included).
                </li>
                <li>
                    Premium placement of your Logo in most-prominent sections of the Website, Summit, and Presentations.
                </li>
                <li>
                    Virtual Information Booth.
                </li>
                <li>
                    Logos on all Email and Social Media promotions (10+)
                </li>
                <li>
                    4 Tickets to attend Virtual Summit.
                </li>
            </ul>
        </div>
        <h2 class="padding-top-2-em">C) CEE Apps Showcase:</h2>
        <div class="flex text-with-media">
            <div class="text-div">
                <ul class="list-with-bullet">
                    <li>
                        15 minutes to present your solution/service in a dedicated session. Must be a specific
                        case-study of a digital solution to a business problem. (Subject to approval by the Organizer;
                        and subject-exclusive.)
                    </li>
                    <li>
                        The video will be re-positioned and distributed via YouTube, LinkedIn Video, Facebook, Twitter,
                        and CEE Digital Services Newsletter/Website.
                    </li>
                    <li>
                        Logos on all Website pages
                    </li>
                    <li>
                        Logos on all Email promotions.
                    </li>
                    <li>
                        2 Tickets to attend the Virtual Summit.
                    </li>
                </ul>
            </div>
            <div class="media-div">
                <p><b>CEE Apps Showcase <br>(example from September: ActiveGraf)</b></p>
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/HCkpg1Q1n0M" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>

            </div>
        </div>
        <h2 class="padding-top-2-em">D) Virtual Information Booths:</h2>
        <div class="flex text-with-media">
            <div class="text-div">
                <ul class="list-with-bullet">
                    <li>
                        <a href="https://www.youtube.com/watch?v=DqhAM9c7jnE&t=39s" target="_blank">See this 2-min
                            Video</a> to see how the V-Information Booths work.
                    </li>
                    <li>
                        Virtual booth embedded in the Summit. You can meet Visitors; have meetings in your booth;
                        distribute Materials; show videos,etc.
                    </li>
                    <li>
                        Logos on all Website pages
                    </li>
                    <li>
                        Logos on all Email promotions (8)
                    </li>
                    <li>
                        2 Tickets to attend the Virtual Summit.
                    </li>
                </ul>
            </div>
            <div class="media-div">
                <p><b>Virtual Exhibition Booths</b></p>
                <img src="img/hopinboothvirtual_6.jpg" alt="">
            </div>
        </div>
        <h2 class="padding-top-2-em">E) Networking Sessions Sponsorship and Honorary MC:</h2>
        <div class="flex text-with-media">
            <div class="text-div">
                <ul class="list-with-bullet">
                    <li>
                        Join as Honorary MC during the full day.
                    </li>
                    <li>
                        Sponsorship of prizes to most active Networkers from among technology buyers.
                    </li>
                    <li>
                        Logo placement in multiple spots
                    </li>
                    <li>
                        2 tickets to attend the Virtual Summit.
                    </li>
                </ul>
            </div>
            <div class="media-div">
                <p><b>Networking Area (by Invitation only)</b></p>
                <img src="img/hopinnetworking_2.png" alt="">
            </div> -->
        </div>
        <div class="separator blue"></div>
        <div class="centered">
            <?php
            $query = "SELECT * FROM partnership_options_sponsorship_example WHERE id=1";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)){
                $content = $row['content'];
                $video = $row['video'];
            }
            ?>
            <?php echo $content; ?>
            <br><br>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video;?>" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </section>

<?php include "PHP/footer.php"; ?>