<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Partnership Options Page Content</h1>

                        <?php 
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }

                        switch($source) {
                            case 'add_partnership_options_content';
                            include "includes/add_partnership_options_content.php";
                            break;

                            case 'add_partnership_options_content_with_image';
                            include "includes/add_partnership_options_content_with_image.php";
                            break;

                            case 'add_partnership_options_content_with_video';
                            include "includes/add_partnership_options_content_with_video.php";
                            break;

                            case 'edit_partnership_options_content';
                            include "includes/edit_partnership_options_content.php";
                            break;

                            default:
                            include "includes/view_partnership_options_content.php";
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
