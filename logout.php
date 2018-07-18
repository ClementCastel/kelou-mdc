<?php
require_once("config.php");


if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
  session_destroy();
  header("Location: login.php");
} else {
  header("Location: login.php");
}

?>

<html>
<head>
  <title>Log Out</title>
  <meta charset="utf-8" />
</head>
<body>
  <div>
      Deconnexion !
  </div>
</body>
</html>
