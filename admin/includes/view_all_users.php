
<!-- DELETE USERS -->
<?php 
 if(isset($_GET['delete'])) {
    if(isset($_SESSION['username'])){
        $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
        $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
        $delete_query = mysqli_query($connection, $query);
    }
 
 }
?>

<!-- DISPLAY UISERS ON ADMIN PAGE -->
<a class="btn btn-primary" href="users.php?source=add_user">Add user</a> <br><br>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nr</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Image</th>  
            <th>Edit</>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection, $query);

        $rowCounter = 0;

        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $rowCounter++;

            echo "<tr>";
            echo "<td>{$rowCounter}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>";
            if($user_image != "") {
                echo "<img width='100' src='../img/{$user_image}' alt='image'>";
            }
            echo "</td>";
            echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
            echo "<td><a href='users.php?delete={$user_id}' onClick=\"javascript:return confirm('Delete {$username}?');\">Delete</a></td>";
            echo "</tr>";
        } 
        ?>
    </tbody>                            
</table>