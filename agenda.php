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
                        echo "<h2 class='centered'><u>$stage_name</u></h2>";
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
                        echo "<h2 class='centered'><u>$stage_name</u></h2>";
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
                            echo "<h2 class='centered'><u>$right_column_stage_name</u></h2>";
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

        <!-- Closing title -->
        <div class="separator blue"></div>
        <div class="padding-bottom-2-em padding-top-2-em">
            <?php echo $close; ?>
        </div>
    </section>

<?php include "PHP/footer.php"; ?>