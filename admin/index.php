<?php
require_once('../config.php');
$conn = mysqli_connect(host, user,pass, db);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-index-page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/slate/bootstrap.min.css">
</head>

<body style="background-color:rgb(29,29,29);">
    <div style="width:100%;height:100%;margin:0;padding:0;">
        <div class="row" style="background-color:rgb(21,21,21);margin:0;padding:0;height:65px;">
            <div class="col-lg-1" style="width:70px;height:80px;margin:0;padding:0;"><i class="fa fa-film" style="padding:0;color:rgb(255,255,255);font-size:40px;margin-top:10px;margin-left:15px;"></i></div>
            <div class="col-lg-10" style="margin:0;padding:0;">
                <p class="text-center" style="color:rgb(204,7,30);font-family:'Barlow Condensed', sans-serif;font-size:40px;margin-bottom:0;padding:0;font-weight:bold;font-style:italic;">KMDC - ADMIN - Index</p>
            </div>
            <div class="col-lg-1" style="margin:0;padding:0;width:125px;flex:0;">
                <p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:125px;">Gérer les films</p>
                <p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:115px;">Déconnexion</p>
            </div>
        </div>
        <div style="width:70%;margin-left:15%;margin-right:15%;margin-top:70px;margin-bottom:70px;">

        <div class="row" id="add-movie" style="margin-bottom:10px;min-height:60px;border:double 2px rgb(0,0,0);border-radius:5px;height:65px;">
            <div class="col-lg-12" style="padding:0;margin:0;background-color:#ccc;color:rgb(0,0,0);font-size:25px;font-weight:normal;border-top-left-radius:5px;border-bottom-left-radius:5px;"><a href="./add.php"><button class="btn btn-primary" type="button" style="width:100%;height:100%;margin:0;padding:0;color:rgb(255,255,255);font-size:35px;font-family:'Barlow Condensed', sans-serif;font-weight:bold;border-radius:0;border:0;">Ajouter un film</button></a></div>
        </div>

        <?php

        if (empty($_GET['id'])){
            $sql = "SELECT * FROM movies WHERE user='$_SESSION[username]' ORDER BY title ASC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0){
                while ($data = mysqli_fetch_assoc($result)){ ?>

            <div class="row" id="model" style="margin-bottom:10px;height:60px;border:double 2px rgb(0,0,0);border-radius:5px;">
                <div class="col" style="padding:0;margin:0;background-color:#ccc;color:rgb(0,0,0);font-size:25px;font-weight:normal;border-top-left-radius:5px;border-bottom-left-radius:5px;">
                    <a href="../movie.php?id=<?php echo $data['ID']; ?>"><p style="font-family:'Barlow Condensed', sans-serif;font-size:35px;padding:0;vertical-align:middle;margin:0;margin-left:15px;color:black;"><?php echo $data['title']; ?></p>
                </div>
                <div class="col-lg-2" style="margin:0;padding:0;"><a href=edit.php?id=<?php echo $data['ID']; ?>><button class="btn btn-light" type="button" style="height:100%;width:100%;font-size:20px;font-weight:normal;font-style:normal;padding:0;margin:0;border-radius:0;">EDITER</button></a></div>
                <div class="col-lg-2" style="margin:0;padding:0;"><a href="delete.php?id=<?php echo $data['ID']; ?>"><button class="btn btn-danger active" type="button" style="width:100%;height:100%;font-size:20px;padding:0;margin:0;border-top-left-radius:0;border-bottom-left-radius:0;">SUPPRIMER</button></a></div>
            </div>

            <?php  }}}

            ?>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>