<?php 
        if(isset($_GET['s_id'])) {
            $the_solution_id = $_GET['s_id'];
        }
        
        $query = "SELECT * FROM submit_solutions_showcase WHERE id = $the_solution_id";
        $select_solution_by_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_solution_by_id)) {
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
        }

        if(isset($_POST['update_showcase'])) {
          
            $company_name = escape($_POST['company_name']);
            $primary_location = escape($_POST['primary_location']);
            $secondary_locations = escape($_POST['secondary_locations']);
            $name_of_ceo = escape($_POST['name_of_ceo']);
            $showcase_presenter = escape($_POST['showcase_presenter']);
            $form_submitter = escape($_POST['form_submitter']);
            $phone = escape($_POST['phone']);
            $email = escape($_POST['email']);
            $more_details = escape($_POST['more_details']);
            $other_comments = escape($_POST['other_comments']);
            $invoicing_company_name = escape($_POST['invoicing_company_name']);
            $company_address_and_tax_id = escape($_POST['company_address_and_tax_id']);
            $problem = escape($_POST['problem']);
            $solution = escape($_POST['solution']);
            $solution_justification = escape($_POST['solution_justification']);
            $solution_references = escape($_POST['solution_references']);
            
            


            $query = "UPDATE submit_solutions_showcase SET ";
            $query .= "company_name = '{$company_name}', ";
            $query .= "primary_location = '{$primary_location}', ";
            $query .= "secondary_locations = '{$secondary_locations}', ";
            $query .= "name_of_ceo = '{$name_of_ceo}', ";
            $query .= "showcase_presenter = '{$showcase_presenter}', ";
            $query .= "form_submitter = '{$form_submitter}', ";
            $query .= "phone = '{$phone}', ";
            $query .= "email = '{$email}', ";
            $query .= "more_details = '{$more_details}', ";
            $query .= "other_comments = '{$other_comments}', ";
            $query .= "invoicing_company_name = '{$invoicing_company_name}', ";
            $query .= "company_address_and_tax_id = '{$company_address_and_tax_id}', ";
            $query .= "problem = '{$problem}', ";
            $query .= "solution = '{$solution}', ";
            $query .= "solution_justification = '{$solution_justification}', ";
            $query .= "solution_references = '{$solution_references}' ";
            $query .= "WHERE id = {$the_solution_id}";

            $update_post = mysqli_query($connection, $query);

            if(!$update_post) {
                die("UP QUERY FAILED" . mysqli_error($connection));
            }

            header("Location: submit-solutions-showcase.php");
            exit();
        }
        
?>

<h2>Edit Solution Showcase</h2><br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="company_name">Company Name *</label>
        <input value="<?php echo $company_name; ?>" type="text" class="form-control" name="company_name" required>
    </div>

    <div class="form-group">
        <label for="primary_location">Primary Location *</label>
        <input type="text" value="<?php echo $primary_location ?>" class="form-control" name="primary_location" required>
    </div>

    <div class="form-group">
        <label for="secondary_locations">Secondary Locations Details *</label>
        <input value="<?php echo $secondary_locations; ?>" type="text" class="form-control" name="secondary_locations">
    </div>

    <div class="form-group">
        <label for="name_of_ceo">Name of CEO</label>
        <input value="<?php echo $name_of_ceo; ?>" type="text" class="form-control" name="name_of_ceo">
    </div>

    <div class="form-group">
        <label for="showcase_presenter">Presenter *</label>
        <input value="<?php echo $showcase_presenter; ?>" type="text" class="form-control" name="showcase_presenter" required>
    </div>

    <div class="form-group">
        <label for="form_submitter">Form Submitter *</label>
        <input value="<?php echo $form_submitter; ?>" type="text" class="form-control" name="form_submitter" required>
    </div>
    
    <div class="form-group">
        <label for="phone">Phone *</label>
        <input value="<?php echo $phone; ?>" type="text" class="form-control" name="phone" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email *</label>
        <input value="<?php echo $email; ?>" type="email" class="form-control" name="email" required>
    </div>
    
    <div class="form-group">
        <label for="more_details">More Details</label>
        <input value="<?php echo $more_details; ?>" type="text" class="form-control" name="more_details">
    </div>
    
    <div class="form-group">
        <label for="other_comments">Other Comments</label>
        <textarea type="text" class="form-control" name="other_comments"><?php echo $other_comments; ?></textarea>
    </div>
    
    <div class="form-group">
        <label for="invoicing_company_name">Invoicing Company Name *</label>
        <input value="<?php echo $invoicing_company_name; ?>" type="text" class="form-control" name="invoicing_company_name" required>
    </div>

    <div class="form-group">
        <label for="company_address_and_tax_id">Company address and Tax ID *</label>
        <input value="<?php echo $company_address_and_tax_id; ?>" type="text" class="form-control" name="company_address_and_tax_id" required>
    </div>
    
    <div class="form-group">
        <label for="problem">Problem</label>
        <textarea type="text" class="form-control" name="problem"><?php echo $problem; ?></textarea>
    </div>
    
    <div class="form-group">
        <label for="solution">Solution</label>
        <textarea type="text" class="form-control" name="solution"><?php echo $solution; ?></textarea>
    </div>
    
    <div class="form-group">
        <label for="solution_justification">Solution Justification</label>
        <textarea type="text" class="form-control" name="solution_justification"><?php echo $solution_justification; ?></textarea>
    </div>


    <div class="form-group">
        <label for="solution_references">Solution References</label>
        <textarea class="form-control" name="solution_references"><?php echo $solution_references; ?></textarea>
    </div>

    <div class="form-group">
        <input onclick="return confirm('Update solution showcase?')" class="btn btn-primary" type="submit" name="update_showcase" value="Update">
    </div>
</form>