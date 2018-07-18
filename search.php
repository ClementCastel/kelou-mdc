<?php
require_once("./config.php");

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true){

} else {
  header("Location: login.php");
}

?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search-page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anonymous+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/slate/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/movie.styles.min.css">
</head>

<body>
    <div style="width:100%;height:100%;margin:0;padding:0;">
        <div style="/*position:fixed;*/width:100%;height:60px;background-color:rgb(47,19,69);padding:0;margin:0;top:0;left:0;border-bottom-color:rgb(0,0,0);border-bottom-style:dashed;">
            <div><i class="fa fa-film" style="padding:0;color:rgb(255,255,255);font-size:40px;margin-top:10px;margin-left:15px;"></i><i class="fa fa-tv" style="padding:0;color:rgb(255,255,255);font-size:40px;margin:0;margin-left:15px;"></i>
                <p class="text-center"
                    style="color:rgb(250,255,0);font-family:'Barlow Condensed', sans-serif;font-size:40px;margin-left:120px;margin-bottom:0;padding:0;margin-right:200px;margin-top:-53px;font-weight:bold;font-style:italic;">KMDC - Home</p><button class="btn btn-primary" type="button" style="float:right;margin-top:-50px;margin-right:20px;padding-top:8px;padding-bottom:8px;">Ajouter un film</button></div>
        </div>
        <div style="width:100%;height:100%;">
            <div style="margin:0;padding:0;height:59px;background-color:rgb(205,205,205);border:5px solid rgb(67,67,67);border-radius:10px;margin-right:40px;margin-left:50px;margin-top:50px;">
                <form style="width:100%;height:100%;" method="get">
                    <div class="form-row" style="margin:0;padding:0;height:100%;width:100%;">
                        <div class="col-xl-9" style="margin:0;padding:0;"><input class="form-control" name="term" type="text" required="" placeholder="Search a title" style="width:100%;height:100%;padding:0;padding-left:20px;font-size:25px;font-family:'Barlow Condensed', sans-serif;margin:0;border-radius:10px;"></div>
                        <div
                            class="col-xl-3" style="padding:0;margin:0;"><button class="btn btn-primary" type="submit" style="width:100%;height:100%;border-radius:0;">Search</button></div>
            </div>
            </form>
        </div>

        <div class="divider" style="width:100%;height:100%;color:rgb(37,37,39);margin:0;padding:0;padding-top:50px;padding-left:75px;padding-right:75px;display:grid;grid-auto-rows:350px;margin-top:60px;">

          <?php
                $conn = mysqli_connect(host, user,pass, db);
                $sql = null;
                if (isset($_GET['term']) && !empty($_GET['term'])){

                  $term = $_GET['term'];
                  $sql = "SELECT * FROM movies WHERE `title` LIKE '%$term%' AND user='$_SESSION[username]'";

                } else {

                $sql = "SELECT * FROM movies WHERE user='$_SESSION[username]'";

              }
                $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0){
                      while ($data = mysqli_fetch_assoc($result)){ ?>

          <a href="./movie.php?id=<?php echo ($data['ID']); ?>">
            <div class="p-movie" style="width:180px;height:335px;">
                <div class="movie" style="width:180px;height:270px;background-image:url(&quot; <?php echo $data['poster']?> &quot;);"></div>
                <div style="height:65px;background-color:#ffffff;align-content:center;width:180px;line-height:65px;text-align:center;">
                    <p style="font-family:'Barlow Condensed', sans-serif;font-size:20px;color:rgb(0,0,0);font-weight:normal;font-style:normal;width:100%;vertical-align:middle;display:inline-block;line-height:1.2;margin-bottom:0;margin-top:-5px;"><?php echo $data['title']?></p>
                </div>
            </div>
          </a>

        <?php }
        }
        ?>

        </div>
    </div>
    <div style="height:60px;width:100%;margin:0;padding:0;background-color:#341f41;border-top-style:dashed;border-top-color:rgb(0,0,0);margin-top:250px;">
        <div class="d-inline-block" style="width:33%;height:60px;vertical-align:top;">
            <p class="text-left text-warning" style="font-family:Aldrich, sans-serif;font-size:20px;/*vertical-align:baseline;*/margin:0;padding:0;margin-top:4%;">&nbsp; ©Kelou - <a href="https://kelou.fr/">Clément Castel</a></p>
        </div>
        <div class="d-inline-block" style="width:33%;height:60px;vertical-align:top;"><i class="fa fa-twitter" style="font-size:30px;color:rgb(255,255,255);height:30px;width:30px;padding-left:15%;"></i><i class="fa fa-flickr" style="font-size:30px;color:rgb(255,255,255);width:30px;height:30px;padding-left:30%;margin-top:4%;"></i>
            <i
                class="fa fa-git" style="font-size:30px;color:rgb(255,255,255);width:30px;height:30px;padding-left:30%;"></i>
        </div>
        <div class="d-inline-block" style="width:33%;height:60px;vertical-align:top;">
            <p class="lead text-right text-warning" style="font-size:15px;font-family:Aldrich, sans-serif;padding:0;margin:0;margin-top:4%;">Dev. Buid: &nbsp;v1.0.2</p>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
