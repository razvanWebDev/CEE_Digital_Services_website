<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<section class="event-title-section section-with-bg">
    <div class="event-title">
        <div class="event-title-image">
            <img src="img/Logo.png" alt="logo">
        </div>
        <?php 
                $query = "SELECT * FROM q2_agendas_page_title WHERE id=1";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)){
                    $title = $row['title'];
                    $date = $row['date'];
                    $sub_title = $row['sub_title'];
                    $btn_left = $row['btn_left'];
                    $btn_right = $row['btn_right'];
                    $text = $row['text'];
                }
            
            ?>
        <div class="event-title-text">
            <h1 class="padding-bottom-1-em">
                <?php echo $title; ?><br>
                <?php echo $date; ?>
            </h1>
            <h2>"Connecting CEE's top Tech companies to global markets".</h2>
        </div>
    </div>
    <div class="flex agendas-title-buttons-container">
        <a href="reserve-tickets.php" class="button white" target="_blank">
            <?php echo $btn_left; ?>
        </a>
        <a href="submit-solutions-showcase.php" class="button white" target="_blank">
            <?php echo $btn_right; ?>
        </a>
    </div>
    <div>
        <?php echo $text; ?>
    </div>
</section>

<section>
    <!-- Opening title -->
    <?php 
         $query = "SELECT * FROM q2_agendas_page_open_close WHERE id=1";
         $result = mysqli_query($connection, $query);
         while ($row = mysqli_fetch_assoc($result)){
             $open = $row['open'];
             $close = $row['close'];
         }
        ?>
    <div class="agendas-open-text">
        <?php echo $open; ?>
    </div>
    <?php 
        $query = "SELECT * FROM q2_agendas_page_content ORDER BY start_time";
        $select_all_posts_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
            $id = $row['id'];
            $slot_type = $row['slot_type'];
            //Left Column
            $stage_name = $row['stage_name'];
            $start_time = $row['start_time'];
            $end_time = $row['end_time'];
            $title = $row['title'];
            $content = $row['content'];
            $foto_1 = $row['foto_1'];
            $foto_2 = $row['foto_2'];
            $foto_3 = $row['foto_3'];
            $foto_4 = $row['foto_4'];

            //Right Column
            $right_column_stage_name = $row['right_column_stage_name'];
            $right_column_start_time = $row['right_column_start_time'];
            $right_column_end_time = $row['right_column_end_time'];
            $right_column_title = $row['right_column_title'];
            $right_column_content = $row['right_column_content'];
            $right_column_foto_1 = $row['right_column_foto_1'];
            $right_column_foto_2 = $row['right_column_foto_2'];
            $right_column_foto_3 = $row['right_column_foto_3'];
            $right_column_foto_4 = $row['right_column_foto_4'];

            //Output one column layout
           if($slot_type == "one_column"){
                    if(ifExists($stage_name)){
                        echo "<h2 class='centered padding-bottom-2-em'><u>$stage_name</u></h2>";
                    }
                     echo '<div class="agenda-item">';
                            if(ifExists($title)){
                                echo "<h2>{$start_time} - {$end_time} {$title}</h2>";
                            }
                            echo "<div>{$content}</div>";
                            echo '<div class="flex agenda-item-image-container">';
                                if(ifExists($foto_1)){
                                    echo "<img src='img/Event_speakers/{$foto_1}' alt=''>";
                                }
                                if(ifExists($foto_2)){
                                    echo "<img src='img/Event_speakers/{$foto_2}' alt=''>";
                                }
                                if(ifExists($foto_3)){
                                    echo "<img src='img/Event_speakers/{$foto_3}' alt=''>";
                                }
                                if(ifExists($foto_4)){
                                    echo "<img src='img/Event_speakers/{$foto_4}' alt=''>";
                                }
                            echo '</div>';
                    echo '</div>';
           }else{
               //Output two columns layout
                echo ' <div class="flex">';
                    echo '<div class="main-stage">';
                    if(ifExists($stage_name)){
                        echo "<h2 class='centered padding-bottom-2-em'><u>$stage_name</u></h2>";
                    }
                        echo '<div class="agenda-item">';
                        if(ifExists($title)){
                            echo "<h2>{$start_time} - {$end_time} {$title}</h2>";
                        }
                            echo "<div>{$content}</div>";
                            echo '<div class="flex agenda-item-image-container">';
                            if(ifExists($foto_1)){
                                echo "<img src='img/Event_speakers/{$foto_1}' alt=''>";
                            }
                            if(ifExists($foto_2)){
                                echo "<img src='img/Event_speakers/{$foto_2}' alt=''>";
                            }
                            if(ifExists($foto_3)){
                                echo "<img src='img/Event_speakers/{$foto_3}' alt=''>";
                            }
                            if(ifExists($foto_4)){
                                echo "<img src='img/Event_speakers/{$foto_4}' alt=''>";
                            }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';

                    echo '<div class="focus-sessions">';
                        if(ifExists($right_column_stage_name)){
                            echo "<h2 class='centered padding-bottom-2-em'><u>$right_column_stage_name</u></h2>";
                        }
                        echo '<div class="agenda-item">';
                            if(ifExists($right_column_title)){
                                echo "<h2>{$right_column_start_time} - {$right_column_end_time} {$right_column_title}</h2>";
                            }
                            echo "<div>{$right_column_content}</div>";
                            echo '<div class="flex agenda-item-image-container">';
                                if(ifExists($right_column_foto_1)){
                                    echo "<img src='img/Event_speakers/{$right_column_foto_1}' alt=''>";
                                }
                                if(ifExists($right_column_foto_2)){
                                    echo "<img src='img/Event_speakers/{$right_column_foto_2}' alt=''>";
                                }
                                if(ifExists($right_column_foto_3)){
                                    echo "<img src='img/Event_speakers/{$right_column_foto_3}' alt=''>";
                                }
                                if(ifExists($right_column_foto_4)){
                                    echo "<img src='img/Event_speakers/{$right_column_foto_4}' alt=''>";
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
           }
        }
    ?>


    <!-- 
        <div class="flex agendas-container">
            <div class="main-stage">
                <div class="agenda-item">
                    <h2><?php echo $start_time ?></h2>
                    <p><b>Thom Barnhardt</b>, Organiser and founder, CEE Digital Services
                        Association.
                    </p>
                    <div class="flex agenda-item-image-container">
                        <img src="img/Event_speakers/mk-photo-2018-suit-fb_1.png" alt="Mark Keough">
                        <img src="img/Event_speakers/kirk-drage-leapsheep2_1.jpg" alt="Kirk Drage">
                        <img src="img/Event_speakers/australia-fts-martyholden_1.jpg" alt="Marty Holden">
                    </div>
                </div>
            </div>
            <div class="focus-sessions">
                <div class="agenda-item">
                    <h2>8:15am Welcoming Guests:</h2>
                    <p><b>Thom Barnhardt</b>, Organiser and founder, CEE Digital Services
                        Association.
                    </p>
                    <div class="flex agenda-item-image-container">
                        <img src="img/Event_speakers/mk-photo-2018-suit-fb_1.png" alt="Mark Keough">
                        <img src="img/Event_speakers/kirk-drage-leapsheep2_1.jpg" alt="Kirk Drage">
                        <img src="img/Event_speakers/australia-fts-martyholden_1.jpg" alt="Marty Holden">
                    </div>
                </div>
            
            </div>
        </div> -->





    <!-- 
        <div class="flex agendas-container">

            <div class="main-stage">
                <h2 class="centered padding-bottom-2-em"><u>Main Stage/Plenary</u></h2>
                <div class="agenda-item">
                    <img src="img/Event_speakers/thom-barnhardt-jpeg_4.jpg" alt="Thom Barnhardt">
                    <h2>8:15am Welcoming Guests:</h2>
                    <p><b>Thom Barnhardt</b>, Organiser and founder, CEE Digital Services
                        Association.
                    </p>
                </div>
                <div class="agenda-item">
                    <h2>8:30am - 9:15am Australia:</h2>
                    <p>An insight into what Australian digital/tech buyers expect from CEE-based digital partners.
                        An overview of Australia's digital market and opportunities: <b>Mark Keough</b>, Intrinsic
                        Learning (Melbourne)
                    </p>
                    <p class="no-margins">
                        <b>Panelists (2):</b>
                    </p>
                    <ul class="list-with-bullet">
                        <li>
                            <b>Kirk Drage</b>, CEO, LeapSheep (Adelaide)
                        </li>
                        <li>
                            <b>Marty Holden,</b> CIO, FTS Group (Canberra)
                        </li>
                    </ul>
                    <div class="flex agenda-item-image-container">
                        <img src="img/Event_speakers/mk-photo-2018-suit-fb_1.png" alt="Mark Keough">
                        <img src="img/Event_speakers/kirk-drage-leapsheep2_1.jpg" alt="Kirk Drage">
                        <img src="img/Event_speakers/australia-fts-martyholden_1.jpg" alt="Marty Holden">
                    </div>
                </div>
                <div class="agenda-item">
                    <h2>9:15am - 10:00am Japan:</h2>
                    <p>Digital and tech opportunities between Japan and CEE.</p>
                    <p>
                        <b>Presentation: Marc Einstein</b> ITR (Tokyo)
                    </p>
                    <p>
                        <b>Panelists (2): Hideki Ninomiya</b>, Orient.
                    </p>
                    <div class="flex agenda-item-image-container">
                        <img src="img/Jury_members/hideki_3.png" alt="Pauline Fetaui">
                        <img src="img/Event_speakers/einsteinitr.jpg" alt="Pauline Fetaui">
                    </div>
                </div>
                <div class="agenda-item">
                    <h2>10:25am - 10:45am "Dissecting the Deal":</h2>
                    <p>An inside look at a recent nearshoring deal got decided. How nearshoring or re-shoring is driving
                        big demand for CEE digital services.
                    </p>
                    <p><b>Moderator: Thom Barnhardt</b></p>
                    <p><b>Panelist: Trevor Coyne, Ops Talent</b></p>
                </div>
                <div class="agenda-item">
                    <h2>10:45am - 11:00am Networking Session #1:</h2>
                    <p><b>meet 5 new people in 15 minutes</b> (click on the "Networking" tab on Hopin's left-column
                        navigation)</p>
                </div>
                <div class="agenda-item">
                    <h2>11:15am - 12:00 United Kingdom:</h2>
                    <p>
                        How CEE-based digital companies deliver strategic value to UK enterprises, SMEs, and ScaleUps.
                    </p>
                    <p><b>Moderator: Michael Dembinski</b>, British Polish Chamber of Commerce</p>
                    <p><b>Panelists (3): Angus Kidd</b>, Advisory to Genpact, and Caspian. <b>Russell Dalgleish</b>,
                        Chairman, Scottish Business Network.</p>
                    <div class="flex agenda-item-image-container">
                        <img src="img/Event_speakers/bpcc-dembinskimichael_1.jpg" alt="Michael Dembinski">
                        <img src="img/Event_speakers/anguskidd-1_1.jpg" alt="Angus Kidd">
                        <img src="img/Event_speakers/russell-dalgleish-scottishbusiness_1.jpg" alt="Russell Dalgleish">
                    </div>
                </div>
                <div class="agenda-item">
                    <h2>12:00 - 12:40 Nordics/Benelux:</h2>
                    <p>
                        An insight into the corporate digital demands in Sweden, Norway, Denmark and Finland - and
                        Benelux.
                    </p>
                    <p>
                        <b>Panelists:</b>
                    </p>
                    <ul class="list-with-bullet">
                        <li>
                            <b>Henri Jääskeläinen</b>, Founder, Polar Night Software (Lodz)
                        </li>
                        <li>
                            <b> Ole Horsfeldt</b> Partner, Gorrissen Federspiel. Representing one of the top Danish law
                            firms, Ole’s focus is entirely on sourcing technology/digital services at scale.
                        </li>
                    </ul>
                    <div class="flex agenda-item-image-container">
                        <img src="img/Event_speakers/polarnight-henri-2_1.jpeg" alt="Henri Jääskeläinen">
                        <img src="img/Event_speakers/olehorsfeldt-gorrissen_1.jpg" alt="Ole Horsfeldt">
                    </div>
                </div>
                <div class="agenda-item">
                    <h2>12:45 - 13:25 Germany:</h2>
                    <p>
                        How German enterprises and SMEs increasingly view CEE digital firms as strategic partners. And
                        what CEE firms can move up the value-chain.
                    </p>
                    <ul class="list-with-bullet">
                        <li>
                            <b>Dr. Lars Gutheil</b>, German Polish Chamber of Commerce (AHK)
                        </li>
                        <li>
                            <b>Thomas Duschek</b>, Managing Director, SAP Poland
                        </li>
                        <li>
                            <b>Presentation:</b> "The urgent drive to digitalize European consumer goods enterprises",
                            <b>Oliver Trier</b>, Itility, and former Director Global Digital Innovation, Friesland
                            Campina.
                        </li>
                        <li>
                            Artur Tomys, CEO, Equiqo
                        </li>
                    </ul>
                    <div class="flex agenda-item-image-container">
                        <img src="img/Event_speakers/ahk-gutheil-lars.jpg" alt="Lars Gutheil">
                        <img src="img/Event_speakers/sap-duschek_1.jpg" alt="Thomas Duschek">
                        <img src="img/Event_speakers/itility-oliver_1.jpg" alt="Oliver Trier">
                        <img src="img/Event_speakers/arturtomys_1.jpg" alt="Artur Tomys">
                    </div>
                </div>
                <div class="agenda-item">
                    <h2>13:30 - 14:10 Fintech: Austria and Vienna</h2>
                    <p>
                        How CEE tech companies are finding Fintech expansion opportunities in western Europe.
                    </p>
                    <p><b>Panelists:</b></p>
                    <ul class="list-with-bullet">
                        <li>
                            The Fintech ecosystem in Vienna, <b>Aleksandar Vrglevski</b>, Vienna Business Agency.
                        </li>
                        <li>
                            The Fintech ecosystem in Poland, <b>Michal Sas</b>, FinTech Poland Foundation
                        </li>
                        <li>
                            How Billon is expanding in western Europe, <b>Jacek Figula</b>, CCO, Billon Group
                        </li>
                        <li>
                            <b>Karolina Kaptur</b>, AHP International
                        </li>
                        <li>
                            <b>Ewelina Tomczyk-Malec</b>, City of Warsaw
                        </li>
                        <li>
                            <b>Piotr Paradowski</b>, City of Warsaw
                        </li>
                    </ul>
                    <div class="flex agenda-item-image-container">
                        <img src="img/Event_speakers/vienna-bizagency-aleksander_1.jpg" alt="Aleksandar Vrglevski">
                        <img src="img/Event_speakers/billon-michalsas_1.jpg" alt="Michal Sas">
                        <img src="img/Event_speakers/billon-figula_1.jpg" alt="Jacek Figula">
                    </div>
                </div>

            </div>

            <div class="focus-sessions">
                <h2 class="centered padding-bottom-2-em"><u>1-on-1 pre-arranged Meetings and Break-out Sessions:</u>
                </h2>
                <div class="agenda-item">
                    <h2>9:15am - 10:30am 1-on-1 Meetings</h2>
                    <ul class="list-with-bullet">
                        <li><b>Japan:</b> 1-on-1 meetings with 3-4 Japanese corporates.</li>
                        <li><b>Australia:</b> 1-on-1 meetings with 3-4 Australian corporates.</li>
                    </ul>
                </div>
                <div class="agenda-item">
                    <h2>10:00am - 10:30am "Live" booth:</h2>
                    <p>AIBEST Bulgaria, featuring Cargotec Business Services, Bulgaria. Insights into Cargotec's
                        operations in Sofia, <b>Heini Kami</b>, Director HR Services (click on the "Booth" tab on
                        Hopin's left-column navigation to enter the AIBEST Bulgaria booth)</p>
                    <div class="flex agenda-item-image-container">
                        <img src="img/Event_speakers/cargotec-kami_1.jpg" alt="Heini Kami" class="heini-kami">
                    </div>
                </div>
                <div class="agenda-item">
                    <h2>12:00 - 13:15 1-on-1 Meetings</h2>
                    <ul class="list-with-bullet">
                        <li>
                            <b>UK:</b> 1-on-1 meetings with 4-6 corporates.
                        </li>
                    </ul>
                </div>
                <div class="agenda-item">
                    <h2>13:15 - 14:30 1-on-1 Meetings</h2>
                    <ul class="list-with-bullet">
                        <li>
                            <b>Nordics:</b> 1-on-1 meetings with 3-4 corporates.
                        </li>
                        <li>
                            <b>Germany:</b> 1-on-1 meetings with 3-4 corporates.
                        </li>
                        <li>
                            <b>Austria:</b> 1-on-1 meetings with 3-4 corporates.
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="separator blue"></div>

        <div class="agenda-item">
            <h2>14:15 - 14:30 Innovative Applications developed in Central Eastern Europe.</h2>
            <p>15-minute showcase: Technology developed in CEE targeting US and western Europe.</p>
            <ul class="list-with-bullet">
                <li>
                    <b>Case Study: ActiveGraf</b> - interactive scenario analysis and presentation software that puts
                    the power of the smartest data scientist in the hands of everyone. Developed in Hungary, based in
                    US, backed by <b>PE. Laszlo Balassy (North Carolina)</b>
                </li>
            </ul>
        </div>

        <div class="separator blue"></div>
        <h2 class="centered">Afternoon sessions:</h2>
        <h2 class="centered">US Audience begins to join</h2>
        <p class="centered">Time zone: CET Central European Time</p>
        <h2 class="centered">14:30 - 14:45 Lunch Break, 1-on-1 Networking, and visiting Virtual Information Booths</h2>
        <div class="separator blue"></div>

        <h2 class="centered padding-bottom-2-em"><u>Main Stage</u></h2>

        <div class="agenda-item">
            <h2>14:45 - 15:30 US Panel I</h2>
            <ul class="list-with-bullet">
                <li>
                    "Meet the Accelerators". How US Startups scale-up with tech talent from CEE. <b>Armen
                        Kherlopian</b>, Ph.D., Chief Science Officer, Genpact and Director, BAJ Accelerator (New York)
                </li>
                <li>
                    How US enterprises are applying AI to support client-facing functions. <b>Ashish Bisaria</b>, Global
                    Head of CX, FirstSource (Atlanta)
                </li>
            </ul>
            <div class="flex agenda-item-image-container">
                <img src="img/Event_speakers/armenkherlopian-genpact_1.jpg" alt="Armen Kherlopian">
                <img src="img/Event_speakers/ashish-bisaria_1.jpg" alt="Ashish Bisaria">
            </div>
        </div>
        <div class="agenda-item">
            <h2>
                15:30 - 16:15 US Panel II
            </h2>
            <p>
                10 Top tips on winning clients in the United States (and 3 ways to lose them).
            </p>
            <p>
                <b>Presentation: Richard Rodgers</b>, Global Digital Marketing Director, Agilent Technologies
                (Philadelphia)
            </p>
            <p>
                <b>Panelists (1): Ryan McCumber</b>, Founder & CEO, SportsTech.ai
            </p>
            <div class="flex agenda-item-image-container">
                <img src="img/Event_speakers/agilent-richard-rodgers_1.jpg" alt="Richard Rodgers">
                <img src="img/Event_speakers/ryanmccumber-sportstech_1.webp" alt="Ryan McCumber">
            </div>
        </div>
        <div class="agenda-item">
            <h2>16:20 - 16:45 US Panel III</h2>
            <img src="img/Event_speakers/charlotte-alexisgordon_2.jpg" alt="Alexis Gordon">
            <p>
                How US Cities are supporting their local companies to connect with digital partners from Central Eastern
                Europe - and providing a platform for broader expansion in the United States.
            </p>
            <p>
                <b>Presentation: Alexis Gordon</b>, City of Charlotte (North Carolina)
            </p>
        </div>
        <div class="agenda-item">
            <h2>16:45 - 17:15 US Panel IV</h2>
            <img src="img/Event_speakers/garthholsinger_2.jpg" alt="Garth Holsinger">
            <p>"Meet the Accelerators". How US Startups scale-up with tech talent from CEE - and how CEE-based tech
                companies can tap into capital for US expansion.</p>
            <p>
                <b>Presentation: Garth Holsinger</b>, GP, Prota Ventures and Co-founder, StartUp Rocket (New York)
            </p>
        </div>
        <div class="separator blue"></div>
        <h2 class="centered">17:15– 17:45 Closing, Networking Session, and visiting Information Booths</h2>
        <p class="centered">Time Zone: All times are CET Central European Time Zone.</p> -->
    <div class="separator blue"></div>
    <div class="cenetered padding-bottom-2-em padding-top-2-em">
        <?php echo $close; ?>
    </div>

</section>

<?php include "PHP/footer.php"; ?>