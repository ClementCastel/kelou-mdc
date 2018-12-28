<?php
session_start();

if(isset($_SESSION['connected']) && $_SESSION['connected'] == 1) {
    header('Location: http://kmdc.kelou.fr/index.php');
}
require_once("./config.php");
require_once("./header.php");




$step = 0; //entier permettant de savoir à quel stade on s'est arreté
       //et afficher une erreur ou continuer.

if (isset($_POST['submit']) && !empty($_POST['submit'])){

    if (isset($_POST['mail']) && !empty($_POST['mail'])){
        $conn = mysqli_connect(host, user, pass, db);
        
        $mail = $_POST['mail'];
        $mail = addslashes($mail);

        $query = "SELECT ID
                  FROM users
                  WHERE mail = \"$mail\"
                  ";
        
        $result = mysqli_query($conn, $query);
        if ($result){
            $result = mysqli_fetch_row($result);

            if (!empty($result)){
                 $step = 2;
            } else {
                $step = 3; //mail non reconnu
            }
        }

    }


if ($step == 2){


    /*
    * Encrypte un mot de passe avec salt + 2*hash
    * @ param pass le mot de passe à crypter
    * @ param salt le salt qui sera retourné (à l'origine une chaine vierge)
    */

    function encrypt (String $pass, String $salt) {
        $pass = $pass."_".$salt; //on concatene le mot de passe clair et le salt
        $pass = sha1($pass); //on hash le pass+salt

        return $pass;
    }

    $txt = "";
    $mail = $_POST['mail'];
    $conn = mysqli_connect(host, user, pass, db);
    $query = "SELECT salt
              FROM users
              WHERE mail = \"$mail\"
              ";

    $result = mysqli_query($conn, $query);

    if ($result){
        $data = mysqli_fetch_row($result);

        if(!empty($data)){
            $pass = encrypt($_POST['pass'],$data[0]);
            
            $query = "SELECT *
                      FROM users
                      WHERE pass = \"$pass\"
                      ";

            $idResult = mysqli_query($conn, $query);

            if ($idResult){
                $data = mysqli_fetch_row($idResult);

                if (!empty($data)){
                    if ($data[3] == 1){ //email confirmé
                        $_SESSION['connected'] = 1;
                        $_SESSION['ID'] = $data[0];
                        $_SESSION['name'] = $data[1];
                        echo('<script>window.location.replace("http://kmdc.kelou.fr/index.php");</script>');
                    } else {
                        echo "<script>alert(\"Email non confirmé. Veuillez vérifier votre client mail et cliquer sur le lien reçu afin de 
                        valider votre email et pouvoir vous connecter. Merci\");</script>";
                    }
                } else {
                    echo '<script>alert("Le mot de passe entré est mauvais. Veuillez réessayer.");</script>';
                }
            }
        }
    }
} else if ($step == 3) {
    echo "<script>alert(\"Email non reconnu, vous êtes-vous bien inscrit ?\");</script>";

} else {
    echo "<script>Une erreur est survenue. Merci de réessayer plus tard.</script>";
}
}
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/register.util.css">
	<link rel="stylesheet" type="text/css" href="css/register.main.css">
<!--===============================================================================================-->
</head>
<body>
    <div class="contact1">
		<div class="container-contact1">

			<form class="contact1-form validate-form" autocomplete="off" method="POST">
				<span class="contact1-form-title">
					Se Connecter
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
                    <input class="input1" type="email" name="mail" placeholder="Email" required
                     value="<?php if ($step == 2) {echo $_POST['mail']; } ?>"  >
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input1" type="password" name="pass" placeholder="Mot de passe" required>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" name="submit" value="1">
						<span>
							Se Connecter
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
            </form>
            <a style="margin-top: 30px;margin-left: 35%;border: 2px solid black; padding: 20px;" href="http://kmdc.kelou.fr/register.php" >S'inscrire</a>
        </div>
	</div>
</body>
</html>