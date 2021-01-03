<?php include "admin_header.php"; ?>

    <div id="wrapper">

<?php include "admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">News</h1>

                        <?php 
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }

                        switch($source) {
                            case 'add_news';
                            include "includes/add_news.php";
                            break;

                            default:
                            include "includes/view_all_news.php";

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
<?php include "admin_footer.php" ?>
