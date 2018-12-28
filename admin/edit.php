<?php 



set_include_path(get_include_path().";"."C:/wamp64/www/LOGIN-PASSWORD/");

require_once("../config.php");
require_once("../header.php");

if (!isset($_SESSION['connected']) || empty($_SESSION['connected'])) header('Location: ../login.php');
$conn = mysqli_connect(host, user,pass, db); //connection à la base de données

if (isset($_GET['uid']) && !empty($_GET['uid'])){
    $UID = $_GET['uid'];
} else {
    header("Location: index.php");
}

if (isset($_POST['submit'])){ //vérification que le formulaire a bien été envoyé
$UID = $_GET['uid'];
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

$kind = $_POST['kind'];
$fkind = null; //fkind = finalKind = valeur (String) qui sera transmise à la base de données
$sofKind = count($kind); //sof = size of; valeur = nombre de catégories cochées + 1 (tableau indexé à partir de 0)

for ($i = 0; $i < count($kind); $i++){
    $fkind = $fkind.$kind[$i].", ";
}


  $query = "UPDATE `movies` 
  SET `title` = '$title',
  `date` = '$date',
  `film_director` = '$real',
  `actors` = '$actors',
  `duration` = '$duration',
  `languages` = '$languages',
  `subs` = '$subs',
  `quality` = '$quality',
  `synopsis` = '$synopsis',
  `ytb` = '$trailer',
  `poster` = '$poster',
  `kind` = '$fkind'
  WHERE UID='$UID'";

  $insert = mysqli_query($conn,$query); //éxecution de la query

  if ($insert) {
    echo '<script>alert("Film modifié !");</script>'; //Si la query a été éxecutée correctement alors on affiche un message de confirmation
  } else {
    echo 'Il y a eu une erreur !'; //Dans le cas contraire, un message d'alerte
    var_dump($conn->error); //accompagné de l'erreur.
  }
}

if (isset($_GET['uid']) && !empty($_GET['uid'])){
    $UID = $_GET['uid'];

    $query = "SELECT *
              FROM movies
              WHERE UID='$UID'
              ";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        $data = mysqli_fetch_all($result);
    } else {
        echo("<script>alert('Une erreur est survenue. Veuillez réessayer plus tard.');</script>");
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
					Modifier : <?php echo $data[0][3]; ?>
				</span>
            </form>
            <form class="contact1-form validate-form" autocomplete="off" method="POST">
				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input value="<?php echo $data[0][3]; ?>" class="input1" type="text" name="title" required="" placeholder="Titre" autocomplete="off" id="title" required>
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input value="<?php echo $data[0][4]; ?>" class="input1" type="text" name="date" required="" placeholder="Date" autocomplete="off" id="date">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input value="<?php echo $data[0][5]; ?>" class="input1" type="text" name="real" required="" placeholder="Réalisateur" autocomplete="off" id="real">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input value="<?php echo $data[0][6]; ?>" class="input1" type="text" name="actors" required="" placeholder="Acteurs" autocomplete="off" id="actors">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input value="<?php echo $data[0][7]; ?>" class="input1" type="text" name="duration" required="" placeholder="Durée" autocomplete="off" id="duration">
					<span class="shadow-input1"></span>
				</div>


                <span class="contact1-form-title" style="margin-top: 50px;">
					Genre.s :
                </span>
                
                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Animation" type="checkbox" id="checkbox1" <?php if (preg_match("/Animation/", $data[0][8])) {echo "checked";}?>/>
                    <span>Animation</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Fantastique" type="checkbox" id="checkbox2"  <?php if (preg_match("/Fantastique/", $data[0][8])) {echo "checked";}?>/>
                    <span>Fantastique</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Biopic" type="checkbox" id="checkbox3"  <?php if (preg_match("/Biopic/", $data[0][8])) {echo "checked";}?>/>
                    <span>Biopic</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Horreur" type="checkbox" id="checkbox4"  <?php if (preg_match("/Horreur/", $data[0][8])) {echo "checked";}?>/>
                    <span>Horreur</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Comédie" type="checkbox" id="checkbox5"  <?php if (preg_match("/Comédie/", $data[0][8])) {echo "checked";}?>/>
                    <span>Comédie</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Historique" type="checkbox" id="checkbox6"  <?php if (preg_match("/Historique/", $data[0][8])) {echo "checked";}?>/>
                    <span>Historique</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Documentaire" type="checkbox" id="checkbox7"  <?php if (preg_match("/Documentaire/", $data[0][8])) {echo "checked";}?>/>
                    <span>Documentaire</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Police / Thriller" type="checkbox" id="checkbox8"  <?php if (preg_match("/Police \/ Thriller/", $data[0][8])) {echo "checked";}?>/>
                    <span>Police / Thriller</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Drame" type="checkbox" id="checkbox9"  <?php if (preg_match("/Drame/", $data[0][8])) {echo "checked";}?>/>
                    <span>Drame</span>
                </label><br/>

                <label class="pure-material-checkbox">
                    <input name="kind[]" value="Aventure" type="checkbox" id="checkbox10"  <?php if (preg_match("/Aventure/", $data[0][8])) {echo "checked";}?>/>
                    <span>Aventure</span>
                </label><br/>

                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="margin-top: 50px;">
                    <input value="<?php echo $data[0][9]; ?>" class="input1" type="text" name="languages" required="" placeholder="Langues">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input value="<?php echo $data[0][10]; ?>" class="input1" type="text" name="subs" required="" placeholder="Sous-Titres">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input value="<?php echo $data[0][11]; ?>" class="input1" type="text" name="quality" required="" placeholder="Qualité">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <textarea class="input1" type="text" name="synopsis" required="" placeholder="SYNOPSIS" id="synopsis"> <?php echo $data[0][12]; ?></textarea>
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input value="<?php echo $data[0][13]; ?>" class="input1" type="text" name="trailer" required="" placeholder="Lien Youtube Bande Annonce" id="ytb">
					<span class="shadow-input1"></span>
                </div>
                
                <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="margin-bottom: 50px;" >
                    <input value="<?php echo $data[0][14]; ?>" class="input1" type="text" name="poster" required="" placeholder="Lien Poster" id="poster">
					<span class="shadow-input1"></span>
				</div>


               <div class="container-contact1-form-btn">
					<button class="contact1-form-btn" name="submit" value="1">
						<span>
							Modifier le film
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>

            </form>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
