<?php 

require_once("./config.php");


if (isset($_POST['submit']) && !empty($_POST['submit'])){


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


    print_r($_POST);

    $pass = $_POST['pass'];
    $salt = sha1(rand()); //on génère un salt aléatoire (sous la forme : 37930e5a22de37cc9814ae72cd5932c494e447c2)
    $pass = encrypt($pass, $salt);

    $mail_link = sha1(rand());

    $data[0] = $_POST['name'];
    $data[1] = $_POST['mail'];
    $data[2] = $mail_link;
    $data[3] = $pass;
    $data[4] = $salt;

    $conn = mysqli_connect(host, user, pass, db);
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


?>


<html>
<head>
    <title>LOGIN - </title>
    <meta charset="utf-8" />
</head>
<body>
    <h1>LOGIN FORM</h1>


    <form method="POST">
        <li><label>NOM : </label><input type="text" id="name" name="name" required /></li><br/>
        <li><label>MAIL : </label><input type="text" id="mail" name="mail" required /></li><br/>
        <li><label>PASS : </label><input type="text" id="pass" name="pass" required /></li><br/>
        <li><input type="submit" id ="submit" name="submit" /></li>
    
    
    </form>


</body>
</html>