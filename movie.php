<?php
require_once('config.php');
$id = $_GET['id'];
 ?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KMDC - movie page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anonymous+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/slate/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/movie.styles.min.css">
</head>

<body>
    <div style="width:100%;height:100%;margin:0;padding:0;">
        <div style="/*position:fixed;*/width:100%;height:60px;background-color:rgb(47,19,69);padding:0;margin:0;top:0;left:0;border-bottom-color:rgb(0,0,0);border-bottom-style:dashed;">

          <?php
          if (isset($_GET['id'])){
          $conn = mysqli_connect(host, user,pass, db);

          $sql = "SELECT * FROM movies WHERE ID = '$id'";
          $result = mysqli_query($conn, $sql);

            while ($data = mysqli_fetch_assoc($result)){ ?>



            <div><a href="./index.php"><i class="fa fa-film" style="padding:0;color:rgb(255,255,255);font-size:40px;margin-top:10px;margin-left:15px;"></i></a><i class="fa fa-tv" style="padding:0;color:rgb(255,255,255);font-size:40px;margin:0;margin-left:15px;"></i>
                <p class="text-center"
                    style="color:rgb(250,255,0);font-family:'Barlow Condensed', sans-serif;font-size:40px;margin-left:120px;margin-bottom:0;padding:0;margin-right:200px;margin-top:-53px;font-weight:bold;font-style:italic;">KMDC - <?php echo $data['title']; ?></p><button class="btn btn-primary" type="button" style="float:right;margin-top:-50px;margin-right:20px;padding-top:8px;padding-bottom:8px;font-family:'Barlow Condensed', sans-serif;font-weight:bold;font-style:italic;">Ajouter un film</button></div>
        </div>

        <div style="padding:0;margin:0;height:100%;width:100%;">
            <div class="row" style="height:100%;padding:0;margin:0;">
                <div class="col-lg-5 col-xl-3" style="padding:0;margin:0;background-color:#272b30;height:100%;width:450px;"><img data-aos="fade-right" data-aos-duration="3000" data-aos-once="true" style="margin-top:25px;margin-left:25px;width:400px;height:600px;" src="<?php echo $data['poster']; ?>"></div>
                <div class="col-xl-9" style="margin:0;padding:0;margin-top:15px;">
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">TITRE : <?php echo $data['title']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">DATE : <?php echo $data['date']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">REALISATEUR : <?php echo $data['film_director']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">ACTEURS : <?php echo $data['actors']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">DUREE : <?php echo $data['duration']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">GENRE(S) : <?php echo $data['kind']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">LANGAGE(S) : <?php echo $data['languages']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">SUBTITLE(S) : <?php echo $data['subs']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:50px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">QUALITE : <?php echo $data['quality']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">SYNOPSIS :</p>
                        <p style="color:rgb(39,43,48);font-size:20px;font-family:'Barlow Condensed', sans-serif;margin-top:3px;font-style:italic;width:100%;padding-left:40px;padding-right:40px;margin-bottom:25px;"> <?php echo $data['synopsis']; ?></p>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:570px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">

                      <?php
                        $ytb = $data['ytb'];
                        $ytb = substr($ytb, 20);

                      ?>
                        <p style="color:rgb(39,43,48);font-size:25px;font-family:'Barlow Condensed', sans-serif;margin-left:20px;margin-top:3px;">TRAILER :</p><iframe width="560" height="315" allowfullscreen="" frameborder="0" style="width:853px;height:480px;padding-left:25px;padding-right:25px;padding-top:10px;" src="https://www.youtube.com/embed/<?php echo $ytb; ?>"></iframe></div>
                    <div
                        data-aos="fade-left" data-aos-duration="3000" data-aos-once="true" style="margin:0;padding:0;height:30px;background-color:rgb(205,205,205);border:3px solid rgb(67,67,67);border-radius:5px;margin-right:40px;margin-left:50px;margin-top:10px;">
                        <p style="color:rgb(39,43,48);font-size:15px;font-family:'Barlow Condensed', sans-serif;margin-left:10px;">date of upload : <?php echo $data['time']; ?></p>
                </div>

              <?php }
            }
            ?>

            </div>
        </div>
    </div>
    <div style="margin-top: 450px; padding-bottom: 70px; height:60px;width:100%;padding:0;background-color:#341f41;border-top-style:dashed;border-top-color:rgb(0,0,0);">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
