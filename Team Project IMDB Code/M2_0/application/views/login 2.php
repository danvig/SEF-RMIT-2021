<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
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
            <h1> Login</h1>
            <?php echo validation_errors('<a style=" margin: 10px 0;  background: rgba(236, 16, 8, 0.5); border-radius: 5px;">', '</a>'); ?>
            <?php 
            if(isset($_SESSION['success'])){?>

            <a style=" margin: 10px 0;  background: rgba(144,238,144, 0.5); border-radius: 5px;"><?php echo $_SESSION['success']?></a>

            <?php }if(isset($_SESSION['error'])){ ?>
            <a style=" margin: 10px 0;  background: rgba(236, 16, 8, 0.5); border-radius: 5px;"><?php echo $_SESSION['error']?></a>

            <?php }?>
            <input type="text" placeholder="username" name="username" class="txtb" id="username">
            <input type="password" placeholder="password" name="password" class="txtb" id="password">

            <input type="submit" name="submit" value="Login" class="sigin-btn">
            <a style=" margin: 10px 0;  background: rgba(236, 16, 8, 0.5); border-radius: 5px;" href="<?php echo base_url()?>index.php/Register/register">Creat Account</a>

        </form>
    </div>
</body>

</html>
