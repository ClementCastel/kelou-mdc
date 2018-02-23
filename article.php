<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	require_once('includes/class-query.php');

	if ( !empty ( $_GET ) ) {
		if ( !empty ( $_GET['p'] ) ) {
			$post = $_GET['p'];
		}

		if ( !empty ( $_GET['cat'] ) ) {
			$cat = $_GET['cat'];
		}
	}

	if ( empty ( $post ) && empty ( $cat ) ) {
		$posts_array = $query->all_posts();
	} elseif ( !empty ( $post ) ) {
		$posts_array = $query->post($post);
	} elseif ( !empty ( $cat ) ) {
		echo 'cat';
	}
?>

<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />
	</head>

	<body>
		<div>
			<h1><a href="./index.php">Retour à l'index</a></h1>
		</div>
		<?php foreach ( $posts_array as $post ) : ?>
			<div class="post">
				<h1><?php echo $post->post_title; ?></h1>
        <p><?php echo $post->post_date; ?></p>
        <p><?php echo $post->post_real; ?></p>
        <p><?php echo $post->post_actors; ?></p>
        <p><?php
				$kind = unserialize($post->post_kind);
				$skind = sizeof($kind);
				if ($skind == 1) {
					echo $kind[0];
				} elseif ($skind == 2) {
					echo ($kind[0].' / '.$kind[1]);
				} elseif ($skind == 3) {
					echo ($kind[0].' / '.$kind[1].' / '.$kind[2]);
				}
					//echo $kind[0]; ?> / <?php //echo $kind[1]; ?></p>
        <p><?php echo $post->post_duration; ?></p>
        <p><?php echo $post->post_language; ?></p>
        <p><?php echo $post->post_subs; ?></p>
				<p>Qualité: <?php echo $post->post_quality; ?></p>
        <p><?php echo $post->post_synopsis; ?></p>
        <p><?php echo $post->post_ba; ?></p>
				<img src="<?php echo $post->post_pic; ?>" />
			</div>
		<?php endforeach; ?>
	</body>
</html>
