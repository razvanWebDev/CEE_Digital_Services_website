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
        </p>
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