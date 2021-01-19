<?php 

    if(isset($_POST['create_post'])) {
        $username = $_POST['username'];

       // $post_date = date('d-m-y');

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];

        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];

        $user_password = $_POST['user_password'];
        $user_repeat_password = $_POST['user_repeat_password'];

        if(strlen($user_password)< 8){
            die("The password must have at least 8 characters");
        }

        if($user_password != $user_repeat_password) {
            die("Passwords don't match");
        }

        move_uploaded_file($user_image_temp, "../img/Users/$user_image");

        $query = "INSERT INTO users(username, user_firstname, user_lastname, user_email, user_password, user_image)";
        $query .= "VALUES('{$username}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_password}', '{$user_image}')";
        
        $create_post_query = mysqli_query($connection, $query);

        if(!$create_post_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        echo "<p class='bg-success'>User created: " . "<a href='users.php'>View Users</a></p>";
    }

?>

<h2>Add user</h2><br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username *</label>
        <input type="text" class="form-control" name="username" required>
    </div>

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
        <input onclick="return confirm('Create User?')" class="btn btn-primary" type="submit" name="create_post" value="Add User"  >
    </div>
</form>
