<?php 

require_once("./header.php");
require_once("./config.php");


if (isset($_POST['submit']) && !empty($_POST['submit'])){

$mail = $_POST['mail'];
$mail = addslashes($mail);

$conn = mysqli_connect(host, user, pass, db);

$query = "SELECT ID
          FROM users
          WHERE mail=\"$mail\"
          ";

$result = mysqli_query($conn, $query);


if ($result){
  $result = mysqli_fetch_row($result);

  if (!empty($result)){
    echo "<script>alert(\"Votre email est déjà inscrit. Veuillez vous connecter\");</script>";

  } else {
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


    //print_r($_POST);

    $pass = $_POST['pass'];
    $salt = sha1(rand()); //on génère un salt aléatoire (sous la forme : 37930e5a22de37cc9814ae72cd5932c494e447c2)
    $pass = encrypt($pass, $salt);

    $mail_link = sha1(rand());

    $data[0] = $_POST['name'];
    $data[1] = $_POST['mail'];
    $data[2] = $mail_link;
    $data[3] = $pass;
    $data[4] = $salt;

 
    $query = "
    INSERT INTO
    `users` (
      `name`,
      `mail`,
      `mail_link`,
      `pass`,
      `salt`
    )
  VALUES
    (
      '$data[0]',
      '$data[1]',
      '$data[2]',
      '$data[3]',
      '$data[4]'
    )";

    $insert = mysqli_query($conn,$query); //éxecution de la query

    if ($insert) {
         echo '<script>alert("Un email pour vérifier votre adresse mail a été envoyé");</script>'; //Si la query a été éxecutée correctement alors on affiche un message de confirmation
         header("./index.php");

         mail($_POST['mail'], "[LOGPASS] Confirmation de votre mail", "Veuillez cliquer sur le lien suivant pour valider votre email :
              http://localhost/LOGIN-PASSWORD/verify.php?mail_link=".$mail_link."");
    } else {
         echo 'Il y a eu une erreur !'; //Dans le cas contraire, un message d'alerte
         var_dump($conn->error); //accompagné de l'erreur.
    }
}
}
}
?>


<html lang="en">
<head>
	<title>Contact V1</title>
	<meta charset="UTF-8">
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
					S'inscrire
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="name" placeholder="Name" required>
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input1" type="text" name="mail" placeholder="Email" required>
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="password" name="pass" placeholder="Mot de passe" required>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" name="submit" value="1">
						<span>
							S'inscire
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
      </form>
      <a style="margin-top: 30px;margin-left: 30%;border: 2px solid black; padding: 20px;" href="http://kmdc.kelou.fr/login.php" >Se Connecter</a>
		</div>
	</div>
</body>
</html>
