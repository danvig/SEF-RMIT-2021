<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Assignment 2</title>
</head>
<div id="body">

    <body>
        <div class="col-lg5 col-lgof-offset-2">
            <div class="form-group">

            </div>
        </div>

        <div class="sigin-form">
            <form action="" method="post">
                <div id="head">
                    <h1> HOME PAGE</h1>
                    <?php 
            if(isset($_SESSION['success'])){?>

                    <?php if (isset($_SESSION['username'])){?>
                    <div>Hello,<?php echo $_SESSION['username'];?></div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div id="logout">
                            <input type="submit" name="Logout" value="Logout">
                        </div>
                    </form>


                    <?php } ?>

                    <?php if (isset($_SESSION['admin_id'])){?>
                    <div>Hello,<?php echo $_SESSION['admin_id'];?></div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div id="logout">
                            <input type="submit" name="Logout" value="Logout">
                        </div>
                    </form>

                </div>
                <div id="form">
                    <form method="post" action="" enctype="multipart/form-data">
                        <h3>Insert a new movie</h3>

                        <input type="text" id="mid" name="movie_id" placeholder="Movie ID...">

                        <input type="text" id="cid" name="can_id" placeholder="Can ID...">

                        <input type="submit" name="addmovie" value="Insert">
                    </form>
                    <?php } ?>
                </div>
                <?php if (isset($_SESSION['pco_name'])){?>
                <div>Hello,<?php echo $_SESSION['pco_name'];?></div>
                <form method="post" action="" enctype="multipart/form-data">
                    <div id="logout">
                        <input type="submit" name="Logout" value="Logout">
                    </div>
                </form>

                <div id="form">
                    <form method="post" action="" enctype="multipart/form-data">
                        <h3>Insert a new movie</h3>

                        <input type="text" id="mname" name="moviename" placeholder="Movie name...">

                        <input type="text" id="season" name="season" placeholder="Season...">

                        <input type="text" id="genre" name="genre" placeholder="Genre...">

                        <input type="text" id="pname" name="pconame" placeholder="Pconame...">

                        <input type="submit" name="makemovie" value="Insert">
                    </form>
                    <?php } ?>
                </div>
                <?php if(!empty ($fetch_data)){
                          foreach($fetch_data ->result_array() as $row){ 
                            ?>
                <table id="movie">
                    <tr>
                        <th>Movie ID</th>
                        <th>Movie Name</th>
                        <th>Season</th>
                        <th>Genre</th>
                        <th>Can ID</th>
                        <th>Pco Name</th>
                    <tr>
                        <td><?php echo $row['movie_id']; ?></td>
                        <td><?php echo $row['moviename']; ?></td>
                        <td><?php echo $row['season']; ?></td>
                        <td><?php echo $row['genre']; ?></td>
                        <td><?php echo $row['can_id']; ?></td>
                        <td><?php echo $row['pco_name']; ?></td>
                    </tr>
                </table>
                <?php if (isset($_SESSION['username'])){?>
                <div id="form">
                    <form action="" method="post">

                        <!-- <select id="rating" name="rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              </select> -->
                        <input value="<?php echo $row['movie_id'];?>" type='hidden' name='movie_id' style=" display: none; " />
                        <textarea name="body" placeholder="Share you view..."></textarea>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <hr style="height:1px;border:none;border-top:1px solid #555555;" />

                <?php 
                    //     include_once'Feedback';
                    //    $comments = new Feedback($row['movie_id']);
                       
                    $comments = $this->Auth_model->disfeedback($row['movie_id']); 
                        
                    foreach($comments ->result_array() as $row){ ?>
                <div id="form">
                    <div id="feedback">
                        <div id="unt">
                            <h4 id="un"><?php echo $row['username'];?></h4>

                            <h4 id="t"></h4>
                        </div>
                        <hr style="height:1px;border:none;border-top:1px solid #555555;" />
                        <div id="r">
                            <input type="submit" value="beta test">
                        </div>
                        <div id="c">
                            <h5><?php echo $row['body'];?></h5>
                        </div>
                        <div id="c2">
                            <h5>beta test</h5>
                        </div>

                    </div>

                </div>
                <?php }
                 ?>
                <?php } ?>
                <?php }
                        }else{ echo"no records found";} ?>


                <?php } ?>
            </form>
        </div>

    </body>
</div>
<style>
    #movie {
        font-family: "Lucida Console", "Courier New", monospace;
        color: #555555;
        border-collapse: collapse;
        width: 70%;
        margin: 0 auto;
        margin-bottom: 20px;
        font-size: 12px;

    }

    #movie td,
    #movie th {
        border-radius: 10px;
        padding: 8px;

    }

    #movie tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #movie tr:hover {
        background-color: #ddd;
    }

    #movie th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background: linear-gradient(to bottom, #000044, #666699);
        color: white;
    }

    #body {
        text-align: center;
        width: 90%;
        margin: 0 auto;
        background-color: white;
        border-radius: 25px;
        position: relative;
        padding: 30px;
    }

    body {
        background: linear-gradient(to bottom, #000044, #666699);
        background-repeat: no-repeat;
        background-position: left top;
        background-attachment: fixed;

    }

    input[type=text],
    select {
        float: left;
        width: 48%;
        padding: 12px 20px;
        margin: 8px 0;
        margin-right: 5px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #000044;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-family: 'Pacifico', cursive;
    }

    input[type=submit]:hover {
        background: linear-gradient(to bottom, #000044, #666699);
    }

    #form {
        margin-top: 30px;
        width: 60%;
        margin: 0 auto;
        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 30px;
        font-family: "Lucida Console", "Courier New", monospace;

    }

    h3 {
        font-family: 'Permanent Marker', cursive;
        color: #555555;
    }

    #head {
        text-align: center;
        width: 70%;
        margin: 0 auto;
        background: linear-gradient(to bottom, #000044, #666699);
        border-radius: 25px;
        color: white;
        margin-bottom: 20px;
        font-family: 'Pacifico', cursive;
        padding: 10px;

    }

    #logout {
        text-align: center;
        width: 30%;
        margin: 0 auto;
        border-radius: 25px;

    }

    textarea {
        width: 100%;
        height: 75px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        font-size: 16px;
        resize: none;
    }

    #unt {
        overflow: hidden;
    }

    #hr {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    #un {
        float: left;
    }

    #t {
        float: left;

        padding-left: 40px;
    }

    #c {
        height: auto !important;
        height: 100px;
        width: 50%;
        table-layout: fixed;
        word-wrap: break-all;
        word-break: break-all;
        overflow: hidden;
        background-color: white;
        border-radius: 25px;
        text-align: left;
        padding: 10px;

    }

    #c2 {
        position: relative;
        left: 35%;
        height: auto !important;
        height: 100px;
        table-layout: fixed;
        word-wrap: break-all;
        word-break: break-all;
        overflow: hidden;
        background-color: white;
        border-radius: 25px;
        width: 50%;
        text-align: left;
        padding: 10px;
        margin-top: 20px;

    }

    #r {
        margin-right: 20px;
        float: left;
        width: 20%;
        height: 50px;

    }

</style>

</html>
