<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
  $modeEdition = 0;
  
	require_once('../includes/class-query.php');
  require_once('../includes/class-db.php');

  if ( !empty ( $_GET ) ) {
		if ( !empty ( $_GET['p'] ) ) {
			$post = $_GET['p'];
      $modeEdition = 1;
		}
	}

	if ( empty ( $post )) {
		$posts_array = $query->all_posts();
	} elseif ( !empty ( $post ) ) {
		$posts_array = $query->post($post);
	}
 ?>

<html>
<head>

  <title>Edition d'article</title>
  <meta charset="utf-8" />

</head>
<body>
      <div><h1>Mode édition</h1></div>
<!-- - - - - MODE EDITION : 0 - - - - -->

  <?php if($modeEdition == 0){ ?>

  <?php foreach ( $posts_array as $post ) : ?>

    <div>
      <h3><?php echo $post->post_title; ?> | <a href="?p=<?php echo $post->ID; ?>">Editer</a></h3>
    </div>
  <?php endforeach; }?>

<!-- - - - - MODE EDITION : 1 - - - - -->

<?php if ($modeEdition == 1) { ?>

  <?php foreach ( $posts_array as $post ) : ?>

  <div>
  <form method="post">
    <p>ID: <input type="text" value="<?php echo $post->ID; ?>" /></p>
    <p>Titre : <input type="text" name="post_title" value="<?php echo $post->post_title; ?>" /></p>
    <p>Date : <input type="text" name="post_date" value="<?php echo $post->post_date; ?>" /></p>
    <p>Réalisateur : <input type="text" name="post_real" value="<?php echo $post->post_real; ?>" /></p>
    <p>Acteurs : <input type="text" name="post_actors" value="<?php echo $post->post_actors; ?>" /></p>
    <p>Durée : <input type="text" name="post_duration"  value="<?php echo $post->post_duration; ?>"/></p>
    <p>Langues : <input type="text" name="post_language"  value="<?php echo $post->post_language; ?>"/></p>
    <p>Sous-titres : <input type="text" name="post_subs"  value="<?php echo $post->post_subs; ?>"/></p>
    <p>Synopsis : <input type="text" name="post_synopsis"  value="<?php echo $post->post_synopsis; ?>"/></p>
    <p>Bande-Annonce : <input type="text" name="post_ba"  value="<?php echo $post->post_ba; ?>"/></p>
    <p>
      <input type="submit" value="Submit" />
    </p>
  </form>

  <div>
    <h3><a href="#"><font color="red">Supprimer</font></a></h3>
  </div>

  <?php endforeach; }?>

</body>
</html>
