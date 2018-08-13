<?php
require_once("config.php");

$conn = mysqli_connect(host, user,pass, db);
$sql = null;

if (!empty($_POST['search']) && $_POST['type'] == 'title'){

    $search = $_POST['search'];
    $sql = "SELECT * FROM movies WHERE `title` LIKE '%$search%' AND user='$_SESSION[username]'";

} else if (!empty($_POST['search']) && $_POST['type'] == 'date'){

    $date = $_POST['search'];
    $sql = "SELECT * FROM movies WHERE `date` LIKE '%$date%' AND user='$_SESSION[username]'";

} else if (!empty($_POST['search']) && $_POST['type'] == 'real'){

    $real = $_POST['search'];
    $sql = "SELECT * FROM movies WHERE `film_director` LIKE '%$real%' AND user='$_SESSION[username]'";

} else if (!empty($_POST['search']) && $_POST['type'] == 'acteur'){

    $acteur = $_POST['search'];
    $sql = "SELECT * FROM movies WHERE `actors` LIKE '%$acteur%' AND user='$_SESSION[username]'";

} else if (!empty($_POST['search']) && $_POST['type'] == 'genre'){

    $genre = $_POST['search'];
    $sql = "SELECT * FROM movies WHERE `kind` LIKE '%$genre%' AND user='$_SESSION[username]'";

} else {

    $sql = "SELECT * FROM movies WHERE user='$_SESSION[username]'";

}
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>
            

    <?php if ($_POST['type'] == 'title'){ ?>

            <a href="./movie.php?id=<?php echo ($data['ID']); ?>">
            <div class="p-movie" style="width:180px;height:335px;">
                <div class="movie" style="width:180px;height:270px;background-image:url(&quot; <?php echo $data['poster']?> &quot;);"></div>
                <div style="height:65px;background-color:#ffffff;align-content:center;width:180px;line-height:65px;text-align:center;">
                    <p style="font-family:'Barlow Condensed', sans-serif;font-size:20px;color:rgb(0,0,0);font-weight:normal;font-style:normal;width:100%;vertical-align:middle;display:inline-block;line-height:1.2;margin-bottom:0;margin-top:-5px;"><?php echo $data['title']?></p>
            </div>
            </div></a>


    <?php } else if ($_POST['type'] == 'date'){ ?>

    <div class="row" id="1-movie" style="margin-top:15px;padding:0;border-bottom:1px solid white;">
                <div class="col-xl-9" style="padding:0;">
                    <a href="./movie.php?id=<?php echo ($data['ID']); ?>"><p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(221,221,221);"><?php echo $data['title']; ?></p></a>
                </div>
                <div class="col-xl-3" style="padding:0;">
                    <p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(255,255,255);"><?php echo $data['date']; ?></p>
                </div>
            </div>


    <?php } else if ($_POST['type'] == 'real'){ ?>

     <div class="row" id="1-movie" style="margin-top:15px;padding:0;border-bottom:1px solid white;">
                <div class="col-xl-9" style="padding:0;">
                    <a href="./movie.php?id=<?php echo ($data['ID']); ?>"><p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(221,221,221);"><?php echo $data['title']; ?></p></a>
                </div>
                <div class="col-xl-3" style="padding:0;">
                    <p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(255,255,255);"><?php echo $data['film_director']; ?></p>
                </div>
            </div>


    <?php } else if ($_POST['type'] == 'acteur'){ ?>

    <div class="row" id="1-movie" style="margin-top:15px;padding:0;border-bottom:1px solid white;">
                <div class="col-xl-9" style="padding:0;">
                    <a href="./movie.php?id=<?php echo ($data['ID']); ?>"><p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(221,221,221);"><?php echo $data['title']; ?></p></a>
                </div>
                <div class="col-xl-3" style="padding:0;">
                    <p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(255,255,255);"><?php echo $data['actors']; ?></p>
                </div>
            </div>

    <?php } else if ($_POST['type'] == 'genre') { ?>

    <div class="row" id="1-movie" style="margin-top:15px;padding:0;border-bottom:1px solid white;">
                <div class="col-xl-6" style="padding:0;">
                    <a href="./movie.php?id=<?php echo ($data['ID']); ?>"><p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(221,221,221);"><?php echo $data['title']; ?></p></a>
                </div>
                <div class="col-xl-6" style="padding:0;">
                    <p style="font-size:35px;font-family:'Barlow Condensed', sans-serif;color:rgb(255,255,255);"><?php echo $data['kind']; ?></p>
                </div>
            </div>

    <?php } else {}}}?>