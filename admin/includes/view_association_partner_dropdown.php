<!-- DELETE ITEMS -->
<?php 
if(isset($_GET['delete'])) {
    $delete_id = mysqli_real_escape_string($connection, $_GET['delete']);
    deleteItem("agendas_page_content", $delete_id);
}
 deleteBulk("association_partner_dropdown");
?>

<!-- DISPLAY ITEMS ON ADMIN PAGE -->
<form action="" method="post">
<a class="btn btn-primary" href="association_partner_dropdown.php?source=add_association_partner_dropdown">Add new value</a>
<input type="submit" name="submit" class="btn btn-danger float-right" name="deleteSelected" value="Delete Selected" onclick="return confirm('Delete selected?')">
<br><br>

<table class="table table-responsive table-bordered table-hover text-center">
    <thead>
        <tr>
            <th class="text-center"><input type="checkbox" id="selectAllBoxes"></th>
            <th class="text-center">Order Position</th>
            <th class="text-center">Dropdown Text</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM association_partner_dropdown ORDER BY position";
        $select_all_posts_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
            $id = $row['id'];
            $position = $row['position'];
            $dropdown_value = $row['dropdown_value'];

            echo "<tr>";
            ?>
            <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $id; ?>'></td>
            <?php
            echo "<td>{$position}</td>";
            echo "<td>{$dropdown_value}</td>";
            echo "<td><a href='association_partner_dropdown.php?source=edit_association_partner_dropdown&id={$id}'>Edit</a></td>";
            echo "<td><a href='association_partner_dropdown.php?delete={$id}' onClick=\"javascript:return confirm('Delete?');\">Delete</a></td>";
            echo "</tr>";
        }         
        ?>
    </tbody>            
</table>
</form>
 
