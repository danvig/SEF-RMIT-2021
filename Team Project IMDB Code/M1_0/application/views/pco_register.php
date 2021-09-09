<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link id='stylecss' type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/style.css">
    <title>Assignment 2</title>
</head>

<body>
    <div class="col-lg5 col-lgof-offset-2">
        <div class="form-group">

        </div>

    </div>
    <div class="sigin-form">
        <form action="" method="post">
            <h1> pco register</h1>
            <?php echo validation_errors('<a style=" margin: 10px 0;  background: rgba(236, 16, 8, 0.5); border-radius: 5px;">', '</a>'); ?>
            <?php 
            if(isset($_SESSION['success'])){?>

            <a style=" margin: 10px 0;  background: rgba(144,238,144, 0.5); border-radius: 5px;"><?php echo $_SESSION['success']?></a>

            <?php } ?>
            <input type="text" placeholder="pco_name" name="pco_name" class="txtb" id="pco_name">
            <input type="text" placeholder="organisation" name="organisation" class="txtb" id="organisation">
            <input type="text" placeholder="phone_number" name="phone_number" class="txtb" id="phone_number">
            <input type="password" placeholder="password" name="password" class="txtb" id="password">

            <input type="submit" name="submit" value="Creat Account" class="sigin-btn">

            <a style=" margin: 10px 0;  background: rgba(144,238,144, 0.5); border-radius: 5px;" href="<?php echo base_url()?>index.php/Pco_login/pco_login">Have Account</a>

        </form>
    </div>
</body>

</html>
