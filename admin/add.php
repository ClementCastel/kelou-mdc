<?php 

if (isset($_SESSION['connected']) && !empty($_SESSION['connected'])) header('Location: ../login.php');

set_include_path(get_include_path().";"."C:/wamp64/www/LOGIN-PASSWORD/");

require_once("../header.php");

$conn = mysqli_connect(host, user,pass, db); //connection à la base de données

if (isset($_POST['submit'])){ //vérification que le formulaire a bien été envoyé

$UID = rand(0,9999);
$UID = sha1(sha1($UID.rand(0,9999)).rand(0,9999));

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
$user = $_SESSION['ID'];

$kind = $_POST['kind'];
$fkind = join(', ',$kind);


  $query = "INSERT INTO
  `movies` (`UID`, `title`, `date`, `film_director`, `actors`, `duration`, `languages`, `subs`, `quality`, `synopsis`, `ytb`, `poster`, `user`, `kind`)
VALUES
  (
    '$UID',
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
    echo '<script>alert("Film ajouté !");</script>'; //Si la query a été éxecutée correctement alors on affiche un message de confirmation
  } else {
    echo 'Il y a eu une erreur !'; //Dans le cas contraire, un message d'alerte
    var_dump($conn->error); //accompagné de l'erreur.
  }
}

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/add.util.css">
	<link rel="stylesheet" type="text/css" href="css/add.main.css">
<!--===============================================================================================-->
</head>
<body style="margin:0;">
    <div class="contact1">
		<div class="container-contact1" style="margin-top: 70px; margin-bottom: 70px;">

			<form class="contact1-form validate-form" autocomplete="off" method="POST">
				<span class="contact1-form-title">
					Ajouter un film
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
                    <input class="input1" type="text" name="IMDB" placeholder="Rechercher le titre de votre film" id="getData_url">
					<span class="shadow-input1"></span>
                </div>

                <div class="pl">
                    <ul id="table-result" class="pl">
            
                    </ul>
                </div>
                
				<!--<div class="container-contact1-form-btn">
					<button style="margin-bottom: 50px;" type="button" class="contact1-form-btn" onclick="getData();">
						<span>
							Pré-remplir les champs
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>-->
            </form>
            <form class="contact1-form validate-form" autocomplete="off" method="POST">
				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="title" required="" placeholder="Titre" autocomplete="off" id="title" required>
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="date" required="" placeholder="Date" autocomplete="off" id="date">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="real" required="" placeholder="Réalisateur" autocomplete="off" id="real">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="actors" required="" placeholder="Acteurs" autocomplete="off" id="actors">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="duration" required="" placeholder="Durée" autocomplete="off" id="duration">
					<span class="shadow-input1"></span>
				</div>


                <span class="contact1-form-title" style="margin-top: 50px;">
					Genre.s :
                </span>
                
                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Animation" type="checkbox" id="checkbox1" />
                    <span>Animation</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Fantastique" type="checkbox" id="checkbox2" />
                    <span>Fantastique</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Biopic" type="checkbox" id="checkbox3" />
                    <span>Biopic</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Horreur" type="checkbox" id="checkbox4" />
                    <span>Horreur</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Comédie" type="checkbox" id="checkbox5" />
                    <span>Comédie</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Historique" type="checkbox" id="checkbox6" />
                    <span>Historique</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Documentaire" type="checkbox" id="checkbox7" />
                    <span>Documentaire</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Police / Thriller" type="checkbox" id="checkbox8" />
                    <span>Police / Thriller</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Drame" type="checkbox" id="checkbox9" />
                    <span>Drame</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Aventure" type="checkbox" id="checkbox10" />
                    <span>Aventure</span>
                </label><br/>

                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="margin-top: 50px;">
                    <input class="input1" type="text" name="languages" required="" placeholder="Langues">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="subs" required="" placeholder="Sous-Titres">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="quality" required="" placeholder="Qualité">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <textarea class="input1" type="text" name="synopsis" required="" placeholder="SYNOPSIS" id="synopsis"></textarea>
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="trailer" required="" placeholder="Lien Youtube Bande Annonce" id="ytb">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="margin-bottom: 50px;" >
                    <input class="input1" type="text" name="poster" required="" placeholder="Lien Poster" id="poster">
					<span class="shadow-input1"></span>
				</div>


               <div class="container-contact1-form-btn">
					<button class="contact1-form-btn" name="submit" value="1">
						<span>
							Ajouter le film
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>

            </form>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

function getData (id){
  console.log(id);
  const dataForm = fetch('https://api.themoviedb.org/3/movie/' + id + '?api_key=1b523a22be6bbcb7b260693e379e6889')
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

  const data2Form = fetch('https://api.themoviedb.org/3/movie/'+ id + '/videos?api_key=1b523a22be6bbcb7b260693e379e6889&language=fr-FR')
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

    const data3Form = fetch ('https://api.themoviedb.org/3/movie/' + id + '/credits?api_key=1b523a22be6bbcb7b260693e379e6889')
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


<?php 

if (isset($_GET['preload']) && !empty($_GET['preload'])){
    echo '<script>getData(\''.$_GET['preload'].'\');</script>';
}

?>


    <script>

$(document).ready(function () {
    $('input#getData_url').keyup(function(){

        $('#table-result').empty();

        var transmittedInput = $('input#getData_url').val();

        var table = document.getElementById('table-result'); 
        console.log($('#table-result').html);
        const dataForm = fetch('https://api.themoviedb.org/3/search/movie?api_key=1b523a22be6bbcb7b260693e379e6889&query='+transmittedInput)
            .then (result => result.json())
            .then (data => {
            for (var i = 0; i < data.results.length && i < 8; i++){
                $('#table-result').append("<a class='pl' href='./add.php?preload="+data.results[i].id+"'><li class='pl'><img class='pl' src='https://image.tmdb.org/t/p/w500/"+data.results[i].poster_path+"'/><h3 class='pl'>"+data.results[i].title+"</h3><p class='pl'>"+data.results[i].overview+"</p></li></a>");
            }
        });
    
    })       
})
</script>
</body>
</html>
