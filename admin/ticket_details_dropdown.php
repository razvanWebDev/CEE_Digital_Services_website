<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ticket details dropdown</h1>

                        <?php 
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }

                        switch($source) {
                            case 'add_ticket_details_dropdown';
                            include "includes/add_ticket_details_dropdown.php";
                            break;

                            case 'edit_ticket_details_dropdown';
                            include "includes/edit_ticket_details_dropdown.php";
                            break;

                            default:
                            include "includes/view_ticket_details_dropdown.php";
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
