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
<div>

    <body>
        <div class="sigin-form">
            <form action="" method="post">
                <?php 
            if(isset($_SESSION['success'])){?>
                <?php if (isset($_SESSION['username'])){?>
                <div id="body">
                    <div id="head">
                        <h1> HOME PAGE</h1>
                        <div>Hello,<?php echo $_SESSION['username'];?></div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div id='logout'>
                                <input type='submit' name='Logout' value='Logout'>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if(!empty ($fetch_data)){
                          foreach($fetch_data ->result_array() as $row){ 
                            ?>
                <div id="body1">
                    <div id="shareview">
                        <div id="mc">
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
                            <?php $list = $this->Auth_model->dislist($row['movie_id']); 
                              
                        foreach($list ->result_array() as $row){
                        ?>

                            <table id="movie">
                                <tr>
                                    <th>Character ID</th>
                                    <th>Character name</th>
                                    <th>Birthday</th>
                                    <th>History</th>

                                <tr>
                                    <td><?php echo $row['charaxter_id']; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['birthdate']; ?></td>
                                    <td><?php echo $row['bio']; ?></td>

                                </tr>
                            </table>



                            <?php } ?>
                        </div>
                        <div id="form">
                            <form action="" method="post">
                                <input value="<?php echo $row['movie_id'];?>" type='hidden' name='movie_id' style=" display: none; " />
                                <textarea name="body" placeholder="Share you view..."></textarea>
                                <input type="submit" value="Submit" id="submit1">
                            </form>
                        </div>
                    </div>
                    <hr style="height:1px;border:none;border-top:1px solid #555555;" />

                    <?php $comments = $this->Auth_model->disfeedback($row['movie_id']); ?>
                    <?php    foreach($comments ->result_array() as $row){ ?>
                    <div id="form">
                        <div id="feedback">
                            <div id="unt">
                                <h4 id="un"><?php echo $row['username'];?></h4>

                                <h4 id="t"></h4>
                            </div>
                            <hr style="height:1px;border:none;border-top:1px solid #555555;" />

                            <div id="c">
                                <h5><?php echo $row['body'];?></h5>
                            </div>
                            <form method="post">


                                <div id="r">

                                    <input type="submit" name="reply" value="submit">
                                </div>
                                <input type='hidden' value="<?php echo $row['post_id'] ?>" name="post_id" placeholder="Betatest..">
                                <input type='hidden' value="<?php echo $row['movie_id'] ?>" name="movie_id" placeholder="Betatest..">
                                <input type="text" id="betatest" name="body1" placeholder="Betatest..">
                            </form>
                            <div id="c2">
                                <?php $replay = $this->Auth_model->disreplay($row['post_id']); ?>
                                <?php    foreach($replay ->result_array() as $row){ ?>
                                <h5> <?php echo $row['username'];?>:<?php echo $row['body'];?></h5>
                                <?php } ?>
                            </div>

                        </div>

                    </div>
                    <?php }
                 ?>
                </div>
                <?php }
                
                        }else{ echo"no records found";} ?>


                <?php } ?>

                <?php if (isset($_SESSION['admin_id'])){?>
                <div id="body">
                    <div id="head">
                        <h1> HOME PAGE</h1>
                        <div>Hello,<?php echo $_SESSION['admin_id'];?></div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div id='logout'>
                                <input type='submit' name='Logout' value='Logout'>
                            </div>
                        </form>

                    </div>
                </div>
                <div id="form">

                    <form method="post" action="" enctype="multipart/form-data" id="form6">
                        <h3>Insert a new movie</h3>

                        <input type="text" id="mid" name="movie_id" placeholder="Movie ID...">

                        <input type="text" id="cid" name="can_id" placeholder="Can ID...">

                        <input type="submit" name="addmovie" value="Insert">
                    </form>

                    <form method="post" action="" id="form7">

                        <h3>Require and reject</h3>
                        <input type="text" name="pco_name" placeholder="Pco name..">

                        <input type="text" name="require_id" placeholder="Require id..">
                        <input type='submit' name='Require' value='Require'>

                    </form>

                    <div id="form9">
                        <form method="post">
                            <input type="text" name="movieid" placeholder="Movie id...">
                            <input type="text" name="moviename" placeholder="Movie name...">

                            <input type="text" name="season" placeholder="Season...">

                            <input type="text" name="genre" placeholder="Genre...">

                            <input type="text" name="pconame" placeholder="Pconame...">

                            <input type='submit' name='edit' value='edit'>
                        </form>



                    </div>
                    <div id="list1">
                        <div id="mc">
                            <?php if(!empty ($fetch_data)){
                          foreach($fetch_data ->result_array() as $row){ 
                            ?>
                            <div id="mc">
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
                                <?php $list = $this->Auth_model->dislist($row['movie_id']); 
                              
                        foreach($list ->result_array() as $row){
                        ?>

                                <table id="movie">
                                    <tr>
                                        <th>Character ID</th>
                                        <th>Character name</th>
                                        <th>Birthday</th>
                                        <th>History</th>

                                    <tr>
                                        <td><?php echo $row['charaxter_id']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['birthdate']; ?></td>
                                        <td><?php echo $row['bio']; ?></td>

                                    </tr>
                                </table>



                                <?php } ?>
                            </div>

                            <?php }
                        }else{ echo"no records found";} ?>
                        </div>
                    </div>

                    <div id="list2">
                        <div id="mc">
                            <?php if(!empty ($pco_data)){
                          foreach($pco_data ->result_array() as $row){ 
                            ?>
                            <div id="mc">
                                <table id="movie">
                                    <tr>
                                        <th>Pco Name</th>
                                        <th>Organisation</th>
                                        <th>Phone Number</th>
                                        <th>Require Id</th>
                                    <tr>
                                        <td><?php echo $row['pco_name']; ?></td>
                                        <td><?php echo $row['organisation']; ?></td>
                                        <td><?php echo $row['phone_number']; ?></td>
                                        <td><?php echo $row['require_id']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <?php }
                        }else{ echo"no records found";} ?>

                        </div>
                    </div>
                </div>
                <?php } ?>


                <?php if (isset($_SESSION['pco_name'])){?>
                <div id="body">
                    <div id="head">
                        <h1> HOME PAGE</h1>
                        <div>Hello,<?php echo $_SESSION['pco_name'];?></div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div id='logout'>
                                <input type='submit' name='Logout' value='Logout'>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="body2">
                    <div id="form">

                        <form method="post" action="" enctype="multipart/form-data" id="form1">
                            <h3>Insert a new movie</h3>
                            

                            <input type="text" id="mname" name="moviename" placeholder="Movie name...">

                            <input type="text" id="season" name="season" placeholder="Season...">

                            <input type="text" id="genre" name="genre" placeholder="Genre...">

                            <input type="text" id="pname" name="pconame" placeholder="Pconame...">

                            <input type="submit" name="makemovie" value="Insert">

                        </form>

                        <form method="post" action="" id="form2">

                            <h3>Insert character</h3>
                            <input type="text" name="fullname" placeholder=" full name..">

                            <input type="text" name="birthdate" placeholder=" birthday..">

                            <input type="text" name="bio" placeholder=" history..">

                            <input type='submit' name='character' value='Submit'>
                        </form>

                        <div id="form3">
                            <?php if(!empty ($character_data)){
                
                          foreach($character_data ->result_array() as $row){ 
                            ?>
                            <h4>ID <?php echo $row['charaxter_id']; ?>:<?php echo $row['fullname']; ?></h4>
                            <?php } ?>
                            <?php  }else{ echo"no records found";} ?>
                        </div>
                    </div>
                    <div id="form4">
                        <form action="" method="post">
                            <h3>Insert characters to movie</h3>
                            <input type="text" id="characterid" name="characterid" placeholder="Character id..">
                            <input type="text" id="movieid" name="movieid" placeholder="Movie id..">
                            <input type='submit' name='list' value='Submit' id='submit1'>
                        </form>
                    </div>
                    <div id="form5">

                        <hr id="hr" style="height:1px;border:none;border-top:1px solid #555555;" />
                        <div id="mc">
                            <?php if(!empty ($fetch_data)){
                
                          foreach($fetch_data ->result_array() as $row){ 
                            ?>
                            <div id="mc">
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
                                <?php $list = $this->Auth_model->dislist($row['movie_id']); 
                              
                        foreach($list ->result_array() as $row){
                        ?>

                                <table id="movie">
                                    <tr>
                                        <th>Character ID</th>
                                        <th>Character name</th>
                                        <th>Birthday</th>
                                        <th>History</th>

                                    <tr>
                                        <td><?php echo $row['charaxter_id']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['birthdate']; ?></td>
                                        <td><?php echo $row['bio']; ?></td>

                                    </tr>
                                </table>

                                <?php } ?>
                            </div>
                            <?php } ?>

                            <?php  }else{ echo"no records found";} ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
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

    #mc {
        margin: 0 auto;

        width: 80%;


        margin-bottom: 30px;

    }

    #mc1 {

        margin: 0 auto;
        width: 80%;
        border-radius: 25px;
        background-color: #f2f2f2;
        background-color: #f2f2f2;
        margin-bottom: 30px;

    }

    #body {
        text-align: center;
        width: 90%;
        margin: 0 auto;
        background-color: white;
        border-radius: 25px;
        position: relative;
        padding: 30px;
        margin-bottom: 20px;
    }

    #body1 {

        text-align: center;
        width: 90%;
        margin: 0 auto;
        background-color: white;
        border-radius: 25px;
        position: relative;
        padding: 30px;
        margin-bottom: 20px;
    }

    #body2 {

        text-align: center;
        width: 90%;
        margin: 0 auto;
        border-radius: 25px;
        position: relative;
        padding: 30px;
        margin-bottom: 20px;
    }

    body {
        text-align: center;
        background: linear-gradient(to bottom, #000044, #666699);
        background-repeat: no-repeat;
        background-position: left top;
        background-attachment: fixed;

    }

    input[type=text],
    select {

        width: 50%;
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

    #submit1 {
        width: 50%;
    }

    #submit3 {
        width: 20%;
    }

    #form {


        margin: 0 auto;

        padding: 20px;
        margin-bottom: 30px;
        font-family: "Lucida Console", "Courier New", monospace;
    }

    #form1 {
        float: left;
        width: 28%;
        margin: 0 auto;
        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 30px;
        font-family: "Lucida Console", "Courier New", monospace;
        margin: 8px 0;
        margin-right: 10px;
    }

    #form2 {
        float: left;
        width: 28%;
        margin: 0 auto;
        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 30px;
        font-family: "Lucida Console", "Courier New", monospace;
        margin: 8px 0;
        margin-right: 10px;
    }

    #form3 {
        float: left;
        width: 28%;
        margin: 0 auto;
        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 30px;
        font-family: "Lucida Console", "Courier New", monospace;
        margin: 8px 0;

    }

    #form4 {
        float: left;
        width: 80%;
        margin-top: 10px;
        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 30px;
        font-family: "Lucida Console", "Courier New", monospace;
        margin-left: 140px;

    }

    #form5 {
        float: left;
        width: 80%;
        margin-top: 10px;
        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 30px;
        font-family: "Lucida Console", "Courier New", monospace;
        margin-left: 140px;
    }

    #form6 {

        float: left;
        width: 45%;
        margin: 0 auto;
        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 30px;
        font-family: "Lucida Console", "Courier New", monospace;
        margin-right: 20px;
        margin-left: 20px;

    }

    #form7 {
        margin-left: 50px;
        float: left;
        width: 45%;
        margin: 0 auto;
        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 30px;
        font-family: "Lucida Console", "Courier New", monospace;


    }

    #form8 {
        float: left;
        width: 45%;
        margin: 0 auto;
        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 30px;
        font-family: "Lucida Console", "Courier New", monospace;
        margin-right: 20px;
        margin-left: 20px;
    }

    #form9 {

        float: right;
        width: 75%;
        margin: 0 auto;
        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 30px;
        margin-right: 150px;
        font-family: "Lucida Console", "Courier New", monospace;


    }

    #list1 {
        float: left;
        width: 45%;
        margin: 0 auto;
        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 30px;
        font-family: "Lucida Console", "Courier New", monospace;
        margin-right: 20px;
        margin-left: 20px;

    }

    #list2 {
        float: left;
        width: 45%;
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
        margin-top: 20px;

    }

    #feedback {


        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        font-family: "Lucida Console", "Courier New", monospace;

    }

    #shareview {


        border-radius: 25px;
        background-color: #f2f2f2;
        padding: 20px;
        font-family: "Lucida Console", "Courier New", monospace;

    }

    #betatest {
        float: left;
        word-wrap: break-all;
        word-break: break-all;
        overflow: hidden;
        background-color: white;
        border-radius: 25px;
        width: 50%;
        text-align: left;
        padding: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

</style>

</html>
