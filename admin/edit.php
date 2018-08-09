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
    <title>admin-add-page2</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background-color:rgb(29,29,29);">
    <div style="width:100%;height:100%;margin:0;padding:0;">
        <div class="row" style="background-color:rgb(21,21,21);margin:0;padding:0;height:65px;">
            <div class="col-lg-1" style="width:70px;height:80px;margin:0;padding:0;"><a href="../index.php"><i class="fa fa-film" style="padding:0;color:rgb(255,255,255);font-size:40px;margin-top:10px;margin-left:15px;"></i></a></div>
            <div class="col-lg-10" style="margin:0;padding:0;">
                <p class="text-center" style="color:rgb(204,7,30);font-family:'Barlow Condensed', sans-serif;font-size:40px;margin-bottom:0;padding:0;font-weight:bold;font-style:italic;">KMDC - ADMIN - Ajouter un film</p>
            </div>
            <div class="col-lg-1" style="margin:0;padding:0;width:125px;flex:0;">
                <p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:125px;">Gérer les films</p>
                <p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:115px;">Déconnexion</p>
            </div>
        </div>
        <div style="width:440px;margin-left:710px;margin-right:710px;margin-top:137px;border:3px solid rgb(0,0,0);border-radius:25px;margin-bottom:137px;min-height:1620px;">
            <div style="margin:0;padding:0;height:70px;width:100%;">
                <p style="color:rgb(255,255,255);font-size:50px;font-family:'Barlow Condensed', sans-serif;font-weight:bold;font-style:normal;margin:0;padding:0;margin-left:30px;margin-right:30px;margin-top:20px;">&gt;&gt; &nbsp; Ajouter un film</p>
            </div>

            <?php if (!empty($_GET['id']) && empty($_GET['delete'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM movies WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);

          while ($data = mysqli_fetch_assoc($result)){; ?>

            <form method="post" style="padding-left:30px;padding-right:30px;padding-top:50px;">
                <h2 class="sr-only">Ajouter un film</h2>
                <div class="form-group">
                <input class="form-control input-data" type="text" name="title" placeholder="IMDb Link" autocomplete="off" id="getData_url">
                <button onclick="getData();" class="btn btn-dark active" type="button" style="padding-top:5px;padding-bottom:5px;padding-right:20px;padding-left:20px;margin-top:0px;width:370px;margin-bottom:70px;color:rgb(122,130,136);font-size:20px;font-family:'Barlow Condensed', sans-serif;height:40px;background-color:rgb(43,47,51);">Pré-remplir les champs</button>

                <input class="form-control input-data" type="text" name="title" required="" placeholder="Titre" autocomplete="off" id="title" value="<?php echo $data['title'] ?>">
                <input class="form-control input-data" type="text" name="date" required="" placeholder="Date" autocomplete="off" id="date" value="<?php echo $data['date'] ?>">
                <input class="form-control input-data" type="text" name="real" required="" placeholder="Réalisateur" autocomplete="off" id="real" value="<?php echo $data['film_director'] ?>">
                <input class="form-control input-data" type="text" name="actors" required="" placeholder="Acteurs" autocomplete="off" id="actors" value="<?php echo $data['actors'] ?>">
                <input class="form-control input-data" type="text" name="duration" required="" placeholder="Durée" autocomplete="off" id="duration" value="<?php echo $data['duration'] ?>">

                        <p style="color:rgb(122,130,136);font-size:20px;margin:0;margin-top:25px;margin-bottom:10px;padding:0;">Genre :</p>
                        <div class="custom-control custom-checkbox" style="color:rgb(122,130,136);"><input type="checkbox" id="checkbox1" class="custom-control-input"><label class="custom-control-label" for="checkbox1">Animation</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Fantastique" type="checkbox" id="checkbox2" class="custom-control-input" <?php if (preg_match("/Fantastique/", $data['kind'])){ echo "checked"; }?>><label class="custom-control-label" for="checkbox2">Fantastique / S-F</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Biopic" type="checkbox" id="checkbox3" class="custom-control-input" <?php if (preg_match("/Biopic/", $data['kind'])){ echo "checked"; }?>><label class="custom-control-label" for="checkbox3">Biopic</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Horreur" type="checkbox" id="checkbox4" class="custom-control-input" <?php if (preg_match("/Horreur/", $data['kind'])){ echo "checked"; }?>><label class="custom-control-label" for="checkbox4">Horreur</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Comédie" type="checkbox" id="checkbox5" class="custom-control-input" <?php if (preg_match("/Comédie/", $data['kind'])){ echo "checked"; }?>><label class="custom-control-label" for="checkbox5">Comédie</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Historique" type="checkbox" id="checkbox6" class="custom-control-input" <?php if (preg_match("/Historique/", $data['kind'])){ echo "checked"; }?>><label class="custom-control-label" for="checkbox6">Historique</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Documentaire" type="checkbox" id="checkbox7" class="custom-control-input" <?php if (preg_match("/Documentaire/", $data['kind'])){ echo "checked"; }?>><label class="custom-control-label" for="checkbox7">Documentaire</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Police / Thriller" type="checkbox" id="checkbox8" class="custom-control-input" <?php if (preg_match("/Police/", $data['kind'])){ echo "checked"; }?>><label class="custom-control-label" for="checkbox8">Police / Thriller</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Drame" type="checkbox" id="checkbox9" class="custom-control-input" <?php if (preg_match("/Drame/", $data['kind'])){ echo "checked"; }?>><label class="custom-control-label" for="checkbox9">Drame</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Aventure" type="checkbox" id="checkbox10" class="custom-control-input" <?php if (preg_match("/Aventure/", $data['kind'])){ echo "checked"; }?>><label class="custom-control-label" for="checkbox10">Aventure</label></div>
                <input class="form-control input-data" type="text" name="languages" required="" placeholder="Langues" autocomplete="off" style="margin-top:20px;"  value="<?php echo $data['languages'] ?>">
                <input class="form-control input-data" type="text" name="subs" required="" placeholder="Sous-Titres" autocomplete="off" style="margin-bottom:20px;" value="<?php echo $data['subs'] ?>">
                        <p style="color:rgb(119,130,136);font-size:20px;padding-top:10px;margin-bottom:-20px;">Qualité :</p>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-radio" style="margin-top:25px;"><input type="radio" id="radio1" class="custom-control-input"  name="quality" value="-720p" <?php if ($data['quality'] == "-720p"){ echo "checked"; }?>><label class="custom-control-label" for="radio1" style="color:rgb(122,130,136);font-family:'Barlow Condensed', sans-serif;font-size:20px;margin-top:-10px;">-720p</label></div>
                    <div class="custom-control custom-radio"><input type="radio" id="radio2" class="custom-control-input"  name="quality" value="720p" <?php if ($data['quality'] == "720p"){ echo "checked"; }?>><label class="custom-control-label" for="radio2" style="color:rgb(122,130,136);margin-top:-10px;font-family:'Barlow Condensed', sans-serif;font-size:20px;">720p</label></div>
                <div class="custom-control custom-radio"><input type="radio" id="radio3" class="custom-control-input"  name="quality" value="1080p" <?php if ($data['quality'] == "1080p"){ echo "checked"; }?>><label class="custom-control-label" for="radio3" style="font-family:'Barlow Condensed', sans-serif;color:rgb(122,130,136);margin-top:-10px;font-size:20px;">1080p</label></div>
        <p style="color:rgb(119,130,136);font-size:20px;margin-top:20px;">Synopsis :</p>
            <div class="form-group">
            <textarea class="form-control form-control" required="" autocomplete="off" id="synopsis" name="synopsis" rows="3" style="width:350px;margin-left:8px;background-color:#232e3b;margin-top:18px;min-height:150px;"><?php echo $data['synopsis']; ?></textarea></div>
                <input class="form-control input-data" type="text" name="trailer" required="" placeholder="YTB Trailer link" autocomplete="off" id="ytb" style="margin-top:35px;" value="<?php echo $data['ytb']; ?>">
                <input class="form-control input-data" type="text" name="poster" required="" placeholder="Poster link" autocomplete="off" id="poster" value="<?php echo $data['poster']; ?>"></div>
    <div class="form-group"><button class="btn btn-primary btn-block" name="submit" type="submit" style="margin-top:50px;font-family:'Barlow Condensed', sans-serif;background-color:rgb(30,44,61);box-shadow:none;font-size:25px;height:50px;padding:0;border-color:rgb(0,0,0);margin-bottom:65px;">Mettre A Jour</button></div>
    </form>
    <?php }}?>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>