<?php

require_once("./config.php");
require_once("recaptchalib.php");


$secret = "6LfiuGQUAAAAAJoecnRfld7Z4KujtpP804sDR8xJ";
$response = null;
$reCaptcha = new ReCaptcha($secret);

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) header("Location: index.php");

function sanitize ($stringInput) {
  $strinInput = strip_tags($stringInput);
  $strinInput = str_replace(" ", "", $stringInput);
  $strinInput = addslashes($strinInput);
  return $strinInput;
}

function connectUser ($mail, $pass){
  $pass = md5($pass);
  $conn = mysqli_connect(host, user, pass, db);

  $query = "SELECT * FROM users WHERE email='$mail' AND passwords='$pass'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1){
      $data = mysqli_fetch_assoc($result);

      $_SESSION['logged'] = true;
      $_SESSION['id'] = $data['ID'];
      $_SESSION['username'] = $data['username'];
      $_SESSION['mail'] = $data['email'];
      $_SESSION['date'] = $data['register_date'];
      header("Location: index.php");
  } else {
    echo "Une erreur est survenue";
  }

}


if (isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"])) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success) {

if (isset($_POST['mail']) && isset($_POST['passwords']) && !empty($_POST['mail'])){

    $mail = sanitize($_POST['mail']);
    $pass = sanitize($_POST['passwords']);
    connectUser($mail, $pass);

}
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/slate/bootstrap.min.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body style="background-color:rgb(29,29,29);">
    <div class="content" style="width:100%;height:100%;margin:0;padding:0;">
        <div class="row" style="background-color:rgb(21,21,21);margin:0;padding:0;height:65px;">
            <div class="col-lg-12" style="margin:0;padding:0;">
                <p class="text-center" style="color:rgb(204,7,30);font-family:'Barlow Condensed', sans-serif;font-size:40px;margin-bottom:0;padding:0;font-weight:bold;font-style:italic;">KMDC - LOGIN</p>
            </div>
        </div>
        <div style="width:440px;height:545px;margin-left:710px;margin-right:710px;margin-top:137px;border:3px solid rgb(0,0,0);border-radius:25px;margin-bottom:137px;">
            <div style="margin:0;padding:0;height:70px;width:100%;">
                <p style="color:rgb(255,255,255);font-size:50px;font-family:'Barlow Condensed', sans-serif;font-weight:bold;font-style:normal;margin:0;padding:0;margin-left:30px;margin-right:30px;margin-top:20px;">&gt;&gt; &nbsp; LOGIN</p>
            </div>
            <form style="margin-left:30px;margin-right:30px;" method="post">
                <div style="margin:0;padding:0;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;height:70px;width:100%;margin-top:40px;"><input class="form-control" type="text" placeholder="username" name="mail" style="width:100%;height:100%;margin:0;padding:0;font-family:'Barlow Condensed', sans-serif;font-size:30px;padding-left:20px;padding-right:20px;"></div>
                <div style="margin:0;padding:0;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;height:70px;width:100%;margin-top:15px;"><input class="form-control" type="password" placeholder="password" name="passwords" style="width:100%;height:100%;padding:0;margin:0;font-family:'Barlow Condensed', sans-serif;font-size:30px;padding-left:20px;padding-right:20px;"></div>
                <div style="margin:0;padding:0;height:60px;width:100%;margin-top:15px;" class="g-recaptcha" data-sitekey="6LfiuGQUAAAAACew80CjNEjMsqJ5vzSRvXxN8Pxz"></div>
                <div style="margin:0;padding:0;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;height:70px;width:100%;margin-top:40px;"><button class="btn btn-light btn-block" type="submit" style="width:100%;height:100%;padding:0;color:rgb(0,0,0);font-size:35px;font-family:'Barlow Condensed', sans-serif;font-weight:normal;">LOGIN</button></div>
            </form>
            <p style="padding:0;margin:0;margin-top:17px;font-size:20px;margin-left:30px;margin-right:30px;margin-bottom:20px;">Want to create an account ? Click&nbsp;<a href="./register.php">HERE</a></p>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>