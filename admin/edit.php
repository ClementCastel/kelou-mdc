<?php
require_once('config.php');
$conn = mysqli_connect(host, user,pass, db);

if (!empty($_POST) && !empty($_GET['id'])){
  $id = $_GET['id'];

  $data[0] = $_POST['title'];
  $data[1] = $_POST['subtitle'];
  $data[2] = $_POST['content'];
  $data[3] = $_POST['note'];

  $query = "UPDATE articles
            SET title = '$data[0]', subtitle = '$data[1]', content = '$data[2]', note = '$data[3]'
            WHERE ID = $id
  ";

  $update = mysqli_query($conn, $query);

  if ($update){
    echo 'Article mis à jour ! <br />';
  } else {
    echo 'Une erreur est arrivée';
  }
}

if (!empty($_GET['id']) && $_GET['delete'] == 2){
  $id = $_GET['id'];

  $query = "DELETE FROM articles WHERE `id` = $id";

  $delete = mysqli_query($conn, $query);

  if ($delete){
    echo "L'article a bien été supprimé <br />";
    echo "<a href='../index.php'>Retour à l'acceuil</a>";
  } else{
    echo 'Une erreur est survenue lors de la suppression';
  }
}
 ?>

<html>
<head>
  <title>Page d'édition</title>
  <meta charset="utf-8" />
</head>
<body>
<?php if (!empty($_GET['id']) && empty($_GET['delete'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM articles WHERE ID = '$id'";
  $result = mysqli_query($conn, $sql);

    while ($data = mysqli_fetch_assoc($result)){;?>

<form method="post">
  <input type="text" placeholder="Titre" name="title" required value="<?php echo ($data['title']); ?>" /><br /><br />
  <input type="text" placeholder="Sous-titre" name="subtitle" required value="<?php echo ($data['subtitle']); ?>" /><br /><br />
  Contenu de l'article:<br />
  <textarea name="content" required><?php echo ($data['content']); ?></textarea><br /><br />
  1.<input type="radio" name="note" value="1" <?php if ($data['note'] == "1"){echo('checked');}else{}?>/><br /><br />
  2.<input type="radio" name="note" value="2" <?php if ($data['note'] == "2"){echo('checked');}else{}?>/><br /><br />
  3.<input type="radio" name="note" value="3" <?php if ($data['note'] == "3"){echo('checked');}else{}?>/><br /><br />
  <input type="submit" name="submit" value="Mettre à jour"/>
</form>


<?php }} else if (empty($_GET['id'])){
  $sql = "SELECT * FROM articles";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0){
    while ($data = mysqli_fetch_assoc($result)){
      echo ('<a href=../article.php?id='.$data['ID'].'>'.$data['title'].'</a> | <a href=edit.php?id='.$data['ID'].'>Editer</a> | <a href=edit.php?id='.$data['ID'].'&delete=1>Supprimer</a><br /><br />');
    }
  }
}
  if (!empty($_GET['id']) && $_GET['delete'] == 1){ ?>
    Voulez vous vraiment supprimer cet article ? <br /><br />
    <a href="edit.php?id=<?php echo ($_GET['id']);?>&delete=2"><button>Supprimer définitivement</button></a>
<?php  } ?>
</body>
</html>
