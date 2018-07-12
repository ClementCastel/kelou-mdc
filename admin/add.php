<?php
require_once('../config.php');
$conn = mysqli_connect(host, user,pass, db); //connection à la base de données
print_r($_POST);

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



  $query = "INSERT INTO
  `movies` (`title`, `date`, `film_director`, `actors`, `duration`, `languages`, `subs`, `quality`, `synopsis`, `ytb`, `poster`)
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
    '$poster'
  )"; //création de la query avec récupération des valeurs du formulaire

  $insert = mysqli_query($conn,$query); //éxecution de la query

  if ($insert) {
    echo 'Article publié !'; //Si la query a été éxecutée correctement alors on affiche un message de confirmation
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
        <form method="post" style="width:500px;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-film-outline" style="color:rgb(255,255,255);"></i></div>
            <div class="form-group">
<input class="form-control" type="text" name="title" placeholder="IMDb Link" id="getData_url" style="font-family:'Alfa Slab One', cursive;">
<button onclick="getData();" class="btn btn-dark active" type="button" style="padding-top:5px;padding-bottom:5px;padding-right:20px;padding-left:20px;margin-top:0px;width:370px;margin-bottom:70px;color:rgb(122,130,136);font-size:15px;font-family:'Alfa Slab One', cursive;">Pré-remplir les champs</button>


<input class="form-control" type="text" name="title" placeholder="Titre" id="title" style="font-family:'Alfa Slab One', cursive;">
<input class="form-control" type="text" name="date" placeholder="Date" id="date" style="font-family:'Alfa Slab One', cursive;">
<input class="form-control" type="text" name="real" placeholder="Réalisateur" id="real" style="font-family:'Alfa Slab One', cursive;">
<input class="form-control" type="text" name="actors" placeholder="Acteurs" id="actors" style="font-family:'Alfa Slab One', cursive;">
<input class="form-control" type="text" name="duration" placeholder="Durée" id="duration" style="font-family:'Alfa Slab One', cursive;">


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
<input class="form-control" type="text" name="languages" placeholder="Langues" style="font-family:'Alfa Slab One', cursive;margin-top:20px;">
<input class="form-control" type="text" name="subs" placeholder="Sous-Titres" style="font-family:'Alfa Slab One', cursive;margin-bottom:20px;">

                        <p style="color:rgb(119,130,136);font-family:'Alfa Slab One', cursive;padding-top:13px;margin-bottom:-12px;padding-left:16px;">Qualité :</p>
            </div>
            <div class="form-group">
                <div class="custom-control custom-radio" style="margin-top:25px;"><input type="radio" id="radio1" class="custom-control-input" name="quality" value="-720p"><label class="custom-control-label" for="radio1" style="font-family:'Alfa Slab One', cursive;color:rgb(122,130,136);">-720p</label></div>
                <div class="custom-control custom-radio"><input type="radio" id="radio2" class="custom-control-input" name="quality" value="720p"><label class="custom-control-label" for="radio2" style="font-family:'Alfa Slab One', cursive;color:rgb(122,130,136);">720p</label></div>
                <div class="custom-control custom-radio"><input type="radio" id="radio3" class="custom-control-input" name="quality" value="1080p"><label class="custom-control-label" for="radio3" style="font-family:'Alfa Slab One', cursive;color:rgb(122,130,136);">1080p</label></div>
                <p style="color:rgb(119,130,136);font-family:'Alfa Slab One', cursive;padding-top:35px;margin-bottom:0px;padding-left:16px;">Synopsis :</p>
                <div class="form-group">


<textarea class="form-control form-control" id="synopsis" name="synopsis" rows="3" style="height:330px;width:350px;margin-left:8px;background-color:#232e3b;margin-top:18px;"></textarea></div>
<input class="form-control" type="text" name="trailer" placeholder="YTB Trailer link" id="ytb" style="font-family:'Alfa Slab One', cursive;padding-top:35px;margin-bottom:20px;">
<input class="form-control" type="text" name="poster" placeholder="Poster link" id="poster" style="font-family:'Alfa Slab One', cursive;margin:0;"></div>


            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit" value="submit" style="margin-top:100px;font-family:'Alfa Slab One', cursive;background-color:rgb(35,46,59);">Valider</button></div>
    </form>
    <p><a href="https://kelou.fr/">©KELOU </a>- CASTEL Clément</p>
  </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
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
