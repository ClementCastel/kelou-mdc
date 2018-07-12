<?php
require_once('../config.php');
$conn = mysqli_connect(host, user,pass, db); //connection à la base de données


if (empty($_GET['id'])){
  header("Location: index.php");
}

if (!empty($_POST) && !empty($_GET['id'])){
  $id = $_GET['id'];

  $data[0] = addslashes($_POST['title']);
  $data[1] = addslashes($_POST['date']);
  $data[2] = addslashes($_POST['real']);
  $data[3] = addslashes($_POST['actors']);
  $data[4] = addslashes($_POST['duration']);
  $data[5] = addslashes($_POST['languages']);
  $data[6] = addslashes($_POST['subs']);
  $data[7] = addslashes($_POST['quality']);
  $data[8] = addslashes($_POST['synopsis']);
  $data[9] = addslashes($_POST['trailer']);
  $data[10] = addslashes($_POST['poster']);

  $query = "UPDATE movies
            SET title = '$data[0]', date = '$data[1]', film_director = '$data[2]', actors = '$data[3]', duration = '$data[4]', languages = '$data[5]', subs = '$data[6]', quality = '$data[7]', synopsis = '$data[8]', ytb = '$data[9]', poster = '$data[10]'
            WHERE ID = $id
  ";

  $update = mysqli_query($conn, $query);

  if ($update){
    echo 'Article mis à jour ! <br />';
  } else {
    echo 'Une erreur est arrivée';
  }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddAMovie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/slate/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anonymous+Pro">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/slate/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/add.styles.min.css">
</head>

<body>
    <div class="login-dark" style="height:1950px;background-image:url(&quot;assets/img/bg-crop2.jpg&quot;);">

      <?php if (!empty($_GET['id']) && empty($_GET['delete'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM movies WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);

          while ($data = mysqli_fetch_assoc($result)){; ?>

        <form method="post" style="width:500px;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-film-outline" style="color:rgb(255,255,255);"></i></div>
            <div class="form-group">

<input class="form-control" type="text" name="title" placeholder="Titre" id="title" style="font-family:'Alfa Slab One', cursive;" value="<?php echo $data['title'] ?>">
<input class="form-control" type="text" name="date" placeholder="Date" id="date" style="font-family:'Alfa Slab One', cursive;" value="<?php echo $data['date'] ?>">
<input class="form-control" type="text" name="real" placeholder="Réalisateur" id="real" style="font-family:'Alfa Slab One', cursive;" value="<?php echo $data['film_director'] ?>">
<input class="form-control" type="text" name="actors" placeholder="Acteurs" id="actors" style="font-family:'Alfa Slab One', cursive;" value="<?php echo $data['actors'] ?>">
<input class="form-control" type="text" name="duration" placeholder="Durée" id="duration" style="font-family:'Alfa Slab One', cursive;" value="<?php echo $data['duration'] ?>">


                        <!--<p style="font-family:'Alfa Slab One', cursive;padding-top:13px;padding-left:16px;color:rgb(122,130,136);">Genre :</p>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input type="checkbox" id="checkbox1" class="custom-control-input"><label class="custom-control-label" for="checkbox1" style="font-family:'Alfa Slab One', cursive;">Animation</label></div>
                        <div class="custom-control custom-checkbox"
                            style="/*padding-left:0;*/color:rgb(122,130,136);"><input type="checkbox" id="checkbox2" class="custom-control-input"><label class="custom-control-label" for="checkbox2" style="font-family:'Alfa Slab One', cursive;">Fantastique / S-F</label></div>
                        <div class="custom-control custom-checkbox"
                            style="/*padding-left:0;*/color:rgb(122,130,136);"><input type="checkbox" id="checkbox3" class="custom-control-input"><label class="custom-control-label" for="checkbox3" style="font-family:'Alfa Slab One', cursive;">Biopic</label></div>
                        <div class="custom-control custom-checkbox"
                            style="/*padding-left:0;*/color:rgb(122,130,136);"><input type="checkbox" id="checkbox4" class="custom-control-input"><label class="custom-control-label" for="checkbox4" style="font-family:'Alfa Slab One', cursive;">Horreur</label></div>
                        <div class="custom-control custom-checkbox"
                            style="/*padding-left:0;*/color:rgb(122,130,136);"><input type="checkbox" id="checkbox5" class="custom-control-input"><label class="custom-control-label" for="checkbox5" style="font-family:'Alfa Slab One', cursive;">Comédie</label></div>
                        <div class="custom-control custom-checkbox"
                            style="/*padding-left:0;*/color:rgb(122,130,136);"><input type="checkbox" id="checkbox6" class="custom-control-input"><label class="custom-control-label" for="checkbox6" style="font-family:'Alfa Slab One', cursive;">Historique</label></div>
                        <div class="custom-control custom-checkbox"
                            style="/*padding-left:0;*/color:rgb(122,130,136);"><input type="checkbox" id="checkbox7" class="custom-control-input"><label class="custom-control-label" for="checkbox7" style="font-family:'Alfa Slab One', cursive;">Documentaire</label></div>
                        <div class="custom-control custom-checkbox"
                            style="/*padding-left:0;*/color:rgb(122,130,136);"><input type="checkbox" id="checkbox8" class="custom-control-input"><label class="custom-control-label" for="checkbox8" style="font-family:'Alfa Slab One', cursive;">Police / Thriller</label></div>
                        <div class="custom-control custom-checkbox"
                            style="/*padding-left:0;*/color:rgb(122,130,136);"><input type="checkbox" id="checkbox9" class="custom-control-input"><label class="custom-control-label" for="checkbox9" style="font-family:'Alfa Slab One', cursive;">Drame</label></div>
                        <div class="custom-control custom-checkbox"
                            style="/*padding-left:0;*/color:rgb(122,130,136);"><input type="checkbox" id="checkbox10" class="custom-control-input"><label class="custom-control-label" for="checkbox10" style="font-family:'Alfa Slab One', cursive;">Aventure</label></div>

-->
<input class="form-control" type="text" name="languages" placeholder="Langues" style="font-family:'Alfa Slab One', cursive;margin-top:20px;" value="<?php echo $data['languages'] ?>">
<input class="form-control" type="text" name="subs" placeholder="Sous-Titres" style="font-family:'Alfa Slab One', cursive;margin-bottom:20px;" value="<?php echo $data['subs'] ?>">

                        <p style="color:rgb(119,130,136);font-family:'Alfa Slab One', cursive;padding-top:13px;margin-bottom:-12px;padding-left:16px;">Qualité :</p>
            </div>
            <div class="form-group">
                <div class="custom-control custom-radio" style="margin-top:25px;"><input type="radio" id="radio1" class="custom-control-input" name="quality" value="-720p" <?php if ($data['quality'] == "-720p"){ echo ("checked"); }else{}?>><label class="custom-control-label" for="radio1" style="font-family:'Alfa Slab One', cursive;color:rgb(122,130,136);">-720p</label></div>
                <div class="custom-control custom-radio"><input type="radio" id="radio2" class="custom-control-input" name="quality" value="720p" <?php if ($data['quality'] == "720p"){ echo ("checked"); }else{}?>><label class="custom-control-label" for="radio2" style="font-family:'Alfa Slab One', cursive;color:rgb(122,130,136);">720p</label></div>
                <div class="custom-control custom-radio"><input type="radio" id="radio3" class="custom-control-input" name="quality" value="1080p" <?php if ($data['quality'] == "1080p"){ echo ("checked"); }else{}?>><label class="custom-control-label" for="radio3" style="font-family:'Alfa Slab One', cursive;color:rgb(122,130,136);">1080p</label></div>
                <p style="color:rgb(119,130,136);font-family:'Alfa Slab One', cursive;padding-top:35px;margin-bottom:0px;padding-left:16px;">Synopsis :</p>
                <div class="form-group">


<textarea class="form-control form-control" id="synopsis" name="synopsis" rows="3" style="height:330px;width:350px;margin-left:8px;background-color:#232e3b;margin-top:18px;"><?php echo $data['synopsis']; ?></textarea></div>
<input class="form-control" type="text" name="trailer" placeholder="YTB Trailer link" id="ytb" style="font-family:'Alfa Slab One', cursive;padding-top:35px;margin-bottom:20px;" value="<?php echo $data['ytb']; ?>">
<input class="form-control" type="text" name="poster" placeholder="Poster link" id="poster" style="font-family:'Alfa Slab One', cursive;margin:0;" value="<?php echo $data['poster']; ?>"></div>


            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit" value="submit" style="margin-top:100px;font-family:'Alfa Slab One', cursive;background-color:rgb(35,46,59);">METTRE A JOUR</button></div>
    </form>

  <?php }}?>
    <p><a href="https://kelou.fr/">©KELOU </a>- CASTEL Clément</p>
  </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
