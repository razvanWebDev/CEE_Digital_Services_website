<!DOCTYPE html>
<html lang="en">

<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

    <section class="event-title-section section-with-bg">
        <div class="event-title">
            <div class="event-title-image">
                <img src="img/Logo.png" alt="logo">
            </div>
            <?php 
                $query = "SELECT * FROM agendas_page_title WHERE id=1";
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
                <h1 class="padding-bottom-1-em"><?php echo $title; ?><br><?php echo $date; ?> </h1>
                <h2>"Connecting CEE's top Tech companies to global markets".</h2>
            </div>
        </div>
        <div class="flex agendas-title-buttons-container">
            <a href="reserve-tickets.php" class="button white" target="_blank"><?php echo $btn_left; ?></a>
            <a href="submit-solutions-showcase.php" class="button white" target="_blank"><?php echo $btn_right; ?></a>
        </div>
       <div>
       <?php echo $text; ?>
       </div>
    </section>

    <section>
        <!-- Opening title -->
        <?php 
         $query = "SELECT * FROM agendas_page_open_close WHERE id=1";
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
        $query = "SELECT * FROM agendas_page_content ORDER BY start_time";
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
                echo '<?div>';
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



        <!-- <h2 class="centered padding-bottom-2-em"><u>Main Stage/Plenary</u></h2> -->
        <!-- <div class="agenda-item">

            <h2>8:15am Welcoming Guests:</h2>
            <p><b>Thom Barnhardt</b>, Organiser and founder, CEE Digital Services
                Association.
            </p>
            <div class="flex agenda-item-image-container">
                <img src="img/Event_speakers/thom-barnhardt-jpeg_4.jpg" alt="Thom Barnhardt">
            </div>
        </div>
        <div class="agenda-item">
            <h2>8:30am - 9:15am Australia:</h2>
            <p>An insight into what Australian digital/tech buyers expect
                from overseas (and CEE-based) digital partners.
            </p>
            <p>
                <b>Panelists(3):</b> <b>Pauline Fetaui</b>, GM, River City Labs, Brisbane
            </p>
            <div class="agenda-item-image-container">
                <img src="img/Event_speakers/pauline-rivercitylabs.jpg" alt="Pauline Fetaui">
            </div>
        </div>
        <div class="agenda-item">
            <h2>9:15am - 10:00am Japan:</h2>
            <p>Presentation I: "Deals done" - A case study of recent Digital deal between Japanese buyers and
                CEE digital services provider.
            </p>
            <p>
                <b>Hideki Ninomiya</b>, Orient (Tokyo) Presentation II: AI and Japan. Is there space for
                CEE partners?
            </p>
            <p>
                <b>Marc Einstein</b>, ITR Corp. (Tokyo)
            </p>
            <div class="agenda-item-image-container">
                <img src="img/Jury_members/hideki_3.png" alt="Pauline Fetaui">
                <img src="img/Event_speakers/einsteinitr.jpg" alt="Pauline Fetaui">
            </div>
        </div>

        <div class="separator blue"></div>

        <h2 class="centered padding-bottom-2-em"><u>Break-out Focus Sessions</u></h2>
        <div class="agenda-item">
            <h2>9:30 - 11:00 "Morning" Meetings: </h2>
            <p> 1-on-1 Video Meetings: Japan and Australia</p>
        </div>

        <div class="separator blue"></div>

        <h2 class="centered padding-bottom-2-em"><u>Main Stage/Plenary</u></h2>
        <h2>10:00am - 10:30am "AI: How Artificial Intelligence is solving problems and boosting
            productivity" - A case study. </h2>
        <p><b>"Finally, AI that works in the field"</b>, <b>Michael Mazur</b> and <b>Adam
                Wisniewski</b>, Founders, <b>AI Clearing</b></p>
        <div class="flex agenda-item-image-container">
            <img src="img/Event_speakers/AI_Clearing_sm_Mazur_Wisniewski.jpg" alt="">
            <img src="img/Event_speakers/AI_Clearing_logo.png" alt="">
        </div>

        <h2 class="padding-top-2-em">10:30am - 10:45am "Unlock IP-Box for your business</h2>
        <p>Untapped potential of preferential tax mechanism for
            innovators in Poland", <b>Kacper Kosowicz</b>, Business Development Director CEE, <b>KR GROUP LTD.</b></p>
        <div class="flex agenda-item-image-container">
            <img src="img/Event_speakers/Kacperkossowicz2.jpg" alt="">
        </div>
        <div class="agenda-item">
            <h2>10:45 - 11:30 UK: How UK Startups can scale-up with tech talent from CEE. </h2>
            <p>
                How UK Startups scale-up with tech talent from CEE.
            </p>
            <p><b>Panelists(2):</b></p>
            <ul class="list-with-bullet">
                <li>
                    <b>Russell Dalgleish</b>, Chair, Scottish Business Network
                </li>
                <li>
                    <b>Bart Kowalczyk</b>, Polish Business Link (UKI)
                </li>
                <li>
                    <b>Greg Wasowski</b>, Sr Principal Manager, ISV GTM Strategy and Programs, Salesforce.com
                </li>
            </ul>
            <div class="flex agenda-item-image-container">
                <img src="img/Event_speakers/russell-dalgleish-scottishbusiness_1.jpg" alt="Russell Dalgleish">
                <img src="img/Event_speakers/KowalczykBart_PBLink.jpg" alt="Bart Kowalczyk">
                <img src="img/Event_speakers/Salesforce_GregWasowski.jpg" alt="Greg Wasowski">
            </div>
        </div>
        <div class="agenda-item">
            <h2>11:30- 12:00 Belarus:</h2>
            <p>Top CEE Locations for Belarussian digital/tech companies. (15 minutes introduction to top local
                investment officials).</p>
            <p>City #1: <b>City of Lodz, Adam Pustelnik</b>, Deputy Mayor</p>
            <p>City #2: <b>Moldova and Moldova IT Park, Natalia Dontu.</b></p>
            <p>City #3: tba</p>
            <div class="flex agenda-item-image-container">
                <img src="img/Event_speakers/Lodz_PustelnikAdam.jpg" alt="">
                <img src="img/Event_speakers/Moldova_Natalia Donțu.jpg" alt="">
            </div>
        </div>
        <div class="agenda-item">
            <h2>12:00 - 14:00 "High-noon" Meetings:</h2>
            <p>Video Meetings: Europe, UK, and Scandinavia:</p>
            <ul class="list-with-bullet">
                <li>
                    Nordics: 1-on-1 meetings with 3-4 corporates.
                </li>
                <li>
                    Germany: 1-on-1 meetings with 3-4 corporates.
                </li>
                <li>
                    Austria: 1-on-1 meetings with 3-4 corporates.
                </li>
            </ul>
        </div>
        <div class="agenda-item">
            <h2>12:00 - 12:55 Germany and DACH:</h2>
            <p>
                How DACH enterprises and SMEs increasingly view CEE digital firms as strategic partners. And
                what CEE firms can do to move up the value-chain.
            </p>
            <p><b>Moderator:</b> <b>Lars Gutheil</b>, German-Poland Chamber of Commerce</p>
            <p><b>Panelists:</b></p>
            <ul class="list-with-bullet">
                <li>
                    <b>Tobias Fausch</b>, CIO, BayWa AG (Munich)
                </li>
                <li>
                    <b>Martin Treder</b>, Information Domain Owner, Boehringer Ingelheim (North
                    Rhine-Westphalia)
                </li>
                <li>
                    <b>Subhrajyoti Bose</b>, Director, Digital Product Engineering, HARTMANN Group (Stuttgart)
                </li>
            </ul>
            <div class="flex agenda-item-image-container">
                <img src="img/Event_speakers/ahk-gutheil-lars.jpg" alt="Lars Gutheil">
                <img src="img/Jury_members/fauschtobias_orig.jpg" alt="Tobias Fausch">
                <img src="img/Jury_members/tredermartin_orig.jpg" alt="Martin Treder">
                <img src="img/Jury_members/subhraj_orig.jpg" alt="Subhrajyoti Bose">
            </div>
        </div>
        <div class="agenda-item">
            <h2>13:00 - 13:55 Nordics:</h2>
            <p>
                An insight into the corporate digital demands in Sweden, Norway, Denmark, Finland and Iceland -
                and opportunities to work with CEE companies.
            </p>
            <p class="no-margins">
                <b> Panelists:</b>
            </p>
            <ul class="list-with-bullet">
                <li>
                    <b>Anna Martinkari</b>, Head of Digital, Telia Company
                </li>
                <li>
                    <b>Jesper Frederiksen</b>, VP, CIO Digital Enablement, Velux

                </li>
                <li>
                    <b>Petri Hassinen</b>, Director, Data Management, Valmet, Helsinski
                </li>
            </ul>
            <div class="flex agenda-item-image-container">
                <img src="img/Jury_members/telia-annamartinkari_orig.jpg" alt="Anna Martinkari">
                <img src="img/Jury_members/velux-jesper_orig.jpg" alt="Jesper Frederiksen">
                <img src="img/Jury_members/valmet-petrihassinen_orig.jpg" alt="Petri Hassinen">
            </div>
        </div>


        <div class="separator blue"></div>
        <h2 class="centered">Afternoon sessions:</h2>
        <h2 class="centered">US Audience begins to join</h2>
        <p class="centered">Time zone: CET Central European Time</p>
        <h2 class="centered">13:30 - 14:00 Lunch Break, 1-on-1 Networking, and visiting Virtual Information Booths</h2>
        <div class="separator blue"></div>

        <h2 class="centered padding-bottom-2-em"><u>Main Stage/Plenary</u></h2>

        <div class="agenda-item">
            <h2>14:00 - 14:30 US Panel I: "Prying open large Enterprises".</h2>
            <p>
                How persistence, perspiration, and patience are key to engaging
                with largest companies in the US.
            </p>
            <p>
                <b>Panelists:</b> <b>Satyen Harvé</b>, CIO Advisor, GlobexHealth, New Jersey
            </p>
            <div class="flex agenda-item-image-container">
                <img src="img/Jury_members/satyenharve_orig.jpg" alt="Satyen Harvé">
            </div>
        </div>

        <div class="agenda-item">
            <h2>14:30 - 16:30 CEE Solutions Showcases (8 presentations to VIP Jury Members):</h2>
            <ul class="list-with-bullet">
                <li>
                    Showcase #1:
                    <img src="img/Other_logos/Datasentics_LOGO.jpg" alt="DataSentics Logo">
                    <ul class="list-with-bullet">
                        <li>
                            <b>Topic:</b> PX360: 4 key modules to help you establish new processes of using
                            customer data for customer engagement.
                        </li>
                        <li>
                            <b>Presenter:</b> DataSentics (Prague), David Vopelka
                        </li>
                    </ul>
                </li>
                <li>
                    Showcase #2:
                    <img src="img/Other_logos/CODERSPEAK-Logo.png" alt="CodersPeak logo">
                    <ul class="list-with-bullet">
                        <li>
                            <b>Topic:</b> Heelix - a multi-platform Employee-engagement application (desktop,
                            iOS, Android) with intuitive visual tools, organizational charts, and progress
                            tracking allowing users to share important news and celebrate successes together.
                        </li>
                        <li>
                            <b>Presenter:</b> CodersPeak (Krakow), Tom Brunarski and Kamil Halas
                        </li>
                    </ul>
                </li>
                <li>
                    Showcase #3:
                    <img src="img/Other_logos/QORE_Logo_green_gray_transparent.png" alt="Quore Logo">
                    <img src="img/Other_logos/CGF_Logo.jpg" alt="CGF Logo">
                    <ul class="list-with-bullet">
                        <li>
                            <b>Topic:</b>Self-Service Customer Care: Using Conversational AI with Enterprise
                            Integration to Unlock your Back-Office Systems
                        </li>
                        <li>
                            <b>Presenter:</b> Qore Technologies (Prague), David Nichols & Andrei Mititelu
                        </li>
                    </ul>
                </li>
                <li>
                    Showcase #4:
                    <img src="img/Other_logos/ConnectionsConsult_Logo1.png" alt="Connections Consult Logo">
                    <ul class="list-with-bullet">
                        <li>
                            <b>Topic:</b> Reserved
                        </li>
                        <li>
                            <b>Presenter:</b> Connections Consult (Bucharest), Bogdan Florea
                        </li>
                    </ul>
                </li>
                <li>
                    Showcase #5:
                    <img src="img/Other_logos/CTO_Tech_Logo.jpg" alt="">
                    <ul class="list-with-bullet">
                        <li>
                            <b>Topic:</b> Fabriscent - an enhanced ICU patients monitoring solution
                        </li>
                        <li>
                            <b>Presenter:</b> CTOtech (Cluj-Napoca), CEO Flavian-Catalin Pah
                        </li>
                    </ul>
                </li>
                <li>
                    Showcase #6:
                    <ul class="list-with-bullet">
                        <li>
                            <b>Topic:</b> ActiveGraf puts the power of the smartest data scientists in the hands
                            of everyone. Easily control predictive analysis in real time with answers to any
                            "what if?" scenario, built in. Dynamically connect your Excels and PowerPoints in
                            minutes. So you have all the answers right when you need them most. Now.
                        </li>
                        <li>
                            <b>Presenter:</b> Laszlo Balassy, Founder, ActiveGraf (Charlotte and Budapest)
                        </li>
                    </ul>
                </li>
                <li>
                    Showcase #7:
                    <img src="img/Other_logos/Silk Data logo.png" alt="Silk Data Logo">
                    <ul class="list-with-bullet">
                        <li>
                            <b>Topic:</b> Plagiarism detection system for professional accounting exams
                        </li>
                        <li>
                            <b>Presenter:</b> Silk Data, Nikolai Karelin, Head of AI
                        </li>
                    </ul>
                </li>
                <li>
                    Showcase #8:
                    <ul class="list-with-bullet">
                        <li>
                            <b>Topic:</b> Available
                        </li>
                        <li>
                            <b>Presenter:</b> tba
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="agenda-item">
            <h2>16:30 - 17:15 US Panel II: US SMB's - Insights into engaging with these "not-so-small" Small-Medium
                sized businesses.</h2>
            <p>
                <b>Presentation:</b> tba
            </p>
            <p>
                <b>Panelists (3):</b>
            </p>
            <ul class="list-with-bullet">
                <li>
                    <b>Garth Holsinger</b>, Founder/CEO, Enterprise Alpha (Helping startups start,
                    grow and thrive with enterprise partners).
                </li>
                <li>
                    <b>Thomas Zakrzewski</b>, Founder & Managing Partner, EgisData, New York
                </li>
                <li>
                    <b>Eleonora Israele</b>, Head of Strategic Partnerships & Corporate Development, Clutch, Washington,
                    DC
                </li>
            </ul>
            <div class="agenda-item-image-container">
                <img src="img/Advisory_board_members/garthholsinger.jpg" alt="Garth Holsinger">
                <img src="img/Jury_members/egisdata-zakrzewski-thomas_orig.jpg" alt="Thomas Zakrzewski">
                <img src="img/Event_speakers/Clutch_EleonoraIsraele.jpg" alt="Eleonora Israele">
            </div>
        </div> -->

        <!-- Closing title -->
        <div class="separator blue"></div>
        <div class="padding-bottom-2-em padding-top-2-em">
            <?php echo $close; ?>
        </div>
    </section>

<?php include "PHP/footer.php"; ?>