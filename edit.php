<!-- copy paste the content of index.php cause it will look like that
We also make the changes for edit page -->
<?php
$title = 'Edit Record';                     
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

$results = $crud->getSpecialties();

if(!isset($_GET['id'])){
    // echo 'error';
    include 'includes/errormessage.php';
    // or navigate to a viewrecords.php
     header("Location: viewrecords.php");
    
}else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);


?>



<!-- bootstrap class text align -->
<h1 class="text-center">Edit Record</h1>
<!-- We now add the method get to form  or post-->
<form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>" />
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstname" value="<?php echo $attendee['firstname']?>"
            name="firstname" placeholder="Enter First Name">

    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastname" value="<?php echo $attendee['lastname']?>" name="lastname"
            placeholder="Enter Last Name">

    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" id="dob" value="<?php echo $attendee['dateofbirth']?>" name="dob"
            placeholder="Enter Date of Birth">

    </div>
    <div class="form-group">
        <label for="specialty" class="form-label">Area of Expertise</label>
        <select class="form-control" id="specialty" name="specialty">
            <!-- <option value="1">Database Admin</option>
            <option>Software Developer</option>
            <option>Web Administrator</option>
            <option>Other</option> -->

            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $r['specialty_id']; ?>" <?php if($r['specialty_id'] == $attendee['specialty_id'])
            echo 'selected' ?>>
                <?php echo $r['name']; ?>
            </option>
            <?php } ?>

        </select>

    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" value="<?php echo $attendee['emailaddress']?>" name="email"
            placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="phone">Contact Number</label>
        <input type="text" class="form-control" id="phone" value="<?php echo $attendee['contactnumber']?>" name="phone"
            placeholder="Enter phone number">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-success" name="submit" type="submit">Save Changes</button>
        <a href="viewrecords.php" class="btn btn-outline-primary">Back to List</a>

    </div>


</form>
<?php } ?>
<?php
echo '<hr/>';
require_once 'includes/footer.php';
?>