<?php
require_once('../config.php');
$conn = mysqli_connect(host, user,pass, db); //connection à la base de données
print_r($_POST);

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true){
} else {
  header("Location: login.php");
}

if (isset($_POST['submit'])){ //vérification que le formulaire a bien été envoyé

$title = addslashes($_POST['title']);
$title = strtoupper($title);
$date = addslashes($_POST['date']);
$real = addslashes($_POST['real']);
$actors = addslashes($_POST['actors']);
$duration = addslashes($_POST['duration']);
$languages = addslashes($_POST['languages']);
$subs = addslashes($_POST['subs']);
$quality = addslashes($_POST['quality']);
$synopsis = addslashes($_POST['synopsis']);
$trailer = addslashes($_POST['trailer']);
$poster = addslashes($_POST['poster']);
$user = $_SESSION['username'];

$kind = $_POST['kind'];
$fkind = null; //fkind = finalKind = valeur (String) qui sera transmise à la base de données
$sofKind = count($kind); //sof = size of; valeur = nombre de catégories cochées + 1 (tableau indexé à partir de 0)

if ($sofKind == 0){
  $fkind = null;
} else if ($sofKind == 1){
  $fkind = "".$kind[0];
} else if ($sofKind == 2) {
  $fkind = "".$kind[0].", ".$kind[1];
} else if ($sofKind == 3) {
  $fkind = "".$kind[0].", ".$kind[1].", ".$kind[2];
} else if ($sofKind == 4) {
  $fkind = "".$kind[0].", ".$kind[1].", ".$kind[2].", ".$kind[3];
} else if ($sofKind == 5) {
  $fkind = "".$kind[0].", ".$kind[1].", ".$kind[2].", ".$kind[3].", ".$kind[4];
} else if ($sofKind == 6) {
  $fkind = "".$kind[0].", ".$kind[1].", ".$kind[2].", ".$kind[3].", ".$kind[4].", ".$kind[5];
} else if ($sofKind == 7) {
  $fkind = "".$kind[0].", ".$kind[1].", ".$kind[2].", ".$kind[3].", ".$kind[4].", ".$kind[5].", ".$kind[6];
} else if ($sofKind == 8) {
  $fkind = "".$kind[0].", ".$kind[1].", ".$kind[2].", ".$kind[3].", ".$kind[4].", ".$kind[5].", ".$kind[6].", ".$kind[7];
}


  $query = "INSERT INTO
  `movies` (`title`, `date`, `film_director`, `actors`, `duration`, `languages`, `subs`, `quality`, `synopsis`, `ytb`, `poster`, `user`, `kind`)
VALUES
  (
    '$title',
    '$date',
    '$real',
    '$actors',
    '$duration',
    '$languages',
    '$subs',
    '$quality',
    '$synopsis',
    '$trailer',
    '$poster',
    '$user',
    '$fkind'
  )"; //création de la query avec récupération des valeurs du formulaire

  $insert = mysqli_query($conn,$query); //éxecution de la query

  if ($insert) {
    echo '<script>alert("Article publié !");</script>'; //Si la query a été éxecutée correctement alors on affiche un message de confirmation
  } else {
    echo 'Il y a eu une erreur !'; //Dans le cas contraire, un message d'alerte
    var_dump($conn->error); //accompagné de l'erreur.
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
            <form method="post" style="padding-left:30px;padding-right:30px;padding-top:50px;">
                <h2 class="sr-only">Ajouter un film</h2>
                <div class="form-group">
                <input class="form-control input-data" type="text" name="title" placeholder="IMDb Link" autocomplete="off" id="getData_url">
                <button onclick="getData();" class="btn btn-dark active" type="button" style="padding-top:5px;padding-bottom:5px;padding-right:20px;padding-left:20px;margin-top:0px;width:370px;margin-bottom:70px;color:rgb(122,130,136);font-size:20px;font-family:'Barlow Condensed', sans-serif;height:40px;background-color:rgb(43,47,51);">Pré-remplir les champs</button>

                <input class="form-control input-data" type="text" name="title" required="" placeholder="Titre" autocomplete="off" id="title">
                <input class="form-control input-data" type="text" name="date" required="" placeholder="Date" autocomplete="off" id="date">
                <input class="form-control input-data" type="text" name="real" required="" placeholder="Réalisateur" autocomplete="off" id="real">
                <input class="form-control input-data" type="text" name="actors" required="" placeholder="Acteurs" autocomplete="off" id="actors">
                <input class="form-control input-data" type="text" name="duration" required="" placeholder="Durée" autocomplete="off" id="duration">

                        <p style="color:rgb(122,130,136);font-size:20px;margin:0;margin-top:25px;margin-bottom:10px;padding:0;">Genre :</p>
                        <div class="custom-control custom-checkbox" style="color:rgb(122,130,136);"><input type="checkbox" id="checkbox1" class="custom-control-input"><label class="custom-control-label" for="checkbox1">Animation</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Fantastique" type="checkbox" id="checkbox2" class="custom-control-input"><label class="custom-control-label" for="checkbox2">Fantastique / S-F</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Biopic" type="checkbox" id="checkbox3" class="custom-control-input"><label class="custom-control-label" for="checkbox3">Biopic</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Horreur" type="checkbox" id="checkbox4" class="custom-control-input"><label class="custom-control-label" for="checkbox4">Horreur</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Comédie" type="checkbox" id="checkbox5" class="custom-control-input"><label class="custom-control-label" for="checkbox5">Comédie</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Historique" type="checkbox" id="checkbox6" class="custom-control-input"><label class="custom-control-label" for="checkbox6">Historique</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Documentaire" type="checkbox" id="checkbox7" class="custom-control-input"><label class="custom-control-label" for="checkbox7">Documentaire</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Police / Thriller" type="checkbox" id="checkbox8" class="custom-control-input"><label class="custom-control-label" for="checkbox8">Police / Thriller</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Drame" type="checkbox" id="checkbox9" class="custom-control-input"><label class="custom-control-label" for="checkbox9">Drame</label></div>
                        <div class="custom-control custom-checkbox" style="/*padding-left:0;*/color:rgb(122,130,136);"><input name="kind[]" value="Aventure" type="checkbox" id="checkbox10" class="custom-control-input"><label class="custom-control-label" for="checkbox10">Aventure</label></div>
                <input class="form-control input-data" type="text" name="languages" required="" placeholder="Langues" autocomplete="off" style="margin-top:20px;">
                <input class="form-control input-data" type="text" name="subs" required="" placeholder="Sous-Titres" autocomplete="off" style="margin-bottom:20px;">
                        <p style="color:rgb(119,130,136);font-size:20px;padding-top:10px;margin-bottom:-20px;">Qualité :</p>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-radio" style="margin-top:25px;"><input type="radio" id="radio1" class="custom-control-input"  name="quality" value="-720p"><label class="custom-control-label" for="radio1" style="color:rgb(122,130,136);font-family:'Barlow Condensed', sans-serif;font-size:20px;margin-top:-10px;">-720p</label></div>
                    <div class="custom-control custom-radio"><input type="radio" id="radio2" class="custom-control-input"  name="quality" value="720p"><label class="custom-control-label" for="radio2" style="color:rgb(122,130,136);margin-top:-10px;font-family:'Barlow Condensed', sans-serif;font-size:20px;">720p</label></div>
                <div class="custom-control custom-radio"><input type="radio" id="radio3" class="custom-control-input"  name="quality" value="1080p"><label class="custom-control-label" for="radio3" style="font-family:'Barlow Condensed', sans-serif;color:rgb(122,130,136);margin-top:-10px;font-size:20px;">1080p</label></div>
        <p style="color:rgb(119,130,136);font-size:20px;margin-top:20px;">Synopsis :</p>
            <div class="form-group">
            <textarea class="form-control form-control" required="" autocomplete="off" id="synopsis" name="synopsis" rows="3" style="width:350px;margin-left:8px;background-color:#232e3b;margin-top:18px;min-height:150px;"></textarea></div>
                <input class="form-control input-data" type="text" name="trailer" required="" placeholder="YTB Trailer link" autocomplete="off" id="ytb" style="margin-top:35px;">
                <input class="form-control input-data" type="text" name="poster" required="" placeholder="Poster link" autocomplete="off" id="poster"></div>
    <div class="form-group"><button class="btn btn-primary btn-block" name="submit" type="submit" style="margin-top:50px;font-family:'Barlow Condensed', sans-serif;background-color:rgb(30,44,61);box-shadow:none;font-size:25px;height:50px;padding:0;border-color:rgb(0,0,0);margin-bottom:65px;">Valider</button></div>
    </form>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script>

  function getData (){
    var url = $("input#getData_url").val();
    url = url.slice(27,36);
    console.log(url);
    const dataForm = fetch('https://api.themoviedb.org/3/movie/' + url + '?api_key=1b523a22be6bbcb7b260693e379e6889')
      .then (result => result.json())
      .then (data => {
        const data_title =  data.original_title;
        const data_date =  data.release_date;
        const data_duration =  data.runtime+" minutes";
        const data_synopsis =  data.overview;
        const data_poster =  "https://image.tmdb.org/t/p/w500"+data.poster_path;
        $("input#title").val(data_title);
        $("input#date").val(data_date);
        $("input#duration").val(data_duration);
        $("input#poster").val(data_poster);
        $('#synopsis').val(data_synopsis);
    });

    const data2Form = fetch('https://api.themoviedb.org/3/movie/'+ url + '/videos?api_key=1b523a22be6bbcb7b260693e379e6889&language=fr-FR')
      .then (result => result.json())
      .then (data => {
        if (data.results[0].type == "Trailer"){
          const data_video = "youtube.com/watch?v="+data.results[0].key;
          $("input#ytb").val(data_video);
        } else if (data.results[1].type == "Trailer"){
            const data_video = "youtube.com/watch?v="+data.results[1].key;
            $("input#ytb").val(data_video);
        } else if (data.results[1].type == "Trailer"){
            const data_video = "youtube.com/watch?v="+data.results[1].key;
            $("input#ytb").val(data_video);}
      });

      const data3Form = fetch ('https://api.themoviedb.org/3/movie/' + url + '/credits?api_key=1b523a22be6bbcb7b260693e379e6889')
        .then (result => result.json())
        .then (data => {
            console.log(data);
            var crew_length = data.crew.length;
            var data_director;
            for (var i = 0; i < crew_length; i++){
              if (data.crew[i].job == "Director"){
                data_director = data.crew[i].name;
              } else {}
            }
            $("input#real").val(data_director);
            const data_actors = [data.cast[0].name, data.cast[1].name, data.cast[2].name];
            $("input#actors").val(data_actors[0]+", "+data_actors[1]+", "+data_actors[2]);
        })

  }  </script>
</body>

</html>