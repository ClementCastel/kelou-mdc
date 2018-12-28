<?php

session_start();
if (!isset($_SESSION['connected']) || empty($_SESSION['connected'])) header('Location: login.php');

require_once("./header.php");
require_once("./config.php");


?>

<html>

<head>
    <title>KMDC\search</title>
    <link rel="stylesheet" type="text/css" href="css/search.style.css">
    <link rel="stylesheet" type="text/css" href="css/index.min.css">
    <link rel="stylesheet" type="text/css" href="./admin/css/table.style.css">
</head>
<body style="background-color:rgb(29,29,29);">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   
<!-- 
* SI AUCUN TYPE DE RECHERCHE (titre, date, real, acteurs, genre) N'EST SPECIFIE
* ALORS ON AFFICHE LE TABLEAU DES RECHERCHES POSSIBLES
-->

<style>

#recap {
    width: 400px;
    margin-right: auto;
    margin-left: auto;
    color: white;
}

a.recap {
    margin-top: 50px;
    width: 200px;
    height: 40px;
    font-size: 20px;
    margin-left: 50px;
}

</style>

<?php if (!isset($_GET['s'])){?>   
                <div id="recap">
                   <h1>RECHERCHER PAR :</h1>
                    <a class="btn header recap" href="./search.php?s=title">TITRE</i></a>
                    <a class="btn header recap" href="./search.php?s=date">DATE</i></a>
                    <a class="btn header recap" href="./search.php?s=realisateur">REALISATEUR</i></a>
                    <a class="btn header recap" href="./search.php?s=acteur">ACTEUR</i></a>
                    <a class="btn header recap" href="./search.php?s=genre">GENRE</i></a>
                </div>
                    
<?php } ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- 
* SI $_GET['s'] (type de recherche) == 'title'
* ON AFFICHE LE CONTENU POUR LA RECHERCHE PAR TITRE
-->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'title'){ ?>

        <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="margin-top: 50px;margin-left:50px;margin-right:50px;">
            <input id="search" style="width:95%;" class="input1" type="text" name="title" required="" placeholder="Titre" autocomplete="off" id="title" required>
			<span class="shadow-input1"></span>
        </div>
        <div id="divider" class="divider" style="color:rgb(37,37,39);margin:0;padding:0;padding-top:50px;padding-left:75px;padding-right:75px;display:grid;grid-auto-rows:450px;">
        <?php 
        $conn = mysqli_connect(host, user,pass, db);
        $sql = "SELECT title, poster, UID FROM movies WHERE user='$_SESSION[ID]'";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>

        
            <a href="movie.php?id=<?php echo $data['UID'];?>">
            <div class="p-movie" style="width:220px;height:370px;">
                <div class="movie" style="width:120px;height:260px;background-size:230px 370px;background-image:url(&quot;<?php echo $data['poster']?>&quot;);"></div>
                <div style="height:65px;background-color:#ffffff;align-content:center;width:220px;line-height:65px;text-align:center;">
                    <p style="font-family:'Barlow Condensed', sans-serif;font-size:20px;color:rgb(0,0,0);font-weight:normal;font-style:normal;width:100%;vertical-align:middle;display:inline-block;line-height:1.2;margin-bottom:0;text-transform:uppercase;"><?php echo $data['title']?></p>
                </div>
                </div></a>
        <?php }}?>
        </div>
<?php } ?>

<!-- 
* RECHERCHE PAR DATE -> ANNEE UNIQUEMENT
-->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'date'){ ?>

        <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="margin-top: 50px;margin-left:50px;margin-right:50px;">
            <input id="search" style="width:95%;" class="input1" type="text" name="date" required="" placeholder="Date" autocomplete="off" required>
			<span class="shadow-input1"></span>
        </div>
        <table class="mv-container mv" style="max-width: 1200px; margin-top: 80px;">
        <tbody class="mv" id="date-result">
        <?php 
        $conn = mysqli_connect(host, user,pass, db);
        $sql = "SELECT date, UID, title FROM movies WHERE user='$_SESSION[ID]' ORDER BY date DESC";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>

           <tr>
                <td class=""><a href="./movie.php?id=<?php echo $data['UID']; ?>" style="text-decoration: none;color:#FB667A;"><?php echo $data['title']; ?></a></td>
                <td style="width:170px;" class=""><p style="color: white;"><?php echo $data['date']; ?></p></td>
            </tr>
        
        <?php }} ?>

        </tbody>
        </table>

<?php } ?>


<!-- 
* RECHERCHE PAR REALISATEUR
-->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'realisateur'){ ?>

        <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="margin-top: 50px;margin-left:50px;margin-right:50px;">
            <input id="search" style="width:95%;" class="input1" type="text" name="date" required="" placeholder="Date" autocomplete="off" required>
			<span class="shadow-input1"></span>
        </div>
        <table class="mv-container mv" style="max-width: 1200px; margin-top: 80px;">
        <tbody class="mv" id="real-result">
        <?php 
        $conn = mysqli_connect(host, user,pass, db);
        $sql = "SELECT film_director, UID, title FROM movies WHERE user='$_SESSION[ID]' ORDER BY date DESC";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>

           <tr>
                <td class=""><a href="./movie.php?id=<?php echo $data['UID']; ?>" style="text-decoration: none;color:#FB667A;"><?php echo $data['title']; ?></a></td>
                <td style="width:350px;" class=""><p style="color: white;"><?php echo $data['film_director']; ?></p></td>
            </tr>
        
        <?php }} ?>

        </tbody>
        </table>

<?php } ?>


<!-- 
* RECHERCHE PAR ACTEURS
-->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'acteur'){ ?>

        <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="margin-top: 50px;margin-left:50px;margin-right:50px;">
            <input id="search" style="width:95%;" class="input1" type="text" name="date" required="" placeholder="Date" autocomplete="off" required>
			<span class="shadow-input1"></span>
        </div>
        <table class="mv-container mv" style="max-width: 1200px; margin-top: 80px;">
        <tbody class="mv" id="acteur-result">
        <?php 
        $conn = mysqli_connect(host, user,pass, db);
        $sql = "SELECT actors, UID, title FROM movies WHERE user='$_SESSION[ID]' ORDER BY date DESC";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>

           <tr>
                <td class=""><a href="./movie.php?id=<?php echo $data['UID']; ?>" style="text-decoration: none;color:#FB667A;"><?php echo $data['title']; ?></a></td>
                <td style="width:400px;" class=""><p style="color: white;"><?php echo $data['actors']; ?></p></td>
            </tr>
        
        <?php }} ?>

        </tbody>
        </table>

<?php } ?>


<!-- 
* RECHERCHE PAR GENRE
-->

<?php if (isset($_GET['s']) && !empty($_GET['s']) && $_GET['s'] == 'genre'){ ?>

        <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="margin-top: 50px;margin-left:50px;margin-right:50px;">
            <input id="search" style="width:95%;" class="input1" type="text" name="date" required="" placeholder="Date" autocomplete="off" required>
			<span class="shadow-input1"></span>
        </div>
        <table class="mv-container mv" style="max-width: 1200px; margin-top: 80px;">
        <tbody class="mv" id="genre-result">
        <?php 
        $conn = mysqli_connect(host, user,pass, db);
        $sql = "SELECT kind, UID, title FROM movies WHERE user='$_SESSION[ID]' ORDER BY date DESC";
        $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>

           <tr>
                <td class=""><a href="./movie.php?id=<?php echo $data['UID']; ?>" style="text-decoration: none;color:#FB667A;"><?php echo $data['title']; ?></a></td>
                <td style="width:250px;" class=""><p style="color: white;"><?php echo $data['kind']; ?></p></td>
            </tr>
        
        <?php }} ?>

        </tbody>
        </table>

<?php } ?>





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
            data:{search:api,type:'real'},
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