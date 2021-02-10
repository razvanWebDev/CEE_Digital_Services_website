<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Agendas Page Content</h1>

                        <?php 
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }

                        switch($source) {
                            case 'add_agendas_page_content';
                            include "includes/add_agendas_page_content.php";
                            break;

                            case 'add_agendas_page_content_two_columns';
                            include "includes/add_agendas_page_content_two_columns.php";
                            break;

                            case 'edit_agendas_page_content';
                            include "includes/edit_agendas_page_content.php";
                            break;

                            default:
                            include "includes/view_agendas_page_content.php";
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
