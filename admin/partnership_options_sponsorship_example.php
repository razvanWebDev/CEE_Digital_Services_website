<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Partnership Options Features</h1>

                        <?php 
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }

                        switch($source) {
                            case 'edit_partnership_options_sponsorship_example';
                            include "includes/edit_partnership_options_sponsorship_example.php";
                            break;

                            default:
                            include "includes/view_partnership_options_sponsorship_example.php";
                        }
                        ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>
