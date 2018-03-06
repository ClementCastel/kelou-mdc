<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	if ( !empty ( $_POST ) ) {
		require_once('../includes/class-insert.php');

		if ( $insert->post($_POST) ) {
			echo '<p>Data inserted successfully!</p>';
		}
	}
?>

<html>
<head>
  <meta charset="UTF-8">
  <title>Ajouter un film</title>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

  <div class="form">
    <!-- - PANNEAU GAUCHE - -->
  <div class="info">
    <h2>Ajouter un film</h2>
    <i class="icon ion-ios-film-outline" aria-hidden="true"></i>
  </div>
    <!-- - PANNEAU DROITE (formulaire) - -->
  <form method="post" class="addF" enctype="multipart/form-data">
    <h2>Ajouter un film</h2>
    <ul class="noBullet">
      <!-- - TITRE - -->
      <li><input type="text" class="inputFields" name="post_title" placeholder="Titre" required/></li>

      <!-- - DATE DE SORTIE - -->
      <li><input type="text" class="inputFields" name="post_date" placeholder="Date de sortie" required/></li>

      <!-- - REALISATEUR - -->
      <li><input type="text" class="inputFields" name="post_real" placeholder="Réalisateur" required/></li>

      <!-- - GENRE - -->
      <li style="column-width: 12rem">
        <label class="container">Animation
            <input type="checkbox" name="post_kind[]" value="animation">
            <span class="checkmark"></span>
        </label>
        <label class="container">Biopic
          <input type="checkbox" name="post_kind[]" value="biopic">
          <span class="checkmark"></span>
        </label>
        <label class="container">Comédie
          <input type="checkbox" name="post_kind[]" value="comedie">
          <span class="checkmark"></span>
        </label>
        <label class="container">Documentaire
          <input type="checkbox" name="post_kind[]" value="documentaire">
          <span class="checkmark"></span>
        </label>
        <label class="container">Drame
          <input type="checkbox" name="post_kind[]" value="drame">
          <span class="checkmark"></span>
        </label>
        <label class="container">Fantastique / S-F
          <input type="checkbox" name="post_kind[]" value="fantastique">
          <span class="checkmark"></span>
        </label>
        <label class="container">Horreur
          <input type="checkbox" name="post_kind[]" value="horreur">
          <span class="checkmark"></span>
        </label>
        <label class="container">Historique
          <input type="checkbox" name="post_kind[]" value="historique">
          <span class="checkmark"></span>
        </label>
        <label class="container">Policier / Thriller
          <input type="checkbox" name="post_kind[]" value="policier">
          <span class="checkmark"></span>
        </label>
        <label class="container">Aventure
          <input type="checkbox" name="post_kind[]" value="aventure">
          <span class="checkmark"></span>
        </label>

      </li>

      <!-- - DUREE - -->
      <li><input type="text" class="inputFields" name="post_duration" placeholder="Durée" required/></li>

      <!-- - LANGUES - -->
      <li><input type="text" class="inputFields" name="post_language" placeholder="Langue(s)" required/></li>

      <!-- - SUBS - -->
      <li><input type="text" class="inputFields" name="post_subs" placeholder="Sous-titre(s)" required/></li>

      <!-- - QUALITE - -->
      <li style="column-width: 7rem; padding-left: 2.5rem; padding-top: 1rem; padding-bottom: 1rem;" >
        <label class="containerQ">- 720p
            <input type="radio" name="post_quality" value="- 720p">
            <span class="checkmarkQ"></span>
        </label>
        <label class="containerQ"> 720p
            <input type="radio" name="post_quality" value="720p">
            <span class="checkmarkQ"></span>
        </label>
        <label class="containerQ">1080p
          <input type="radio" name="post_quality" value="1080p">
          <span class="checkmarkQ"></span>
        </label>
      </li>

			<!-- - IMDb - -->
      <li><input type="url" class="inputFields" name="post_imdb" placeholder="imdb link" required/></li>

			<!-- - Allocine - -->
			<li><input type="url" class="inputFields" name="post_allocine" placeholder="allocine link" required/></li>

			<!-- - Rottent Tomatoes - -->
			<li><input type="url" class="inputFields" name="post_rt" placeholder="rotten tomatoes link" required/></li>

      <!-- - SYNOPSIS - -->
      <li><input type="text" class="inputFields" name="post_synopsis" placeholder="Synopsis" required/></li>

      <!-- - BANDE-ANNONCE - -->
      <li><input type="text" class="inputFields" name="post_ba" placeholder="Lien de la Bande-Annonce" required/></li>

      <!-- - MINIATURE - -->
			<input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
      <li><input type="file" name="post_pic" /></li>

      <!-- - SUBMIT - -->
      <li id="center-btn">
        <input type="submit" id="join-btn" value="Submit">
      </li>
    </ul>
  </form>

</div></body></html>
