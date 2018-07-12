<?php
require_once('../config.php');
$conn = mysqli_connect(host, user,pass, db);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit-page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anonymous+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/slate/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div style="width:100%;height:100%;margin:0;padding:0;">
        <div style="/*position:fixed;*/width:100%;height:60px;background-color:rgb(47,19,69);padding:0;margin:0;top:0;left:0;border-bottom-color:rgb(0,0,0);border-bottom-style:dashed;">
            <div><a href="../index.php"><i class="fa fa-film" style="padding:0;color:rgb(255,255,255);font-size:40px;margin-top:10px;margin-left:15px;"></i></a><i class="fa fa-tv" style="padding:0;color:rgb(255,255,255);font-size:40px;margin:0;margin-left:15px;"></i>
                <p
                    class="text-center" style="color:rgb(250,255,0);font-family:'Barlow Condensed', sans-serif;font-size:40px;margin-left:120px;margin-bottom:0;padding:0;margin-right:200px;margin-top:-53px;font-weight:bold;font-style:italic;">KMDC - PAGE D'EDITION</p><a href="./add.php"><button class="btn btn-primary" type="button" style="float:right;margin-top:-50px;margin-right:20px;padding-top:8px;padding-bottom:8px;">Ajouter un film</button></a></div>
        </div>
        <div style="width:70%;margin-left:15%;margin-right:15%;margin-top:70px;margin-bottom:70px;">


          <?php

          if (empty($_GET['id'])){
            $sql = "SELECT * FROM movies ORDER BY title ASC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0){
              while ($data = mysqli_fetch_assoc($result)){ ?>

            <div class="row" id="model" style="margin-bottom:10px;min-height:60px;border:double 2px rgb(0,0,0);border-radius:5px;">
                <div class="col" style="padding:0;margin:0;background-color:#c1c1c1;color:rgb(0,0,0);font-size:25px;font-weight:normal;border-radius:5px;">
                    <a href="../movie.php?id=<?php echo $data['ID']; ?>"><p style="font-family:'Barlow Condensed', sans-serif;font-size:35px;padding:0;vertical-align:middle;margin:0;margin-left:15px;border-radius:20px;text-decoration:none;color:darkblue;"><?php echo $data['title']; ?></p></a>
                </div>
                <div class="col-lg-2" style="margin:0;padding:0;"><a href=edit.php?id=<?php echo $data['ID']; ?>><button class="btn btn-light" type="button" style="height:60px;width:100%;font-size:20px;font-weight:normal;font-style:normal;padding:0;margin:0;">EDITER</button></a></div>
                <div class="col-lg-2" style="margin:0;padding:0;"><a href="delete.php?id=<?php echo $data['ID']; ?>"><button class="btn btn-danger active" type="button" style="width:100%;height:60px;font-size:20px;padding:0;margin:0;">SUPPRIMER</button></a></div>
            </div>

          <?php  }}}

            ?>


        </div>
        <div class="footer" style="height:70px;width:100%;margin:0;padding:0;background-color:#341f41;border-top-style:dashed;border-top-color:rgb(0,0,0);margin-top:70px;bottom:0;">
            <div class="d-inline-block" style="width:33%;height:60px;vertical-align:top;">
                <p class="text-left text-warning" style="font-family:Aldrich, sans-serif;font-size:20px;/*vertical-align:baseline;*/margin:0;padding:0;margin-top:4%;">&nbsp; ©Kelou - <a href="https://kelou.fr/">Clément Castel</a></p>
            </div>
            <div class="d-inline-block" style="width:33%;height:60px;vertical-align:top;"><i class="fa fa-twitter" style="font-size:30px;color:rgb(255,255,255);height:30px;width:30px;padding-left:15%;"></i><i class="fa fa-flickr" style="font-size:30px;color:rgb(255,255,255);width:30px;height:30px;padding-left:30%;margin-top:4%;"></i>
                <i
                    class="fa fa-git" style="font-size:30px;color:rgb(255,255,255);width:30px;height:30px;padding-left:30%;"></i>
            </div>
            <div class="d-inline-block" style="width:33%;height:60px;vertical-align:top;">
                <p class="lead text-right text-warning" style="font-size:15px;font-family:Aldrich, sans-serif;padding:0;margin:0;margin-top:4%;">Dev. Buid: &nbsp;v1.0.2</p>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>