<?php 
    require_once 'db/conn.php';

if(!$_GET['id']){

    // echo 'error';
    include 'includes/errormessage.php';
    // or navigate to a viewrecords.php
    header("Location: viewrecords.php");
}else {
    // Get ID values
    $id = $_GET['id'];

    // Call delete function
    $result = $crud->deleteAttendee($id);
    // Redirect to list
    if($result){
        header("Location: viewrecords.php");
    }
    else{
        echo 'error';
    }
}

?>