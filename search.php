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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/slate/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background-color:rgb(29,29,29);">
    <div style="width:100%;height:100%;margin:0;padding:0;">
        <div class="row" style="background-color:rgb(21,21,21);margin:0;padding:0;height:65px;">
            <div class="col-lg-1" style="width:70px;height:80px;margin:0;padding:0;"><i class="fa fa-film" style="padding:0;color:rgb(255,255,255);font-size:40px;margin-top:10px;margin-left:15px;"></i></div>
            <div class="col-lg-10" style="margin:0;padding:0;">
                <p class="text-center" style="color:rgb(204,7,30);font-family:'Barlow Condensed', sans-serif;font-size:40px;margin-bottom:0;padding:0;font-weight:bold;font-style:italic;">KMDC - Search Engine</p>
            </div>
            <div class="col-lg-1" style="margin:0;padding:0;width:125px;flex:0;">
                <a href="./admin/index.php"><p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:125px;">Gérer les films</p></a>
                <a href="./logout.php"><p class="text-right float-right" style="margin:0;padding:0;color:rgb(79,79,79);font-size:20px;border-bottom:2px solid rgb(126,126,126);text-align:right;width:115px;">Déconnexion</p></a>
            </div>
        </div>


<!-- 
* SI AUCUN TYPE DE RECHERCHE (titre, date, real, acteurs, genre) N'EST SPECIFIE
* ALORS ON AFFICHE LE TABLEAU DES RECHERCHES POSSIBLES
-->


<?php if (!isset($_GET['s'])){?>
    <div style="width:70%;height:40px;margin-top:80px;margin-left:60px;font-size:25px;">
            <p style="color:rgb(255,255,255);">Rechercher par :</p>
            <div class="row" style="margin:0;width:100%;margin-left:15%;margin-top:60px;font-family:'Barlow Condensed';">
                <div class="col" style="padding:0;">
                    <a href="./search?s=title"><div class="category">
                        <p style="margin-left:15px;color:black;">TITRE</p>
                    </div>
                </div></a>
                <div class="col" style="padding:0;">
                    <a href="./search?s=date"><div class="category">
                        <p style="margin-left:15px;color:black;">DATE</p>
                    </div>
                </div></a>
                <div class="col" style="padding:0;">
                    <a href="./search?s=realisateur"><div class="category">
                        <p style="margin-left:15px;color:black;">REALISATEUR</p>
                    </div>
                </div></a>
                <div class="col" style="padding:0;">
                    <a href="./search?s=acteur"><div class="category">
                        <p style="margin-left:15px;color:black;">ACTEUR</p>
                    </div>
                </div></a>
                <div class="col" style="padding:0;">
                    <a href="./search?s=genre"><div class="category">
                        <p style="margin-left:15px;color:black;">GENRE</p>
                    </div>
                </div></a>
            </div>
        </div>
<?php } ?>


<!-- 
* SI $_GET['s'] (type de recherche) == 'title'
* ON AFFICHE LE CONTENU POUR LA RECHERCHE PAR TITRE
-->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'title'){ ?>

        <div style="width:100%;height:100%;">
            <div style="margin:0;padding:0;height:59px;background-color:rgb(205,205,205);border:2px solid rgb(0,0,0);border-radius:20px;margin-right:40px;margin-left:50px;margin-top:50px;">
                <form style="width:100%;height:100%;" autocomplete="off">
                    <div class="form-row" style="margin:0;padding:0;height:100%;width:100%;">
                        <div class="col-xl-12" style="margin:0;padding:0;"><input id="search" class="form-control" name="term" type="text" required="" placeholder="Search a title" style="width:100%;height:100%;padding:0;padding-left:20px;font-size:25px;font-family:'Barlow Condensed', sans-serif;margin:0;border-top-left-radius:10px;border-bottom-left-radius:10px;"></div>
            </div>
            </form>
        </div>
        <div id="divider" class="divider" style="width:100%;color:rgb(37,37,39);margin:0;padding:0;padding-top:50px;padding-left:75px;padding-right:75px;display:grid;grid-auto-rows:350px;margin-top:60px;min-height:573px;">        
        
        <?php 
        $conn = mysqli_connect(host, user,pass, db);
        $sql = "SELECT * FROM movies WHERE user='$_SESSION[username]'";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>
        <a href="./movie.php?id=<?php echo ($data['ID']); ?>">
        <div class="p-movie" style="width:180px;height:335px;">
        <div class="movie" style="width:180px;height:270px;background-image:url(&quot; <?php echo $data['poster']?> &quot;);"></div>
        <div style="height:65px;background-color:#ffffff;align-content:center;width:180px;line-height:65px;text-align:center;">
        <p style="font-family:'Barlow Condensed', sans-serif;font-size:20px;color:rgb(0,0,0);font-weight:normal;font-style:normal;width:100%;vertical-align:middle;display:inline-block;line-height:1.2;margin-bottom:0;margin-top:-5px;"><?php echo $data['title']?></p>
        </div>
        </div></a>
        
        <?php }}?>

    </div>
    </div>
    </div><?php } ?>

<!-- 
* RECHERCHE PAR DATE -> ANNEE UNIQUEMENT
-->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'date'){ ?>

<div style="width:100%;height:100%;">
            <div style="margin:0;padding:0;height:59px;background-color:rgb(205,205,205);border:2px solid rgb(0,0,0);border-radius:20px;margin-right:40px;margin-left:50px;margin-top:50px;">
                <form style="width:100%;height:100%;" autocomplete="off">
                    <div class="form-row" style="margin:0;padding:0;height:100%;width:100%;">
                        <div class="col-xl-12" style="margin:0;padding:0;"><input id="search" class="form-control" type="text" required="" placeholder="Search a title" style="width:100%;height:100%;padding:0;padding-left:20px;font-size:25px;font-family:'Barlow Condensed', sans-serif;margin:0;border-top-left-radius:10px;border-bottom-left-radius:10px;"></div>
                        
            </form>
        </div>
        <div id="date-result" style="margin-top:80px;width:80%;margin-right:10%;margin-left:10%;">

        <?php 
        $conn = mysqli_connect(host, user,pass, db);
        $sql = "SELECT * FROM movies WHERE user='$_SESSION[username]'";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>

            <div class="row" id="1-movie" style="margin-top:15px;padding:0;border-bottom:1px solid white;">
                <div class="col-xl-9" style="padding:0;">
                    <a href="./movie.php?id=<?php echo ($data['ID']); ?>"><p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(221,221,221);"><?php echo $data['title']; ?></p></a>
                </div>
                <div class="col-xl-3" style="padding:0;">
                    <p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(255,255,255);"><?php echo $data['date']; ?></p>
                </div>
            </div>
        
        <?php }} ?>

        </div>

<?php } ?>


<!-- 
* RECHERCHE PAR REALISATEUR
-->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'realisateur'){ ?>

<div style="width:100%;height:100%;">
            <div style="margin:0;padding:0;height:59px;background-color:rgb(205,205,205);border:2px solid rgb(0,0,0);border-radius:20px;margin-right:40px;margin-left:50px;margin-top:50px;">
                <form style="width:100%;height:100%;" autocomplete="off">
                    <div class="form-row" style="margin:0;padding:0;height:100%;width:100%;">
                        <div class="col-xl-12" style="margin:0;padding:0;"><input id="search" class="form-control" type="text" required="" placeholder="Search a title" style="width:100%;height:100%;padding:0;padding-left:20px;font-size:25px;font-family:'Barlow Condensed', sans-serif;margin:0;border-top-left-radius:10px;border-bottom-left-radius:10px;"></div>
                        
            </form>
        </div>
        <div id="real-result" style="margin-top:80px;width:80%;margin-right:10%;margin-left:10%;">

        <?php 
        $conn = mysqli_connect(host, user,pass, db);
        $sql = "SELECT * FROM movies WHERE user='$_SESSION[username]'";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>

            <div class="row" id="1-movie" style="margin-top:15px;padding:0;border-bottom:1px solid white;">
                <div class="col-xl-9" style="padding:0;">
                    <a href="./movie.php?id=<?php echo ($data['ID']); ?>"><p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(221,221,221);"><?php echo $data['title']; ?></p></a>
                </div>
                <div class="col-xl-3" style="padding:0;">
                    <p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(255,255,255);"><?php echo $data['film_director']; ?></p>
                </div>
            </div>
        
        <?php }} ?>

        </div>

<?php } ?>


<!-- 
* RECHERCHE PAR ACTEURS
-->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'acteur'){ ?>

<div style="width:100%;height:100%;">
            <div style="margin:0;padding:0;height:59px;background-color:rgb(205,205,205);border:2px solid rgb(0,0,0);border-radius:20px;margin-right:40px;margin-left:50px;margin-top:50px;">
                <form style="width:100%;height:100%;" autocomplete="off">
                    <div class="form-row" style="margin:0;padding:0;height:100%;width:100%;">
                        <div class="col-xl-12" style="margin:0;padding:0;"><input id="search" class="form-control" type="text" required="" placeholder="Search a title" style="width:100%;height:100%;padding:0;padding-left:20px;font-size:25px;font-family:'Barlow Condensed', sans-serif;margin:0;border-top-left-radius:10px;border-bottom-left-radius:10px;"></div>
                        
            </form>
        </div>
        <div id="acteur-result" style="margin-top:80px;width:80%;margin-right:10%;margin-left:10%;">

        <?php 
        $conn = mysqli_connect(host, user,pass, db);
        $sql = "SELECT * FROM movies WHERE user='$_SESSION[username]'";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>

            <div class="row" id="1-movie" style="margin-top:15px;padding:0;border-bottom:1px solid white;">
                <div class="col-xl-6" style="padding:0;">
                    <a href="./movie.php?id=<?php echo ($data['ID']); ?>"><p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(221,221,221);"><?php echo $data['title']; ?></p></a>
                </div>
                <div class="col-xl-6" style="padding:0;">
                    <p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(255,255,255);"><?php echo $data['actors']; ?></p>
                </div>
            </div>
        
        <?php }} ?>

        </div>

<?php } ?>


<!-- 
* RECHERCHE PAR GENRE
-->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'genre'){ ?>

<div style="width:100%;height:100%;">
            <div style="margin:0;padding:0;height:59px;background-color:rgb(205,205,205);border:2px solid rgb(0,0,0);border-radius:20px;margin-right:40px;margin-left:50px;margin-top:50px;">
                <form style="width:100%;height:100%;" autocomplete="off">
                    <div class="form-row" style="margin:0;padding:0;height:100%;width:100%;">
                        <div class="col-xl-12" style="margin:0;padding:0;"><input id="search" class="form-control" type="text" required="" placeholder="Search a title" style="width:100%;height:100%;padding:0;padding-left:20px;font-size:25px;font-family:'Barlow Condensed', sans-serif;margin:0;border-top-left-radius:10px;border-bottom-left-radius:10px;"></div>
                        
            </form>
        </div>
        <div id="genre-result" style="margin-top:80px;width:80%;margin-right:10%;margin-left:10%;">

        <?php 
        $conn = mysqli_connect(host, user,pass, db);
        $sql = "SELECT * FROM movies WHERE user='$_SESSION[username]'";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>

            <div class="row" id="1-movie" style="margin-top:15px;padding:0;border-bottom:1px solid white;">
                <div class="col-xl-6" style="padding:0;">
                    <a href="./movie.php?id=<?php echo ($data['ID']); ?>"><p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(221,221,221);"><?php echo $data['title']; ?></p></a>
                </div>
                <div class="col-xl-6" style="padding:0;">
                    <p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(255,255,255);"><?php echo $data['kind']; ?></p>
                </div>
            </div>
        
        <?php }} ?>

        </div>

<?php } ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>


<!-- RECHERCHE PAR TITRE-->

    <?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'title'){ ?>

    <script>
    $(document).ready(function () {
        $('#search').keyup(function(){

            var search = $('#search').val();


            $.ajax({

                url:'search-process.php',
                data:{search:search,type:'title'},
                type: 'POST',
                success:function(data){
                    
                    if (!data.error){
                        $('#divider').html(data);
                    }

                }

            })
        })       
    })
    
    
    </script>
    <?php }?>


    <!-- RECHERCHE PAR DATE-->

    <?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'date'){ ?>

<script>
$(document).ready(function () {
    $('#search').keyup(function(){
        var search = $('#search').val();


        $.ajax({

            url:'search-process.php',
            data:{search:search,type:'date'},
            type: 'POST',
            success:function(data){
                
                if (!data.error){
                    $('#date-result').html(data);
                }

            }

        })
    })       
})


</script>
<?php }?>

    <!-- RECHERCHE PAR REALISATEUR -->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'realisateur'){ ?>

<script>
$(document).ready(function () {
    $('#search').keyup(function(){
        var search = $('#search').val();


        $.ajax({

            url:'search-process.php',
            data:{search:search,type:'real'},
            type: 'POST',
            success:function(data){
                
                if (!data.error){
                    $('#real-result').html(data);
                }

            }

        })
    })       
})


</script>
<?php }?>


    <!-- RECHERCHE PAR ACTEURS -->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'acteur'){ ?>

<script>
$(document).ready(function () {
    $('#search').keyup(function(){
        var search = $('#search').val();


        $.ajax({

            url:'search-process.php',
            data:{search:search,type:'acteur'},
            type: 'POST',
            success:function(data){
                
                if (!data.error){
                    $('#acteur-result').html(data);
                }

            }

        })
    })       
})


</script>
<?php }?>


    <!-- RECHERCHE PAR GENRE -->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'genre'){ ?>

<script>
$(document).ready(function () {
    $('#search').keyup(function(){
        var search = $('#search').val();


        $.ajax({

            url:'search-process.php',
            data:{search:search,type:'genre'},
            type: 'POST',
            success:function(data){
                
                if (!data.error){
                    $('#genre-result').html(data);
                }

            }

        })
    })       
})


</script>
<?php }?>

</body>

</html>