<?php 
    $username_exists = "";

    if(isset($_POST['add_user'])) {
        $username = escape($_POST['username']);

        $user_firstname = escape($_POST['user_firstname']);
        $user_lastname = escape($_POST['user_lastname']);
        $user_email = escape($_POST['user_email']);

        $user_image = escape($_FILES['user_image']['name']);
        $user_image_temp = $_FILES['user_image']['tmp_name'];

        $user_password = escape($_POST['user_password']);
        $user_repeat_password = escape($_POST['user_repeat_password']);

        //check password
        if(strlen($user_password)< 8){
            die("<p class='alert alert-danger'>The password must have at least 8 characters</p>");
        }

        if($user_password != $user_repeat_password) {
            die("<p class='alert alert-danger'>Passwords don't match</p>");
        }

        //hash password
        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

        //check if username is unique
        $query = "SELECT * FROM users  WHERE username ='$username'";
        $check_username = mysqli_query($connection, $query);
        if(mysqli_num_rows($check_username)>=1){
            die("<p class='alert alert-danger'>Username already exists</p>");
        }

        //add new user to db
        move_uploaded_file($user_image_temp, "../img/Users/$user_image");

        

        $query = "INSERT INTO users(username, user_firstname, user_lastname, user_email, user_password, user_image)";
        $query .= "VALUES('{$username}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_password}', '{$user_image}')";
        
        $create_post_query = mysqli_query($connection, $query);

        if(!$create_post_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        echo "<p class='alert alert-success'>User created: " . "<a href='users.php'>View Users</a> or <a href='users.php?source=add_user'>Add another user</a></p>";
        exit();
    }

?>

<h2>Add user</h2><br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username *</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <p class=" alert-danger"><?php echo $username_exists; ?> </p>

    <div class="form-group">
        <label for="user_firstname">First Name *</label>
        <input type="text" class="form-control" name="user_firstname" required></input>
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name *</label>
        <input type="text" class="form-control" name="user_lastname" required>
    </div>

    <div class="form-group">
        <label for="user_email">Email *</label>
        <input type="email" class="form-control" name="user_email" required>
    </div>

    <div class="form-group">
        <label for="user_image">Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for="user_password">Password * (8 characters min)</label>
        <input type="password" class="form-control" name="user_password" required>
    </div>

    <div class="form-group">
        <label for="user_repeat_password">Repeat Password *</label>
        <input type="password" class="form-control" name="user_repeat_password" required>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Create User?')" class="btn btn-primary" type="submit" name="add_user" value="Add User"  >
    </div>
</form>
