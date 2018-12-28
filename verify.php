<?php 

require_once("http://kmdc.kelou.fr/header.php");
require_once("http://kmdc.kelou.fr/config.php");

$ok = false;
$name ="";
$mail ="";

if (isset($_GET['mail_link']) && !empty($_GET['mail_link'])) {
    $mail_link = $_GET['mail_link'];

    $conn = mysqli_connect(host, user, pass, db);
    $query = "SELECT name, mail
              FROM users
              WHERE mail_link = \"$mail_link\"
    ";

    $result = mysqli_query($conn, $query);

    if ($result){

        while($data = mysqli_fetch_assoc($result)){
            $name = $data['name'];
            $mail = $data['mail'];
        }

        if (mysqli_num_rows($result) == 1){
            $query = "UPDATE users
                      SET mail_confirm = \"1\"
                      WHERE mail_link = \"$mail_link\"";
            $insert = mysqli_query($conn, $query);
            if ($insert){
                $ok = true;
            } else {
                $ok = false;
            }
        }
    } else {
        echo "Une erreur est survenue. Veuillez réessayer plus tard.";
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
				<span class="contact1-form-title">
					Vérification Email
				</span>

                    <?php if ($ok) {?>

                    <p><?php echo $name; ?> vient de vérifier son email (<?php echo $mail; ?>). Merci !</p><br/><a href="http://kmdc.kelou.fr/login.php">Se Connecter</a>
                    <?php 
                    } else {
                        echo "<script>alert(\"Une erreur est survenue, merci de réessayer plus tard.\");</script>";
                    } ?>

		</div>
	</div>
</body>
</html>