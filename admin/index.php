<?php include "includes/admin_header.php"; ?>

<?php 
    if(isset($_SESSION['username'])) {
        header("Location: admin.php");
    }
?>

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1 style="color: white;">Website Admin</h1>
                    <form role="form" action="includes/login.php" method="post" id="login-form" autocomplete="on">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="on" value="<?php echo isset($username) ? $username : '' ?>"  required>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                        </div>
                
                        <input type="submit" name="login" class="btn btn-custom btn-lg btn-block" value="Log In">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<?php include "includes/admin_footer.php" ?>
