<?php include "includes/admin_header.php"; ?>

<?php 
    if(isset($_SESSION['username'])) {
        header("Location: admin.php");
    }

?>

    <div id="wrapper">



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                        </h1> 
                    </div>
                </div>
                <!-- /.row -->

                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="username">
                        </div>
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="password">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" name="login" type="submit">Submit</button>
                            </span>
                        </div>
                    
                    </form>
                    <br>
                    <p style="color:red"><?php echo $_SESSION['wrongcredentials']; ?> </p>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>
