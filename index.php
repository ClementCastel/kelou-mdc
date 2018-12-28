<?php 

session_start();

if (!isset($_SESSION['connected']) || empty($_SESSION['connected'])) header('Location: login.php');

require_once("./header.php");
require_once("./config.php");


$userID = $_SESSION['ID'];

$conn = mysqli_connect(host, user, pass, db);
$query = "SELECT UID, poster, title
          FROM movies
          WHERE user = \"$userID\"
          ORDER BY title ASC
          ";

$result = mysqli_query($conn, $query);

?>

<html>
<head>
    <title>Index</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/index.min.css">
</head>
<body style="">
    
    <div class="divider" style="color:rgb(37,37,39);margin:0;padding:0;padding-top:50px;padding-left:75px;padding-right:75px;display:grid;grid-auto-rows:450px;">
        <?php if (mysqli_num_rows($result) > 0){
            while ($data = mysqli_fetch_assoc($result)){ ?>

            <a href="http://kmdc.kelou.fr/movie.php?id=<?php echo $data['UID'];?>">
            <div class="p-movie" style="width:220px;height:370px;">
                <div class="movie" style="width:120px;height:260px;background-size:230px 370px;background-image:url(&quot;<?php echo $data['poster']?>&quot;);"></div>
                <div style="height:65px;background-color:#ffffff;align-content:center;width:220px;line-height:65px;text-align:center;">
                    <p style="font-family:'Barlow Condensed', sans-serif;font-size:20px;color:rgb(0,0,0);font-weight:normal;font-style:normal;width:100%;vertical-align:middle;display:inline-block;line-height:1.2;margin-bottom:0;text-transform:uppercase;"><?php echo $data['title']?></p>
                </div>
            </div></a>
            
        <?php }
      }
    ?>
    </div>


    
</body>
</html>