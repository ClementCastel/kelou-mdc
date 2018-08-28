<?php
require_once('config.php');

$id = $_GET['id'];
 ?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>movie-page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/slate/bootstrap.min.css">
</head>

<body>

<?php
          if (isset($_GET['id'])){
          $conn = mysqli_connect(host, user,pass, db);

          $sql = "SELECT * FROM movies WHERE ID = '$id'";
          $result = mysqli_query($conn, $sql);

            while ($data = mysqli_fetch_assoc($result)){


            if ($data['user'] == $_SESSION['username']) {  ?>

    <div class="content" style="width:100%;height:100%;margin:0;padding:0;">
        <div class="row" style="background-color:rgb(21,21,21);margin:0;padding:0;height:65px;">
            <div class="col-lg-1" style="width:70px;height:80px;margin:0;padding:0;"><a href="./index.php"><i class="fa fa-film" style="padding:0;color:rgb(255,255,255);font-size:40px;margin-top:10px;margin-left:15px;"></i></a></div>
            <div class="col-lg-10" style="margin:0;padding:0;">
                <p class="text-center" style="color:rgb(204,7,30);font-family:'Barlow Condensed', sans-serif;font-size:40px;margin-bottom:0;padding:0;font-weight:bold;font-style:italic;">KMDC - <?php echo $data['title']; ?></p>
            </div>
            <div class="col-lg-1" style="margin:0;padding:0;width:125px;flex:0;">
                <a href="./admin/index.php"><p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:125px;">Gérer les films</p></a>
                <a href="./logout.php"><p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:115px;">Déconnexion</p></a>
            </div>
        </div>
        <div style="padding:0;margin:0;height:100%;width:100%;">
            <div class="row" style="height:100%;padding:0;margin:0;background-color:rgb(29,29,29);">
                <div class="col-lg-5 col-xl-3" style="padding:0;margin:0;height:100%;width:450px;"><img data-aos="fade-right" data-aos-duration="3000" data-aos-once="true" style="margin-top:25px;margin-left:25px;width:400px;height:600px;" src="<?php echo $data['poster']; ?>"></div>
                <div class="col-xl-9"
                    style="margin:0;padding:0;margin-top:15px;padding-bottom:40px;">
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">TITRE : <?php echo $data['title']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-delay="200" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">DATE : <?php echo $data['date']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-delay="400" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">REALISATEUR : <?php echo $data['film_director']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-delay="600" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">ACTEURS : <?php echo $data['actors']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-delay="800" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">DUREE : <?php echo $data['duration']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-delay="1000" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">GENRE(S) : <?php echo $data['kind']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-delay="1200" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">LANGAGE(S) : <?php echo $data['languages']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-delay="1400" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">SUBTITLE(S) : <?php echo $data['subs']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-delay="1600" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">QUALITE : <?php echo $data['quality']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-delay="1800" data-aos-once="true" style="margin:0;padding:0;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">SYNOPSIS :</p>
                        <p style="color:rgb(39,43,48);font-size:20px;font-family:'Barlow Condensed', sans-serif;margin-top:3px;font-style:italic;width:100%;padding-left:40px;padding-right:40px;margin-bottom:25px;"><?php echo $data['synopsis']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-delay="2000" data-aos-once="true" style="margin:0;padding:0;height:570px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        
                    <?php
                        $ytb = $data['ytb'];
                        $ytb = substr($ytb, 20);

                      ?>
                        
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">TRAILER :</p><iframe width="560" height="315" allowfullscreen="" frameborder="0" style="width:853px;height:480px;padding-left:25px;padding-right:25px;padding-top:10px;" src="https://www.youtube.com/embed/<?php echo $ytb; ?>"></iframe></div>
                    <div
                        style="margin:0;padding:0;height:30px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:15px;font-family:'Barlow Condensed', sans-serif;margin-left:10px;">date of upload : <?php echo $data['time']; ?></p>
                </div>
                <?php } else {}
            }}
            ?>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>