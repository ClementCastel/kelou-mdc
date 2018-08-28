<?php 
require_once('./config.php');
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true){} else { header('Location: ./login.php');}

$nbreFilms = null;

    $conn = mysqli_connect(host, user,pass, db);

    $sql = "SELECT * FROM movies WHERE user = '$_SESSION[username]'";
    $result = mysqli_query($conn, $sql);

    $nbreFilms = mysqli_num_rows($result);


?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>

<body style="background-color:rgb(29,29,29);">
    <div class="content" style="width:100%;height:65px;margin:0;padding:0;">
        <div class="row" style="background-color:rgb(21,21,21);margin:0;padding:0;height:65px;">
            <div class="col-lg-1" style="width:70px;height:80px;margin:0;padding:0;"><a href="./index.php"><i class="fa fa-film" style="padding:0;color:rgb(255,255,255);font-size:40px;margin-top:10px;margin-left:15px;"></i></a></div>
            <div class="col-lg-10" style="margin:0;padding:0;">
                <p class="text-center" style="color:rgb(204,7,30);font-family:'Barlow Condensed', sans-serif;font-size:40px;margin-bottom:0;padding:0;font-weight:bold;font-style:italic;">KMDC - Home</p>
            </div>
            <div class="col-lg-1" style="margin:0;padding:0;width:125px;flex:0;">
                <p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:125px;">Gérer les films</p>
                <p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:115px;">Déconnexion</p>
            </div>
        </div>
    </div>
    <div class="pulse animated content" style="margin-top:40px;margin-left:80px;">
    
    <?php
      $conn = mysqli_connect(host, user,pass, db);

      $sql = "SELECT * FROM users WHERE email='$_SESSION[mail]'";

      $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1){
            while ($data = mysqli_fetch_assoc($result)){ ?>

        <p style="color:rgb(255,255,255);font-family:'Barlow Condensed', sans-serif;font-size:35px;margin:0;padding:0;">VOTRE PROFIL :</p>
        <p style="color:rgb(255,255,255);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin:0;padding:0;margin-left:20px;">Pseudo : <?php echo $data['username']; ?></p>
        <p style="color:rgb(255,255,255);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin:0;padding:0;margin-left:20px;">Nom : <?php echo $data['name']; ?></p>
        <p style="color:rgb(255,255,255);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin:0;padding:0;margin-left:20px;">Email : <?php echo $data['email']; ?></p>
        <p style="color:rgb(255,255,255);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin:0;padding:0;margin-left:20px;">Nombre de films : <?php echo $nbreFilms; ?></p>
        <p style="color:rgb(255,255,255);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin:0;padding:0;margin-left:20px;">Inscrit le : <?php echo $data['register_date']; ?></p>

        <?php }} ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>