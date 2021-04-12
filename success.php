<?php
$title = 'Success';
require_once 'includes/header.php';
require_once 'db/conn.php';

if(isset($_POST['submit'])){
    // on crud file we see at the bottom we initialized an object, 
    // so if we follow the flow, we can use it as it is.
    // extract values from $_POST array
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];
    // Call function to insert and track if success or not
    $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);

    if($isSuccess){
    //    echo "<h1 class='text-center text-success'>You Have Been Registered!</h1>";
    include 'includes/successmessage.php';
    }
    else{
    //    echo "<h1 class='text-center text-danger'>There was an error in processing!</h1>";
        include 'includes/errormessage.php';
}

}

?>

<!-- card component from bootstrap -->
<!-- The code below prints the values using get method 

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php //echo $_GET['firstname'] . ' ' . $_GET['lastname']; 
                                ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['specialty']; 
                                                    ?></h6>
        <p class="card-text">Date of Birth: <?php //echo $_GET['dob']; 
                                            ?></p>
        <p class="card-text">Email Address: <?php //echo $_GET['email']; 
                                            ?></p>
        <p class="card-text">Contact Number: <?php //echo $_GET['phone']; 
                                                ?></p>

    </div>
</div>
-->
<!-- Now the same code but with post method -->
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty']; ?></h6>
        <p class="card-text">Date of Birth: <?php echo $_POST['dob']; ?></p>
        <p class="card-text">Email Address: <?php echo $_POST['email']; ?></p>
        <p class="card-text">Contact Number: <?php echo $_POST['phone']; ?></p>

    </div>
</div>
<!-- we want all the details of the registration -->
<?php
// here we use the name we put into our form and its value 
// echo $_GET['firstname'];
// echo $_GET['lastname'];
// echo $_GET['dob'];
// echo $_GET['specialty'];
// echo $_GET['email'];
// echo $_GET['phone'];



?>

<?php
echo '<hr/>';
require_once 'includes/footer.php';
?>