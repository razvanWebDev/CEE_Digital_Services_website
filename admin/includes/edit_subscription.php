<?php 
        if(isset($_GET['s_id'])) {
            $the_item_id = $_GET['s_id'];
        }
        
        $query = "SELECT * FROM newsletter_signup WHERE id = $the_item_id";
        $select_item_by_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_item_by_id)) {
            $id = $row['id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $position = $row['position'];
            $company_name = $row['company_name'];
            $email = $row['email'];
        }

        if(isset($_POST['update_subscription'])) {
          
            $firstname = escape($_POST['firstname']);
            $lastname = escape($_POST['lastname']);
            $position = escape($_POST['position']);
            $company_name = escape($_POST['company_name']);
            $email = escape($_POST['email']); 


            $query = "UPDATE newsletter_signup SET ";
            $query .= "firstname = '{$firstname}', ";
            $query .= "lastname = '{$lastname}', ";
            $query .= "position = '{$position}', ";
            $query .= "company_name = '{$company_name}', ";
            $query .= "email = '{$email}' ";
            $query .= "WHERE id = {$the_item_id}";

            $update_post = mysqli_query($connection, $query);

            if(!$update_post) {
                die("QUERY FAILED" . mysqli_error($connection));
            }

            header("Location: newsletter-signup.php");
            exit();
        }
        
?>

<h2>Edit Subscription</h2><br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">First Name *</label>
        <input value="<?php echo $firstname; ?>" type="text" class="form-control" name="firstname" required>
    </div>

    <div class="form-group">
        <label for="lastname">Last Name *</label>
        <input type="text" value="<?php echo $lastname ?>" class="form-control" name="lastname" required>
    </div>

    <div class="form-group">
        <label for="position">Position *</label>
        <input value="<?php echo $position; ?>" type="text" class="form-control" name="position">
    </div>

    <div class="form-group">
        <label for="company_name">Company Name</label>
        <input value="<?php echo $company_name; ?>" type="text" class="form-control" name="company_name">
    </div>

    <div class="form-group">
        <label for="email">Email *</label>
        <input value="<?php echo $email; ?>" type="email" class="form-control" name="email" required>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update subscription?')" class="btn btn-primary" type="submit" name="update_subscription" value="Update">
    </div>
</form>