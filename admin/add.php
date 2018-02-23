
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
		<title>Insert Post</title>
	</head>
	<body>
		<form method="post">
			<p>Titre : <input type="text" name="post_title" /></p>
			<p>Date : <input type="text" name="post_date" /></p>
			<p>Réalisateur : <input type="text" name="post_real" /></p>
			<p>Acteurs : <input type="text" name="post_actors" /></p>
			<p>Genre : <input type="checkbox" name="post_kind[]" value="animation" /> animation
				<input type="checkbox" name="post_kind[]" value="biopic" /> biopic
				<input type="checkbox" name="post_kind[]" value="comedie" /> comedie
				<input type="checkbox" name="post_kind[]" value="documentaire" /> documentaire
				<input type="checkbox" name="post_kind[]" value="drame" /> drame
				<input type="checkbox" name="post_kind[]" value="fantastique" /> fantastique
				<input type="checkbox" name="post_kind[]" value="horreur" /> horreur
				<input type="checkbox" name="post_kind[]" value="historique" /> historique
				<input type="checkbox" name="post_kind[]" value="policier" /> policier
				<input type="checkbox" name="post_kind[]" value="aventure" /> aventure
			</p>
			<p>Durée : <input type="text" name="post_duration" /></p>
			<p>Langues : <input type="text" name="post_language" /></p>
			<p>Sous-titres : <input type="text" name="post_subs" /></p>
			<p>
				<label for="quality"><input type="radio" name="post_quality" value="- 720p" />- 720p</label>
				<label for="quality"><input type="radio" name="post_quality" value="720p" />720p</label>
				<label for="quality"><input type="radio" name="post_quality" value="1080p" />1080p</label>
			</p>
			<p>Synopsis : <input type="text" name="post_synopsis" /></p>
			<p>Bande-Annonce : <input type="text" name="post_ba" /></p>
				<input type="submit" value="Submit" />
			</p>
		</form>
	</body>
</html>
