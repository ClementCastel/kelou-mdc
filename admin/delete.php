<?php
require_once('../config.php');
$conn = mysqli_connect(host, user,pass, db);

if (empty($_GET['id'])){
  header('Location: index.php');
}

if (!empty($_GET['id']) && !empty($_GET['confirm'])){
  $id = $_GET['id'];

  $query = "DELETE FROM movies WHERE `id` = $id";

  $delete = mysqli_query($conn, $query);

  if ($delete){
    echo "L'article a bien été supprimé <br />";
    echo "<a href='../index.php'>Retour à l'acceuil</a>";
  } else{
    echo 'Une erreur est survenue lors de la suppression';
  }}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-delete-page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
</head>

<body style="background-color:rgb(29,29,29);">
    <div style="width:100%;height:100%;margin:0;padding:0;">
        <div class="row" style="background-color:rgb(21,21,21);margin:0;padding:0;height:65px;">
            <div class="col-lg-1" style="width:70px;height:80px;margin:0;padding:0;"><i class="fa fa-film" style="padding:0;color:rgb(255,255,255);font-size:40px;margin-top:10px;margin-left:15px;"></i></div>
            <div class="col-lg-10" style="margin:0;padding:0;">
                <p class="text-center" style="color:rgb(204,7,30);font-family:'Barlow Condensed', sans-serif;font-size:40px;margin-bottom:0;padding:0;font-weight:bold;font-style:italic;">KMDC - ADMIN - Delete a movie</p>
            </div>
            <div class="col-lg-1" style="margin:0;padding:0;width:125px;flex:0;">
                <p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:125px;">Gérer les films</p>
                <p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:115px;">Déconnexion</p>
            </div>
        </div>
        <div style="width:70%;margin-left:15%;margin-right:15%;margin-top:70px;margin-bottom:70px;">
            <p style="margin:0;padding:0;color:rgb(255,255,255);font-size:30px;font-family:'Barlow Condensed', sans-serif;">VOULEZ-VOUS VRAIMENT SUPPRIMER CE FILM ?</p>
            <div style="margin:0;padding:0;background-color:#ccc;border-radius:5px;">

            <?php if(!empty($_GET['id']) && empty($_GET['confirm'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM movies WHERE ID = '$id'";
                $result = mysqli_query($conn, $sql);

                  while ($data = mysqli_fetch_assoc($result)){; ?>

                <p style="font-size:35px;color:rgb(0,0,0);margin-top:25px;font-family:'Barlow Condensed', sans-serif;font-weight:bold;font-style:italic;margin-left:40px;"><?php echo $data['title']; ?></p>
            </div><a href="./delete.php?id=<?php echo $data['ID']; ?>&confirm=1"><button class="btn btn-light" type="button" style="margin-top:30px;margin-right:30%;margin-left:30%;width:40%;height:50px;font-size:20px;font-weight:bold;color:rgb(204,7,30);font-family:'Barlow Condensed', sans-serif;">SUPPRIMER DEFINITIVEMENT</button><a></a></div>
    </div>

    <?php  }}
        ?>

        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>