<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	require_once('includes/class-query.php');

	if ( !empty ( $_GET ) ) {
		if ( !empty ( $_GET['p'] ) ) {
			$post = $_GET['p'];
		}
	}

	if ( empty ( $post ) && empty ( $cat ) ) {
		$posts_array = $query->all_posts();
	} elseif ( !empty ( $post ) ) {
		$posts_array = $query->post($post);
	}
?>

<html>
<?php foreach ( $posts_array as $post ) : ?>
	<head>
		<title>Kelou MDC - <?php echo $post->post_title; ?></title>
		<meta charset="utf-8" />
		<link type="text/css" rel="stylesheet" href="./assets/css/main.css"/>
	</head>

	<body>
	<nav id="sidebar">
	  <ul>
	    <a href="./index.php"><i class="fa fa-film icon" style="color: #FFFFFF;" aria-hidden="true"></i></a>
	    <i class="fa fa-television icon" style="color: #FFFFFF;" aria-hidden="true"></i>
	  </ul></nav>
	<div class="highbar">
	  <h4>Kelou Mediacenter - <?php echo $post->post_title; ?></h4>
	</div>
	<div class="content">
	  <img src="<?php echo $post->post_pic; ?>" class="full"/>
	<div class="content">
	  <div class="barre-noire"></div>
	<div class="data">
		<div class="grey"><a class="txt">Date de sortie: <?php echo $post->post_date; ?></a></div>
	  <div class="dark"><a class="txt">Réalisateur: <?php echo $post->post_real; ?></a></div>

	  <div class="grey"><a class="txt">Genre: <?php		$kind = unserialize($post->post_kind);
						$skind = sizeof($kind);
						if ($skind == 1) {
							echo $kind[0];
						} elseif ($skind == 2) {
							echo ($kind[0].' / '.$kind[1]);
						} elseif ($skind == 3) {
							echo ($kind[0].' / '.$kind[1].' / '.$kind[2]);
						} ?></a></div>

	  <div class="dark"><a class="txt">Durée: <?php echo $post->post_duration; ?></a></div>

    <div class="grey"><a class="txt">Langues:&nbsp;&nbsp;&nbsp;&nbsp;	<?php if(preg_match("/FR/i", $post->post_language)) { ?><img src="./assets/images/FR.png" class="flag" />&nbsp;&nbsp;&nbsp; <?php }
		 if(preg_match("/EN/i", $post->post_language)) { ?><img src="./assets/images/UK.png" class="flag" />&nbsp;&nbsp;&nbsp;<?php }
		 if(preg_match("/ES/i", $post->post_language)) { ?><img src="./assets/images/ES.png" class="flag" /><?php } ?></a></div>

    <div class="dark"><a class="txt">Sous-titres:	<?php if(preg_match("/FR/i", $post->post_language)) { ?><img src="./assets/images/FR.png" class="flag" />&nbsp;&nbsp;&nbsp; <?php }
		 if(preg_match("/EN/i", $post->post_language)) { ?><img src="./assets/images/UK.png" class="flag" />&nbsp;&nbsp;&nbsp;<?php }
		 if(preg_match("/ES/i", $post->post_language)) { ?><img src="./assets/images/ES.png" class="flag" /><?php } ?></a></div>

    <div class="grey"><a class="txt">Qualité: <?php echo $post->post_quality; ?></a></div>
		<div class="dark"><a class="txt">+ d'infos: <a href="<?php echo $post->post_imdb ?>"><img src="./assets/images/IMDb.png" class="link"/></a>
			<a href="<?php echo $post->post_allocine ?>"><img src="./assets/images/Allocine.png" class="link"/></a>
			<a href="<?php echo $post->post_rt ?>"><img src="./assets/images/Rotten.png" class="link"/></a></a></div>
		<div class="synopsis"><p><i><b>Synopsis:</b></i><br /><br /><?php echo $post->post_synopsis; ?></p></div>
		<div class="trailer"><a class="txt" style="font-size: 25px;">Trailer:</a><br />
			<iframe width="853" height="480" src=<?php echo $post->post_ba; ?> frameborder="0" allowfullscreen></iframe></div>
		<?php endforeach; ?>
	</div>
	</div>
	</body>
</html>
