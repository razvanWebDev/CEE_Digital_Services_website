<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

<?php include "includes/admin_navigation.php"; ?>

        <div class="title-container">

        </div>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Newsletter Subscriptions</h1>

                        <?php 
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }

                        switch($source) {

                            case 'edit_subscription';
                            include "includes/edit_subscription.php";
                            break;

                            default:
                            include "includes/view_all_newsletter_subscriptions.php";
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
