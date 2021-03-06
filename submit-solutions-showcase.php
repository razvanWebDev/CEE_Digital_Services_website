<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

    <section class="event-title-section section-with-bg">
        <div class="event-title">
            <div class="event-title-image">
                <img src="img/Logo.png" alt="logo">
            </div>
            <?php 
        
                $query = "SELECT * FROM solutions_showcase_title WHERE id=1";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)){
                    $title = $row['title'];
                    $content = $row['content'];
                } 
            ?>
            <div class="event-title-text">
                <?php echo $title; ?>
            </div>
        </div>
        <?php echo $content; ?>
    </section>
    <section>
    <?php 
        $query = "SELECT * FROM solutions_showcase_content WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $content = $row['content'];
        } 
    ?>
    <?php echo $content; ?>
        <!-- <h2>Here are details about the “CEE Solutions Showcase”:</h2>
        <ul class="list-with-bullet">
            <li>
                limited to 9 pre-approved companies in subject-exclusive categories.
            </li>
            <li>
                15 minutes case-study Presentation of a digital solution to a business problem. Topic must be approved
                by the organizer (and each of the 9 slots is topic-exclusive). You will present in front of the Jury on
                13 January.
            </li>
            <li>
                Automatic Inclusion in the Awards competition, with Winners to be announced the evening of 13 January at
                the online CEE Digital Services Awards.
            </li>
        </ul>
        <h2 class="padding-top-1-em">Additional benefits of submitting your "Solutions Showcase":</h2>
        <ul class="list-with-bullet">
            <li>
                Logos on Website and Hopin platform
            </li>
            <li>
                Logos on all Email and Social Media promotions
            </li>
            <li>
                1750 euro fee includes:
                <ul class="list-with-letters">
                    <li>
                        2 Tickets to attend the Virtual Summit.
                    </li>
                    <li>
                        Static Booth with pre-loaded Video-streaming and supporting information.
                    </li>
                    <li>
                        Full Page Advertisement in the Event Brochure (PDF emailed to all attendees, just prior to the
                        event).
                    </li>
                </ul>
            </li>
            <li>
                Your full contact details shared with VIP Jury members.
            </li>
        </ul>
        <p>
            While all CEE Solutions Showcases will present "live" in front of our Jury on 13 January, all Applications
            must be submitted via the form below. Pre-approvals to move forward will be announced within 1 day of
            submitting your Application. We are looking for outstanding examples of digital solutions that solved real
            business problems. The best Applications will be world-class, unique, compelling, and demonstrate strong
            ROI.
        </p> -->
    </section>
    <section>
        <h1>
            CEE Solutions Showcase - Submission Form:
        </h1>
        <p>* INDICATES REQUIRED FIELD</p>
        <form method="POST" action="PHP/submit-solutions-showcase.php" enctype="multipart/form-data"
            id="cee-solutions-showcase-form" name="cee-solutions-showcase-form">
            <div class="flex">
                <div class="form-column">
                    <label for="company-name" class="padding-top-2-em">COMPANY NAME: *</label>
                    <input type="text" name="company-name" class="input-blue required-field">

                    <label for="primary-location" class="padding-top-2-em">PRIMARY LOCATION (COUNTRY) *</label>
                    <input type="text" name="primary-location" class="input-blue required-field">

                    <label for="secondary-locations" class="padding-top-2-em">SECONDARY LOCATIONS (COUNTRIES)</label>
                    <input type="text" name="secondary-locations" class="input-blue">


                    <label for="name-of-ceo-or-founder" class="padding-top-2-em">NAME OF CEO OR FOUNDER:</label>
                    <input type="text" name="name-of-ceo-or-founder" class="input-blue">

                    <label for="showcase-presenter" class="padding-top-2-em">WHO WILL PRESENT SHOWCASE ON 13 JANUARY?
                        *</label>
                    <input type="text" name="showcase-presenter" class="input-blue required-field">

                    <label for="form-submitter" class="padding-top-2-em">NAME OF PERSON SUBMITTING THIS FORM *</label>
                    <input type="text" name="form-submitter" class="input-blue required-field">

                    <label for="telephone" class="padding-top-2-em">TELEPHONE (CONFIDENTIAL) *</label>
                    <input type="text" name="telephone" class="input-blue required-field">

                    <label for="email" class="padding-top-2-em">EMAIL (CONFIDENTIAL) *</label>
                    <input type="text" name="email" class="input-blue required-field email">

                    <label for="more-details" class="padding-top-2-em">PLEASE PROVIDE LINK TO MORE DETAILS (WEBSITE,
                        YOUTUBE, ETC.)</label>
                    <input type="text" name="more-details" class="input-blue">

                    <label for="other-comments" class="padding-top-2-em">OTHER COMMENTS</label>
                    <textarea id="other-comments" name="other-comments" rows="10" class="textarea-blue"></textarea>

                    <label for="invoicing-company-name" class="padding-top-2-em">INVOICING (COMPANY NAME) * </label>
                    <input type="text" name="invoicing-company-name" class="input-blue required-field">

                    <label for="address-tax-id" class="padding-top-2-em">COMPANY ADDRESS AND TAX ID: *</label>
                    <input type="text" name="address-tax-id" class="input-blue required-field">
                </div>

                <div class="form-column">
                    <label for="problem-description" class="padding-top-2-em">DESCRIBE THE BUSINESS PROBLEM THAT YOUR
                        SOLUTION ADDRESSED:</label>
                    <textarea id="problem-description" name="problem-description" rows="10"
                        class="textarea-blue"></textarea>

                    <label for="solution-description" class="padding-top-2-em">DESCRIBE YOUR SOLUTION:</label>
                    <textarea id="solution-description" name="solution-description" rows="10"
                        class="textarea-blue"></textarea>

                    <label for="solution-justification" class="padding-top-2-em">PLEASE PROVIDE JUSTIFICATION OF YOUR
                        COMPELLING SOLUTION IN TERMS OF ROI:</label>
                    <textarea id="solution-justification" name="solution-justification" rows="10"
                        class="textarea-blue"></textarea>

                    <label for="solution-references" class="padding-top-2-em">PLEASE PROVIDE REFERENCES (COMPANY NAMES)
                        THAT
                        COULD ATTEST TO THE QUALITY OF YOUR SOLUTION:</label>
                    <textarea id="solution-references" name="solution-references" rows="10"
                        class="textarea-blue"></textarea>
                </div>
            </div>

            <button type="submit" name="submit" class="button blue form-submit-button">SUBMIT SOLUTIONS
                SHOWCASE</button>
        </form>
    </section>

<?php include "PHP/footer.php"; ?>