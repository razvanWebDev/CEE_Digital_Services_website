<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

    <section class="event-title-section section-with-bg">
        <div class="event-title">
            <div class="event-title-image">
                <img src="img/Logo.png" alt="logo">
            </div>
            <?php 
                $query = "SELECT * FROM ticket_reservations_page_title";
                $result = mysqli_query($connection, $query);
        
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['title'];
                    $text = $row['text'];
                }
            ?>
            <div class="event-title-text">
                <?php echo $title; ?>
            </div>
        </div>
        <?php echo $text; ?>
    </section>
    <section>
        <?php 
            $query = "SELECT * FROM ticket_reservations_text";
            $result = mysqli_query($connection, $query);
        
            while ($row = mysqli_fetch_assoc($result)) {
                $page_text = $row['text'];
            }

            echo $page_text;
        ?>
        <!-- <h2>We have a 2-tiered ticket reservation system - plus the "CEE Solutions Showcase" option:</h2>
        <ul class="list-with-numbers">
            <li>
                <strong>Watch Presentations Only:</strong> All members of our Partners and Partner Associations are
                complimentary; non-members 190 euro.
            </li>
            <li>
                1-on-1 Meetings and Full Networking, plus Presentations. Open only for CEE-based digital services
                providers and global technology buyers. Limited to 30 corporate buyers/gate-keepers and 60 CEE-based
                digital services providers.
                Meetings are limited to 10 minutes. Most companies should expect to have 4-6 pre-arranged, direct
                meetings
                (and additional 3+ Networking meetings) during the day.
            </li>
        </ul>
        <h2 class="padding-top-1-em">Pricing (and deadlines):</h2>
        <ul class="list-with-bullet">
            <li>
                CEE-based digital services providers: 290 euro for Association Partners; 390 euro for non-partners.
            </li>
            <li>
                Corporates and global technology buyers: 190 euro (or complimentary if via a partner Association)
            </li>
        </ul>
        <p>
            <b>Early-Bird Reservations Deadline:</b> 31st December. (10% discount off all Single Tickets.)
        </p>
        <h2>Registration is below (final deadline: 8 January)</h2>
        <p>
            For companies interested in the 15-minute <a href="submit-solutions-showcase.html" target="_blank">CEE
                Solutions Showcase</a> (limited to only 10 companies).
        </p> -->
    </section>
    <section>
        <h1>
            Ticket Reservation Form:
        </h1>
        <p>* INDICATES REQUIRED FIELD</p>
        <form method="POST" action="PHP/reserve-tickets.php" enctype="multipart/form-data" id="reserve-tickets-form"
            name="reserve-tickets-form">


            <div class="flex">
                <div class="form-column">
                    <label for="company-name" class="padding-top-2-em">COMPANY NAME: *</label>
                    <input type="text" name="company-name" class="input-blue required-field">
                    <label for="matchmaking-option" class="padding-top-2-em">Which Association Partner are you a member
                        of?</label>
                    <div class="custom-select">
                        <select name="matchmaking-option-select">
                            <option value="0">Select Option</option>
                            <?php 
                                $query = "SELECT * FROM association_partner_dropdown ORDER BY position";
                                $select_all_posts_query = mysqli_query($connection, $query);
                        
                                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                                    $dropdown_value = $row['dropdown_value'];
                                    echo '<option value="'.$dropdown_value.'">'.$dropdown_value.'</option>';
                                }
                            ?>
                            <!-- <option value="ANIS Romania">ANIS Romania</option>
                            <option value="AIBEST Bulgaria">AIBEST Bulgaria</option>
                            <option value="PRG. AI (Prague AI)">PRG. AI (Prague AI)</option>
                            <option value="InfoBalt (Lithuania)">InfoBalt (Lithuania)</option>
                            <option value="LIKTA (Latvia)">LIKTA (Latvia)</option>
                            <option value="ABSA Albania">ABSA Albania</option>
                            <option value="Moldova IT Park">Moldova IT Park</option>
                            <option value="None of these">None of these</option> -->
                        </select>
                    </div>

                    <label for="ticket-reservation-details-select" class="padding-top-2-em">TICKET RESERVATION DETAILS
                        *</label>
                    <div class="custom-select">
                        <select name="ticket-reservation-details-select" class="required-select">
                            <option value="0">Select Option</option>
                            <?php 
                                $query = "SELECT * FROM ticket_details_dropdown ORDER BY position";
                                $select_all_posts_query = mysqli_query($connection, $query);
                        
                                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                                    $dropdown_value = $row['dropdown_value'];
                                    echo '<option value="'.$dropdown_value.'">'.$dropdown_value.'</option>';
                                }
                            ?>

                            <!-- <option
                                value="Services Providers: Presentations Only (Complimentary for Partners; 190euro non-Partners)">
                                Services Providers: Presentations Only (Complimentary for Partners; 190euro
                                non-Partners)</option>
                            <option
                                value="Services Providers: 1-on-1 Meetings + Presentations (290euro for Partners; 390 euro non-Partners)">
                                Services Providers: 1-on-1 Meetings + Presentations (290euro for Partners; 390 euro
                                non-Partners)</option>
                            <option value="Corporate Technology Buyers (190 euro; or Complimentary via Partner)">
                                Corporate Technology Buyers (190 euro; or Complimentary via Partner)</option>
                            <option
                                value="Belarus Companies - Complimentary (both 1-on-1 Meetings & Presentations), compliments of City of Lodz; and Moldova.">
                                Belarus Companies - Complimentary (both 1-on-1 Meetings & Presentations), compliments of
                                City of Lodz; and Moldova.</option> -->
                        </select>
                    </div>

                    <label for="name" class="padding-top-2-em">PARTICIPANT NAME *</label>
                    <input type="text" name="name" class="input-blue required-field">

                    <label for="position" class="padding-top-2-em">TITLE *</label>
                    <input type="text" name="position" class="input-blue required-field">

                    <label for="email" class="padding-top-2-em">EMAIL (CONFIDENTIAL) *</label>
                    <input type="text" name="email" class="input-blue required-field email">

                    <label for="telephone" class="padding-top-2-em">TELEPHONE (CONFIDENTIAL) *</label>
                    <input type="text" name="telephone" class="input-blue required-field">

                    <label for="invoicing-company-name" class="padding-top-2-em">INVOICING (COMPANY NAME) *</label>
                    <input type="text" name="invoicing-company-name" class="input-blue required-field">

                    <label for="contact-email" class="padding-top-2-em">CONTACT EMAIL FOR INVOICING/ADMIN *</label>
                    <input type="text" name="contact-email" class="input-blue required-field email">

                    <label for="contact-phone" class="padding-top-2-em">CONTACT TELE FOR INVOICING/ADMIN *</label>
                    <input type="text" name="contact-phone" class="input-blue required-field">

                    <label for="tax-id" class="padding-top-2-em">TAX ID/COMPANY ID FOR INVOICING</label>
                    <input type="text" name="tax-id" class="input-blue">
                </div>

                <div class="form-column">

                    <label for="2nd-participant-name" class="padding-top-2-em">2ND PARTICIPANT NAME</label>
                    <input type="text" name="2nd-participant-name" class="input-blue">

                    <label for="2nd-participant-title" class="padding-top-2-em">TITLE</label>
                    <input type="text" name="2nd-participant-title" class="input-blue">

                    <label for="2nd-participant-email" class="padding-top-2-em">EMAIL (CONFIDENTIAL)</label>
                    <input type="text" name="2nd-participant-email" class="input-blue email">

                    <label for="2nd-participant-telephone" class="padding-top-2-em">TELEPHONE (CONFIDENTIAL)</label>
                    <input type="text" name="2nd-participant-telephone" class="input-blue">

                    <label for="aditional-notes" class="padding-top-2-em">ADDITIONAL NOTES</label>
                    <textarea id="aditional-notes" name="aditional-notes" rows="10" class="textarea-blue"></textarea>
                </div>
            </div>

            <button type="submit" name="submit" class="button blue form-submit-button">SUBMIT TICKET
                RESERVATION</button>
        </form>
    </section>

<?php include "PHP/footer.php"; ?>