<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

    <section class="section-with-bg">
        <h1><img src="img/SVG/Newsletter_icon.svg" alt="" class="section-title-icon">Newsletter SignUp (free,
            bi-weekly)</h1>
        <div class="separator"></div>
        <p>
            ​​We produce a "news" Newsletter twice per month, covering the Digital ecosystem of Central Eastern Europe.
            Our focus is on news, deals, and events of interest to global firms working with CEE-based digital services
            providers.
        </p>
        <p>
            We cover Poland, Hungary, Czech Republic, Slovakia, Lithuania, Latvia, Estonia, Romania, Serbia, Bulgaria,
            Belarus, Moldova - and Ukraine.
        </p>
        <h1><img src="img/SVG/Newsletter_icon.svg" alt="" class="section-title-icon">Newsletter SignUp - CEE Digital
            Services Association</h1>
        <div class="separator"></div>
        <p>* INDICATES REQUIRED FIELD</p>
        <form method="POST" action="PHP/newsletter-form.php" enctype="multipart/form-data" id="newsletter-form"
            name="newsletter-form">
            <div class="form-row">
                <div>
                    <label for="first-name" class="padding-bottom-1-em">NAME: *</label>
                    <input type="text" name="first-name" class="required-field" placeholder="First">
                </div>
                <div class="flex input-without-label">
                    <input type="text" name="last-name" class="required-field" placeholder="Last">
                </div>
            </div>
            <div class="form-row">
                <div>
                    <label for="position" class="padding-bottom-1-em">TITLE / POSITION *</label>
                    <input type="text" name="position" class="required-field">
                </div>
                <div>
                    <label for="company-name" class="padding-bottom-1-em">COMPANY NAME *</label>
                    <input type="text" name="company-name" class="required-field" placeholder="First">
                </div>
                <div>
                    <label for="email" class="padding-bottom-1-em">EMAIL *</label>
                    <input type="email" name="email" class="required-field email" placeholder="Last">
                </div>
            </div>

            <button type="submit" name="submit" class="button white form-submit-button">SUBMIT</button>
        </form>
    </section>

<?php include "PHP/footer.php"; ?>