<?php 
    require_once 'db/conn.php';

    // Get values from post operation
    if(isset($_POST['submit'])){
        // on crud file we see at the bottom we initialized an object, 
        // so if we follow the flow, we can use it as it is.
        // extract values from $_POST array
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];
    

    //  Call crud functio
        $result = $crud->editAttendee($id,$fname, $lname, $dob, $email, $contact, $specialty);

    // Redirect to index.php
        if($result){
            header("Location:viewrecords.php");
        }
        else{
            // echo 'error';
            include 'includes/errormessage.php';
        }
    }

    else {
        // echo 'error';
        include 'includes/errormessage.php';

    }

?>