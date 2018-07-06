<?php
require_once('config.php');
$id = $_GET['id'];
 ?>

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
