<?php 

set_include_path(get_include_path().";"."C:/wamp64/www/LOGIN-PASSWORD/");

require_once("../config.php");
require_once("../header.php");

if (!isset($_SESSION['connected']) || empty($_SESSION['connected'])) header('Location: ../login.php');
$conn = mysqli_connect(host, user,pass, db); //connection à la base de données

if (isset($_GET['uid']) && !empty($_GET['uid'])){
    $UID = $_GET['uid'];
} else {
    header("Location: index.php");
}

$UID = $_GET['uid']; //scope mal géré

$query = "SELECT UID, title
          FROM movies
          WHERE UID='$UID'
          ";

$data;
$result = mysqli_query($conn, $query);
if (!$result || mysqli_num_rows($result) != 1) {
    echo "<script>alert('Une erreur est survenue. Veuillez réessayer plus tard');</script>";
} else {
    $data = mysqli_fetch_all($result);
    if (isset($_GET['confirm']) && $_GET['confirm'] == 1){
        $query = "DELETE FROM movies
                  WHERE UID='$UID'
                  ";

        $delete = mysqli_query($conn, $query);
        if ($delete){
            echo "<script>alert('Votre film a été supprimé. Retour à votre index');</script>";
            header("Location: ../index.php");
        } else {
            echo "<script>alert('Une erreur est survenue. Merci de réessayer plus tard.');</script>";
            var_dump($conn->error);
        }

    }
}


?>
    <style>
    h1 {
        font-family: "Dosis", arial, tahoma, verdana;
        color: white;
        font-size: 40px;
    }

    a {
        font-family: "Dosis", arial, tahoma, verdana;
    }
    
    
    </style>
    <?php if (isset($data)){?>
    <h1 style="margin-top: 100px; margin-left: 100px;">Êtes-vous sûr de vouloir supprimer le film : <?php echo $data[0][1]; ?></h1>
    <a style="margin-left: 100px; margin-top: 20px; font-size: 40px; height: 60px; width: 240px; line-height:50px;" class="btn header" href="http://kmdc.kelou.fr/admin/delete.php?uid=<?php echo $UID; ?>&confirm=1">Continuer</i></a>
    <?php } ?>