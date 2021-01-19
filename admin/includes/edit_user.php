<?php 
        if(isset($_GET['u_id'])) {
            $the_user_id = $_GET['u_id'];
        }
        
        $query = "SELECT * FROM users WHERE user_id = $the_user_id";
        $select_users_by_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users_by_id)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
        }

        if(isset($_POST['edit_user'])) {
          
            $username = escape($_POST['username']);
            $user_password = escape($_POST['user_password']);
            $user_repeat_password = escape($_POST['user_repeat_password']);
            $user_firstname = escape($_POST['user_firstname']);
            $user_lastname = escape($_POST['user_lastname']);
            $user_email = escape($_POST['user_email']);

            $user_image = escape($_FILES['user_image']['name']);
            $user_image_temp = $_FILES['user_image']['tmp_name'];

            if($user_password != "") {
                if(strlen($user_password)< 8){
                    die("The password must have at least 8 characters");
                }
        
                if($user_password != $user_repeat_password) {
                    die("Passwords don't match");
                }

            }

            move_uploaded_file($user_image_temp, "../img/Users/$user_image");

            $query = "UPDATE users SET ";
            $query .= "username = '{$username}', ";
            $query .= "user_password = '{$user_password}', ";
            $query .= "user_firstname = '{$user_firstname}', ";
            $query .= "user_lastname = '{$user_lastname}', ";
            $query .= "user_email = '{$user_email}', ";
            $query .= "user_image = '{$user_image}' ";
            $query .= "WHERE user_id = {$the_user_id}";

            $update_user = mysqli_query($connection, $query);

            if(!$update_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }

            echo "<p class='bg-success'>User updated. <a href='users.php'>View all users</a></p>";
        }
?>

<h2>Edit user</h2><br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username *</label>
        <input value=" <?php echo $username; ?>" type="text" class="form-control" name="username" required>
    </div>

    <div class="form-group">
        <label for="user_firstname">First Name *</label>
        <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname" required></input>
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name *</label>
        <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname" required>
    </div>

    <div class="form-group">
        <label for="user_email">Email *</label>
        <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email" required>
    </div>

    <div class="form-group">
        <img src="../img/Users/<?php echo $user_image?>" alt="" width="150px">
    </div>

    <div class="form-group">
        <label for="user_image">Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for="user_password"> New Password (Leave empty if You don't want to change it)</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <label for="user_repeat_password">Repeat Password</label>
        <input type="password" class="form-control" name="user_repeat_password">
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update user?')" class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </div>
</form>