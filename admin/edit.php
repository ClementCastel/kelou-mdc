<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	require_once('../includes/class-query.php');
	$conn = new mysqli('localhost', 'root', '', 'kmdc');

	if ( !empty ( $_GET ) ) {
		if ( !empty ( $_GET['id']) ) {
			$post = $_GET['id'];
      $id = $_GET['id'];
		}
	}

	if ( empty ( $post ) ) {
		$posts_array = $query->all_posts();
	} elseif ( !empty ( $post ) ) {
		$posts_array = $query->post($post);
	}


if (!empty($_GET['edit'])){
if ($_GET['edit'] == 1){
if (!empty($_POST)){
  $data[0] = addslashes($_POST['post_title']);
  $data[1] = addslashes($_POST['post_date']);
  $data[2] = addslashes($_POST['post_real']);
  $data[4] = addslashes($_POST['post_duration']);
  $data[5] = addslashes($_POST['post_language']);
  $data[6] = addslashes($_POST['post_subs']);
  $data[7] = $_POST['post_imdb'];
  $data[8] = $_POST['post_allocine'];
  $data[9] = $_POST['post_rt'];
  $data[10] = addslashes($_POST['post_synopsis']);
  $data[11] = addslashes($_POST['post_ba']);


  $query = "UPDATE posts
            SET post_title = '$data[0]', post_date = '$data[1]', post_real = '$data[2]', post_duration = '$data[4]', post_language = '$data[5]', post_subs = '$data[6]', post_imdb = '$data[7]', post_allocine = '$data[8]', post_rt = '$data[9]', post_synopsis = '$data[10]', post_ba = '$data[11]'
            WHERE ID = $id
  ";

	if ($conn->query($query) === TRUE) {
	echo "Record updated successfully";
} else {
	echo "Error updating record: " . $conn->error;
}}}}

if (!empty($_GET['delete']) && !empty($_GET['id'])){

		$query = "DELETE FROM posts
		 				 WHERE ID = $id
		";

		if ($conn->query($query) === TRUE) {
				echo "Suppression réussie";
		} else {
			echo "raté" . $conn->error;
		}

}

?>

<html>
  <head>
    <title>KMDC - EDIT</title>
    <meta charset="utf-8" />
  </head>
  <body>
    <p><a href="edit.php">RETOUR</a></p>
    <div class="list">
      <?php foreach ( $posts_array as $post ) : ?>
  					<a href="../article.php?p=<?php echo $post->ID; ?>">
  					<p class="name"><?php echo $post->post_title ?></a> || <a href="./edit.php?id=<?php echo $post->ID; ?>&edit=1" >EDIT</a> || <a href="./edit.php?id=<?php echo $post->ID; ?>&edit=2"> DELETE </a></p>

            <?php if (!empty($_GET['edit']) && $_GET['edit'] == 1) { ?>
                <form method="post" enctype="multipart/form-data" action="edit.php?id=<?php echo $post->ID?>&edit=1">
                    <input type="text" name="post_title" value="<?php echo $post->post_title; ?>" required /><br /><br />
                    <input type="text" name="post_date" value="<?php echo $post->post_date; ?>" required /><br /><br />
                    <input type="text" name="post_real" value="<?php echo $post->post_real; ?>" required /><br /><br />
                    <input type="text" name="post_duration" value="<?php echo $post->post_duration; ?>" required /><br /><br />
                    <input type="text" name="post_language" value="<?php echo $post->post_language; ?>" required /><br /><br />
                    <input type="text" name="post_subs" value="<?php echo $post->post_subs; ?>" required /><br /><br />
                    <input type="text" name="post_imdb" value="<?php echo $post->post_imdb; ?>" required /><br /><br />
                    <input type="text" name="post_allocine" value="<?php echo $post->post_allocine; ?>" required /><br /><br />
                    <input type="text" name="post_rt" value="<?php echo $post->post_rt; ?>" required /><br /><br />
                    <input type="text" name="post_synopsis" value="<?php echo $post->post_synopsis; ?>" required /><br /><br />
                    <input type="text" name="post_ba" value="<?php echo $post->post_ba; ?>" required /><br /><br />
                    <input type="submit" value="Modifier"/>
                </form>
            <?php } else if (!empty($_GET['edit']) && $_GET['edit'] == 2){ ?>

								<h2> Voulez vous vraiment supprimer l'article: </h2>
								<h4>	<a href="../article.php?p=<?php echo $post->ID; ?>"><?php echo $post->post_title; ?></a>  ?</h4>

								<br /><button><a href="./edit.php?id=<?php echo $post->ID; ?>&delete=1">Supprimer</a></button>

					<?php }?>

  		<?php endforeach; ?>
    </div>
  </body>
</html>
