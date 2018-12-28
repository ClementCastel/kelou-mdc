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

    $txt = "";
    $mail = $_POST['mail'];
    $conn = mysqli_connect(host, user, pass, db);
    $query = "SELECT salt
              FROM users
              WHERE mail = \"$mail\"
              ";

    $result = mysqli_query($conn, $query);

    if ($result){
        while($data = mysqli_fetch_assoc($result)){

            $pass = encrypt($_POST['pass'],$data['salt']);
            
            $query = "SELECT ID
                      FROM users
                      WHERE pass = \"$pass\"
                      ";
            $idResult = mysqli_query($conn, $query);

            if ($idResult){
                while ($data = mysqli_fetch_assoc($idResult)){
                    $txt = "Vous portez l'ID : ".$data['ID'];
                }
            }
        }
    } else {
        echo "Une erreur est survenue. Merci de réessayer plus tard.";
    }
}

?>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <h1>LOGIN</h1>

    <?php if (isset($_POST['submit']) && !empty($_POST['submit'])){ 
        echo $txt;
    } else { ?>

    <form method="POST">
        <label>MAIL: </label><input type="text" id="mail" name="mail" required />
        <br/><br/>PASS: <label></label><input type="text" id="pass" name="pass" required />
        <br/><br/><input type="submit" id="submit" name="submit" required />
    </form>
    <?php } ?>
</body>
</html>