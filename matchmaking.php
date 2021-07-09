<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

<section class="event-title-section section-with-bg">
    <div class="event-title">
        <div class="event-title-image">
            <img src="img/Logo.png" alt="logo">
        </div>

        <?php 
                $query = "SELECT * FROM matchmaking_summit_title WHERE id=1";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)){
                    $title = $row['title'];
                    $sub_title = $row['sub_title'];
                    $text = $row['text'];
                    $date = $row['date'];
            ?>

        <div class="event-title-text">
            <h1>
                <?php echo $title ?>
            </h1>
            <h2>
                <?php echo $sub_title ?>
            </h2>
            <h2>
                <?php echo $date ?>
            </h2>
            <div class="event-title-desc">
                <?php echo $text ?>
            </div>
        </div>

    </div>

    <?php } ?>
</section>

<section class="event-description-section">
    <?php
            $query = "SELECT * FROM matchmaking_summit_content WHERE id=1";
            $result = mysqli_query($connection, $query);
    
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $content = $row['content'];
                
            
        ?>
    <div class="event-description-title">
        <?php  echo $title; ?>
    </div>

    <div class="event-description">
        <div class="event-description-sumary">
            <?php  echo $content; ?>
        </div>

        <div class="international-partners-section">
  
            <img class="texas-cee-advert" src="img/photos/Texas-summit-add.png" alt="Texas-CEE advert">
 
            <h1>INTERNATIONAL PARTNERS</h1>
            <div class="international-partners">
                    
                <img src="img/International_partners/TechRanchAustin.png" alt="Tech Ranch Austin">
                <img src="img/International_partners/WACA-Austin.jpg" alt="World Affairs Council Austin">
                <img src="img/International_partners/ahk-logo2.jpg" alt="deutche polische industrie">
                <img src="img/International_partners/advantageaustria-logo.png" alt="advantage austria">
                <img src="img/International_partners/bacc_orig.png" alt="baltic american chamber of commerce">
                <img src="img/International_partners/anis-logo-complet-color-en-square.png"
                    alt="employers assosiation of the software and services industry">
                <img src="img/International_partners/prgai-logo-color-2x.png" alt="prg.ai">
                <img src="img/International_partners/ivsz-hungary-logo_1.png" alt="">
                <img src="img/International_partners/slovak-ai.png" alt="slovak ai">
                <img src="img/International_partners/lithuaniaai-association_1.png"
                    alt="artificial intelligence association of lithuania">
                <img src="img/International_partners/infobalt-logo_orig.png" alt="info balt">
                <img src="img/International_partners/latviait-cluster-logo_1.webp" alt="latvian it cluster">
                <img src="img/International_partners/lvivit-cluster-logo_orig.png" alt="lviv it cluster">
                <img src="img/International_partners/moldovaitpark-logo_orig.png" alt="moldova it park">
                <img src="img/International_partners/moldovaict-logo_1.png"
                    alt="moldovan association of pribate ict companies">
                <img src="img/International_partners/aibest-logo-1.jpg" alt="ai best">
                <img src="img/International_partners/ABSA Logo-01.svg" alt="ABSA">
            </div>
        </div>
    </div>
    <?php } ?>
</section>

<?php include "PHP/footer.php"; ?>