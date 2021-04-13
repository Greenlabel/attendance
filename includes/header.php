<!-- This includes the session.php file.
This file contains code that starts/resumes a session.
By having it in header file, it will be included in every page, allowing session capability
to be used on every page across the website . -->
<?php
    include 'includes/session.php'
?>


<!-- Copy/Paste it from bootstrap website - starter template -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css" />
    <title>Attendance - <?php echo $title; ?></title>
</head>

<body>
    <div class="container">
        <!-- The code of nav for going to another page and see our records -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">IT Conference</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav me-auto ">

                        <!-- <ul class="navbar-nav ml-auto">
                    <li class="nav-item"> -->
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        <!-- </li> -->
                        <!-- <li class="nav-item"> -->
                        <a class="nav-link" href="viewrecords.php">view Attendees</a>
                        <!-- </li> -->

                        <!-- </ul> -->
                    </div>
                    <!-- <div class="navbar-nav ml-auto"> -->
                    <div class="navbar-nav ms-auto ">

                        <?php
                        if(!isset($_SESSION['userid'])){
                    ?>
                        <a class="nav-link active" aria-current="page" href="login.php">Login</a>

                        <?php }  else {
                        ?>

                        <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>!</span>
                            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>

                            <?php }?>
                    </div>
                </div>
            </div>

        </nav>

        <br />