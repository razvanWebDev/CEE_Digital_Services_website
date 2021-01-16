
<!-- DELETE NEWS ARTICLE -->
<?php 
 if(isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$the_post_id}";
    $delete_query = mysqli_query($connection, $query);
 }
?>

<!-- DISPLAY NEWS ARTICLES ON ADMIN PAGE -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Fisrt Name</th>
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

        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];

            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>";
            if($user_image != "") {
                echo "<img width='100' src='../img/{$user_image}' alt='image'>";
            }
            echo "</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
            echo "<td><a href='users.php?delete={$user_id}' onClick=\"javascript:return confirm('Delete {$username}?');\">Delete</a></td>";
            echo "</tr>";
        }                 
        ?>
    </tbody>                            
</table>