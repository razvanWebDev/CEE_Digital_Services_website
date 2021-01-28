
<!-- DELETE USERS -->
<?php 
 if(isset($_GET['delete'])) {
    if(isset($_SESSION['username'])){
        $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
        $query = "DELETE FROM submit_solutions_showcase WHERE id = {$the_user_id}";
        $delete_query = mysqli_query($connection, $query);
    }
 }

 //delete in bulk
 if(isset($_POST['checkBoxArray'])){
    foreach($_POST['checkBoxArray'] as $valueId){
       $query = "DELETE FROM submit_solutions_showcase WHERE id = {$valueId}";
       $delete_query = mysqli_query($connection, $query);
    }
}
?>

<!-- DISPLAY RESERVATIONS ON ADMIN PAGE -->
<form id="exportForm" action="includes/export.php" method="post" enctype="multipart/form-data">					
</form>

<button form="exportForm" type="submit" id="dataExport" name="dataExport" value="Export to excel" class="btn btn-primary">Export To Excel</button>
<input form="deleteForm" type="submit" name="submit" class="btn btn-danger float-right" name="deleteSelected" value="Delete Selected" onclick="return confirm('ATENTION!!! Delete selected ticket reservations?')">
<br><br>

<form id="deleteForm" action="" method="post">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
                <th>Nr</th>
                <th>Company Name</th>
                <th>Primary Location</th>
                <th>Secondary Locations</th>
                <th>Name of CEO</th>
                <th>Showcase Presenter</th>
                <th>Form Submitter</th>
                <th>Phone</th>
                <th>Email</th>
                <th>More Details</th>
                <th>Other Comments</th>
                <th>Invoicing Company Name</th>
                <th>Company address and Tax ID</th>
                <th>Problem</th>
                <th>Solution</th>
                <th>Solution Justification</th>
                <th>Solution References</th>
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

            $post_query_count = "SELECT * FROM submit_solutions_showcase";
            $select_post_query_count = mysqli_query($connection, $post_query_count);
            $count = mysqli_num_rows($select_post_query_count);
            $count = ceil($count / $items_per_page); 
            
            $query = "SELECT * FROM submit_solutions_showcase ORDER BY id DESC LIMIT $page_1, $items_per_page";
            $select_users = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_users)) {
                $rowCounter_per_page++;
                $totalRowCounter = $rowCounter_per_page + (($page-1) * $items_per_page);
                $id = $row['id'];
                $company_name = $row['company_name'];
                $primary_location = $row['primary_location'];
                $secondary_locations = $row['secondary_locations'];
                $name_of_ceo = $row['name_of_ceo'];
                $showcase_presenter = $row['showcase_presenter'];
                $form_submitter = $row['form_submitter'];
                $phone = $row['phone'];
                $email = $row['email'];
                $more_details = $row['more_details'];
                $other_comments = $row['other_comments'];
                $invoicing_company_name = $row['invoicing_company_name'];
                $company_address_and_tax_id = $row['company_address_and_tax_id'];
                $problem = $row['problem'];
                $solution = $row['solution'];
                $solution_justification = $row['solution_justification'];
                $solution_references = $row['solution_references'];

                echo "<tr>";
                ?>
                <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $id; ?>'></td>
                <?php
                echo "<td>{$totalRowCounter}</td>";
                echo "<td>{$company_name}</td>";
                echo "<td>{$primary_location}</td>";
                echo "<td>{$secondary_locations}</td>";
                echo "<td>{$name_of_ceo}</td>";
                echo "<td>{$showcase_presenter}</td>";
                echo "<td>{$form_submitter}</td>";
                echo "<td>{$phone}</td>";
                echo "<td>{$email}</td>";
                echo "<td>{$more_details}</td>";
                echo "<td>{$other_comments}</td>";
                echo "<td>{$invoicing_company_name}</td>";
                echo "<td>{$company_address_and_tax_id}</td>";
                echo "<td>{$problem}</td>";
                echo "<td>{$solution}</td>";
                echo "<td>{$solution_justification}</td>";
                echo "<td>{$solution_references}</td>";
            
                echo "<td><a href='submit-solutions-showcase.php?source=edit_solutions_showcase&s_id={$id}'>Edit</a></td>";
                echo "<td><a href='submit-solutions-showcase.php?delete={$id}' onClick=\"javascript:return confirm('Delete {$company_name} solution showcase?');\">Delete</a></td>";
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
                echo "<li class='page-item active'><a href='ticket-reservations.php?page={$i}'>$i</a></li>";
            }else{
                echo "<li class='page-item'><a href='ticket-reservations.php?page={$i}'>$i</a></li>";
            }
        }
    }
    ?>
</ul> 
