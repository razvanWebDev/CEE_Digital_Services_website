
<!-- DELETE USERS -->
<?php 
 if(isset($_GET['delete'])) {
    if(isset($_SESSION['username'])){
        $the_item_id = mysqli_real_escape_string($connection, $_GET['delete']);
        $query = "DELETE FROM newsletter_signup WHERE id = {$the_item_id}";
        $delete_query = mysqli_query($connection, $query);
    }
 }

 //delete in bulk
 if(isset($_POST['checkBoxArray'])){
    if(isset($_SESSION['username'])){
        foreach($_POST['checkBoxArray'] as $valueId){
        $query = "DELETE FROM newsletter_signup WHERE id = {$valueId}";
        $delete_query = mysqli_query($connection, $query);
        }
    }
}
?>

<!-- DISPLAY RESERVATIONS ON ADMIN PAGE -->
<form id="exportForm" action="includes/export.php" method="post" enctype="multipart/form-data">					
</form>

<button form="exportForm" type="submit" id="dataExport" name="dataExport" value="Export to excel" class="btn btn-primary">Export To Excel</button>
<input form="deleteForm" type="submit" name="submit" class="btn btn-danger float-right" name="deleteSelected" value="Delete Selected" onclick="return confirm('ATENTION!!! Delete selected subscriptions?')">
<br><br>

<form id="deleteForm" action="" method="post">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
                <th>Nr</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Position</th>
                <th>Company Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 

            //pagination
            $rowCounter_per_page = 0;
            //the number of news per page
            $items_per_page = 25;
        
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            if($page == "" || $page == 1){
                $page_1 = 0;
            }else{
                $page_1 = ($page * $items_per_page) - $items_per_page;
            }

            $post_query_count = "SELECT * FROM newsletter_signup";
            $select_post_query_count = mysqli_query($connection, $post_query_count);
            $count = mysqli_num_rows($select_post_query_count);
            $count = ceil($count / $items_per_page); 
            
            $query = "SELECT * FROM newsletter_signup ORDER BY id DESC LIMIT $page_1, $items_per_page";
            $select_items = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_items)) {
                $rowCounter_per_page++;
                $totalRowCounter = $rowCounter_per_page + (($page-1) * $items_per_page);
                $id = $row['id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $position = $row['position'];
                $company_name = $row['company_name'];
                $email = $row['email'];
                
                echo "<tr>";
                ?>
                <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $id; ?>'></td>
                <?php
                echo "<td>{$totalRowCounter}</td>";
                echo "<td>{$firstname}</td>";
                echo "<td>{$lastname}</td>";
                echo "<td>{$position}</td>";
                echo "<td>{$company_name}</td>";
                echo "<td>{$email}</td>";     
                echo "<td><a href='newsletter-signup.php?source=edit_subscription&s_id={$id}'>Edit</a></td>";
                echo "<td><a href='newsletter-signup.php?delete={$id}' onClick=\"javascript:return confirm('Delete {$company_name} subscription?');\">Delete</a></td>";
                echo "</tr>";
            } 
            ?>
        </tbody>                            
    </table>
</form>

 <!-- pagination -->
<ul class="pagination pagination-sm">
    <?php 
    if($count > 1){
        for($i = 1; $i <= $count; $i++){
            if($i == $page){
                echo "<li class='page-item active'><a href='newsletter-signup.php?page={$i}'>$i</a></li>";
            }else{
                echo "<li class='page-item'><a href='newsletter-signup.php?page={$i}'>$i</a></li>";
            }
        }
    }
    ?>
</ul> 
