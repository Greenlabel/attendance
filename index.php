<?php
$title = 'Index';
require_once 'includes/header.php';
require_once 'db/conn.php';

$results = $crud->getSpecialties();

?>
<!-- 
    - First Name
    - Last Name
    - Date of Birth (Use DatePicker)
    - Specialty (Database Admin, Soft Developer, Web Administrator, Other)
    - Email Address
    -Contact Number
-->


<!-- bootstrap class text align -->
<h1 class="text-center">Registration for IT Conference</h1>
<!-- We now add the method get to form  or post-->
<form method="post" action="success.php">
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">

    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">

    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth">

    </div>
    <div class="form-group">
        <label for="specialty" class="form-label">Area of Expertise</label>
        <select class="form-control" id="specialty" name="specialty">
            <!-- <option value="1">Database Admin</option>
            <option>Software Developer</option>
            <option>Web Administrator</option>
            <option>Other</option> -->

            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $r['specialty_id']; ?>"><?php echo $r['name']; ?> </option>
            <?php } ?>

        </select>

    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="phone">Contact Number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-secondary">Reset</button>


</form>

<?php
echo '<hr/>';
require_once 'includes/footer.php';
?>