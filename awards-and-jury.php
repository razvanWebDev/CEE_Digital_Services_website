<?php include "PHP/header.php"; ?>
<?php include "PHP/nav.php"; ?>

    <section class="section-with-bg">
    <?php 
        
        $query = "SELECT * FROM awards_and_jury_page_title WHERE id=1";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $text_1 = $row['text_1'];
            $text_2 = $row['text_2'];
        } 
        ?>
        <h1><img src="img/SVG/Award_icon.svg" alt="award icon" class="section-title-icon"><?php echo $title; ?></h1>
        <div class="about-awards">
            <div class="separator"></div>
            <?php echo $text_1; ?>
        </div>
        <div class="separator"></div>
        <div class="jury-members">
        <?php echo $text_2; ?>
    </section>
    <section class="cards-container">
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/hideki_3.png" alt="Hideki Nimomiya">
                </div>
            </div>
            <p class="jury-member-bold">Hideki Nimomiya</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">CEO</p>
            <p class="jury-member-bold">Orient</p>
            <p class="jury-member-light">Tokyo</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/signify-alexandragaillard-sm_orig.jpg" alt="Alexandra Gaillard"
                        id="alexandra-gaillard">
                </div>
            </div>
            <p class="jury-member-bold">Alexandra Gaillard</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">VP, Digital Marketing</p>
            <p class="jury-member-bold">Signify</p>
            <p class="jury-member-light">Lausanne</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/sgs-heidler-sm_orig.jpg" alt="Christoph Heidler" class="landscape">
                </div>
            </div>
            <p class="jury-member-bold">Christoph Heidler</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">(EX) CIO & Board Member</p>
            <p class="jury-member-bold">Société Générale de Surveillance</p>
            <p class="jury-member-light">Geneva</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/velux-jesper_orig.jpg" alt="Jesper Frederiksen">
                </div>
            </div>
            <p class="jury-member-bold">Jesper Frederiksen</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">VP, CIO Digital Enablement</p>
            <p class="jury-member-bold">Velux</p>
            <p class="jury-member-light">Denmark</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/telekom-angela-maragopoulou-2_orig.jpg" alt="Angela Maragopoulou">
                </div>
            </div>
            <p class="jury-member-bold">Angela Maragopoulou</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">CIO B2B</p>
            <p class="jury-member-bold">Deutsche Telekom</p>
            <p class="jury-member-light">Cologne</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/fauschtobias_orig.jpg" alt="Tobias Fausch">
                </div>
            </div>
            <p class="jury-member-bold">Tobias Fausch</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">CIO</p>
            <p class="jury-member-bold">BayWa AG</p>
            <p class="jury-member-light">Munich</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/sap-candishjohn_2.jpg" alt="John Candish">
                </div>
            </div>
            <p class="jury-member-bold">John Candish</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">VP & Chief Expert, IOT</p>
            <p class="jury-member-bold">SAP</p>
            <p class="jury-member-light">London</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/tredermartin_orig.jpg" alt="Martin Treder">
                </div>
            </div>
            <p class="jury-member-bold">Martin Treder</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">Information Domain Owner</p>
            <p class="jury-member-bold">Boehringer Ingelheim</p>
            <p class="jury-member-light">North Rhine-Westphalia</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/telia-annamartinkari_orig.jpg" alt="Anna Martinkari">
                </div>
            </div>
            <p class="jury-member-bold">Anna Martinkari</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">Head of Digital</p>
            <p class="jury-member-bold">Telia Company</p>
            <p class="jury-member-light">Stockholm</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/salesforce-gregwasowski_2.jpg" alt="Greg Wasowski">
                </div>
            </div>
            <p class="jury-member-bold">Greg Wasowski</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">SR Principal, ISV Strategy & Programs</p>
            <p class="jury-member-bold">Salesforce</p>
            <p class="jury-member-light">London</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/astrazeneca-katiestephens_orig.jpg" alt="Katie Stephen">
                </div>
            </div>
            <p class="jury-member-bold">Katie Stephen</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">Finance Transformation Programme Manager</p>
            <p class="jury-member-bold">Astra Zeneca</p>
            <p class="jury-member-light">Edinburgh</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/ibm-olivier_orig.jpg" alt="Olivier Kilani">
                </div>
            </div>
            <p class="jury-member-bold">Olivier Kilani</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">Transition CIO & Group VP, Business Digital Transformation</p>
            <p class="jury-member-bold">IBM BCS</p>
            <p class="jury-member-light">London</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/subhraj_orig.jpg" alt="Subhrajyoti Bose">
                </div>
            </div>
            <p class="jury-member-bold">Subhrajyoti Bose</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">Director, Digital Product Engineering</p>
            <p class="jury-member-bold">HARTMANN Group</p>
            <p class="jury-member-light">Stuttgart</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/lidl-dirkkahl_2.jpg" alt="Dirk Kahl">
                </div>
            </div>
            <p class="jury-member-bold">Dirk Kahl</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">CFO</p>
            <p class="jury-member-bold">Lidl GB</p>
            <p class="jury-member-light">London</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/sanoma-turomaki-3_orig.jpg" alt="Turo Maki">
                </div>
            </div>
            <p class="jury-member-bold">Turo Maki</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">CIO & CTO</p>
            <p class="jury-member-bold">Sanoma Media</p>
            <p class="jury-member-light">Helsinki</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/abconvergence-alainbrouhard_1.jpeg" alt="Alain Brouhard"
                        class="landscape">
                </div>
            </div>
            <p class="jury-member-bold">Alain Brouhard</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">CEO</p>
            <p class="jury-member-bold">ABConvergence (and former Sr. Exec at P&G, adidas & Coca-Cola)</p>
            <p class="jury-member-light">Zurich</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/pandora-peter-cabello-holmberg_orig.jpg" alt="Peter Cabello Holmberg">
                </div>
            </div>
            <p class="jury-member-bold">Peter Cabello Holmberg</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">SVP, IT</p>
            <p class="jury-member-bold">Pandora A/S</p>
            <p class="jury-member-light">Copenhagen</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/sse-tonykeeling_orig.jpg" alt="Tony Keeling">
                </div>
            </div>
            <p class="jury-member-bold">Tony Keeling</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">M.D., SSE Retail</p>
            <p class="jury-member-bold">OVO Energy</p>
            <p class="jury-member-light">London</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/ericsson-cristina-david_orig.jpg" alt="Cristina David">
                </div>
            </div>
            <p class="jury-member-bold">Cristina David</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">VP Business CIO - Head of Enterprise Systems</p>
            <p class="jury-member-bold">Ericsson</p>
            <p class="jury-member-light">Stockholm</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/valmet-petrihassinen_orig.jpg" alt="Petri Hassinen">
                </div>
            </div>
            <p class="jury-member-bold">Petri Hassinen</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">Director, Data Management</p>
            <p class="jury-member-bold">Valmet</p>
            <p class="jury-member-light">Helsinki</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/lenovo-korienekmarian_orig.jpg" alt="Marian Korienek">
                </div>
            </div>
            <p class="jury-member-bold">Marian Korienek</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">GM (PL, CZ & SK)</p>
            <p class="jury-member-bold">Lenovo Data Center Group</p>
            <p class="jury-member-light">Bratislava</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/webasto-thomasmannmeusel_orig.jpg" alt="Thomas Mannmeusel">
                </div>
            </div>
            <p class="jury-member-bold">Thomas Mannmeusel</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">EVP, Process Optimization & Group CIO</p>
            <p class="jury-member-bold">Webasto Group</p>
            <p class="jury-member-light">Bavaria</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/nn-markwillimsee_orig.jpg" alt="Mark Willemse">
                </div>
            </div>
            <p class="jury-member-bold">Mark Willemse</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">CIO</p>
            <p class="jury-member-bold">Nationale Nederlanden Romania</p>
            <p class="jury-member-light">Bucharest</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/esteelauder_orig.jpg" alt="Les Correia">
                </div>
            </div>
            <p class="jury-member-bold">Les Correia</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">Global Head of Application Security</p>
            <p class="jury-member-bold">Estee Lauder Companies</p>
            <p class="jury-member-light">New York</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/markminevich_orig.jpg" alt="Mark Minevich">
                </div>
            </div>
            <p class="jury-member-bold">Mark Minevich</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">Digital Cognitive Strategist</p>
            <p class="jury-member-bold">Going Global Ventures</p>
            <p class="jury-member-light">New York</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/nokiabelllabs-domhnaill-hernon_orig.jpg" alt="Domhnaill Hernon">
                </div>
            </div>
            <p class="jury-member-bold">Domhnaill Hernon</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">VP, Research and Innovation</p>
            <p class="jury-member-bold">Nokia Bell Labs</p>
            <p class="jury-member-light">New York</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/collabera-viral-tripathi-sm_orig.jpg" alt="Viral Tripathi"
                        id="viral-tripathi">
                </div>
            </div>
            <p class="jury-member-bold">Viral Tripathi</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">Global CIO</p>
            <p class="jury-member-bold">Collabera</p>
            <p class="jury-member-light">New York</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/satyenharve_orig.jpg" alt="Satyen Harvé">
                </div>
            </div>
            <p class="jury-member-bold">Satyen Harvé</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">CIO Advisor</p>
            <p class="jury-member-bold">GlobexHealth</p>
            <p class="jury-member-light">New Jersey</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/gartner-lorirodriguez_orig.jpg" alt="Lori Rodriguez">
                </div>
            </div>
            <p class="jury-member-bold">Lori Rodriguez</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">VP Strategy, Innovation and Operations</p>
            <p class="jury-member-bold">Gartner</p>
            <p class="jury-member-light">New York</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/egisdata-zakrzewski-thomas_orig.jpg" alt="Thomas Zakrzewski"
                        class="landscape">
                </div>
            </div>
            <p class="jury-member-bold">Thomas Zakrzewski</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">Founder & Managing Partner</p>
            <p class="jury-member-bold">EgisData</p>
            <p class="jury-member-light">New York</p>
        </div>
        <div class="jury-member-card">
            <div class="jury-member-foto-frame">
                <div class="jury-member-foto-container">
                    <img src="img/Jury_members/epam-boris_orig.png" alt="Boris Khazin">
                </div>
            </div>
            <p class="jury-member-bold">Boris Khazin</p>
            <div class="jury-member-underline"></div>
            <p class="jury-member-light">Global Head of GRC</p>
            <p class="jury-member-bold">EPAM</p>
            <p class="jury-member-light">New York</p>
        </div>
    </section>

<?php include "PHP/footer.php"; ?>