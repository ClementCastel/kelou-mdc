<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	require_once('includes/class-query.php');

	if ( !empty ( $_GET ) ) {
		if ( !empty ( $_GET['p'] ) ) {
			$post = $_GET['p'];
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
		<title>CMS</title>
		<meta charset="utf-8" />
		<link type="text/css" rel="stylesheet" href="./assets/css/main.css"/>
	</head>

	<body>

	<div>
	<nav id="sidebar">
	  <ul>
	    <a href="./index.php"><i class="fa fa-film icon" style="color: #FFFFFF;" aria-hidden="true"></i></a>
	    <i class="fa fa-television icon" style="color: #FFFFFF;" aria-hidden="true"></i>
	  </ul></nav>
	<div class="highbar">
	  <h4>KELOU MEDIACENTER - DEV EDIT</h4>
		<a href="./admin/add.php"><button class="Add-button">Add a movie</button></a>
	</div>
	<div class="divider">

		<?php foreach ( $posts_array as $post ) : ?>
			<div class="article" style="background-image: url(<?php echo $post->post_pic; ?>); background-size: cover; background-repeat: no-repeat;">
					<a href="./article.php?p=<?php echo $post->ID; ?>">
					<p class="name"><?php echo $post->post_title ?></p></a></div>
		<?php endforeach; ?>
	</div>
	</body>
</html>
