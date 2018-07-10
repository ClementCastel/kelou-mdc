<?php
<<<<<<< HEAD
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
=======
require_once('config.php');
$id = $_GET['id'];
 ?>
>>>>>>> dev

<html>
<head>
  <title>Accueil</title>
  <meta charset="utf-8" />
</head>
<body>
  <a href="./index.php">Retour à l'index</a><br /><br />
  <?php
  if (isset($_GET['id'])){
  $conn = mysqli_connect(host, user,pass, db);

  $sql = "SELECT * FROM articles WHERE ID = '$id'";
  $result = mysqli_query($conn, $sql);

    while ($data = mysqli_fetch_assoc($result)){
      echo "TITRE: ".$data['title']."<br /><br />";
      echo "SOUS-TITRE: ".$data['subtitle']."<br /><br />";
      echo "CONTENU: ".$data['content']."<br /><br />";
      echo "DATE: ".$data['date']."<br /><br />";
      echo "NOTE: ".$data['note']."<br /><br />";
    }
  }
  ?>
</body>
</html>
