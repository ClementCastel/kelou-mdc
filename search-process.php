<?php
require_once("config.php");

$conn = mysqli_connect(host, user,pass, db);
$sql = null;

if (!empty($_POST['search']) && $_POST['type'] == 'title'){

    $search = $_POST['search'];
    $sql = "SELECT title,poster,  UID FROM movies WHERE `title` LIKE '%$search%' AND user='$_SESSION[ID]'";

} else if (!empty($_POST['search']) && $_POST['type'] == 'date'){

    $date = $_POST['search'];
    $sql = "SELECT date, UID, title FROM movies WHERE `date` LIKE '%$date%' AND user='$_SESSION[ID]' ORDER BY date DESC";

} else if (!empty($_POST['search']) && $_POST['type'] == 'real'){

    $real = $_POST['search'];
    $sql = "SELECT film_director, UID, title FROM movies WHERE `film_director` LIKE '%$real%' AND user='$_SESSION[ID]'";

} else if (!empty($_POST['search']) && $_POST['type'] == 'acteur'){

    $acteur = $_POST['search'];
    $sql = "SELECT actors, UID, title FROM movies WHERE `actors` LIKE '%$acteur%' AND user='$_SESSION[ID]'";

} else if (!empty($_POST['search']) && $_POST['type'] == 'genre'){

    $genre = $_POST['search'];
    $sql = "SELECT kind, UID, title FROM movies WHERE `kind` LIKE '%$genre%' AND user='$_SESSION[ID]'";

} else {

    $sql = "SELECT * FROM movies WHERE user='$_SESSION[ID]'";

}
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_assoc($result)){ ?>
            

    <?php if ($_POST['type'] == 'title'){ ?>

            <a href="movie.php?id=<?php echo $data['UID'];?>">
            <div class="p-movie" style="width:220px;height:370px;">
                <div class="movie" style="width:120px;height:260px;background-size:230px 370px;background-image:url(&quot;<?php echo $data['poster']?>&quot;);"></div>
                <div style="height:65px;background-color:#ffffff;align-content:center;width:220px;line-height:65px;text-align:center;">
                    <p style="font-family:'Barlow Condensed', sans-serif;font-size:20px;color:rgb(0,0,0);font-weight:normal;font-style:normal;width:100%;vertical-align:middle;display:inline-block;line-height:1.2;margin-bottom:0;text-transform:uppercase;"><?php echo $data['title']?></p>
                </div>
            </div></a>


    <?php } else if ($_POST['type'] == 'date'){ ?>

            <tr>
                <td class=""><a href="./movie.php?id=<?php echo $data['UID']; ?>" style="text-decoration: none;color:#FB667A;"><?php echo $data['title']; ?></a></td>
                <td style="width:170px;" class=""><p style="color: white;"><?php echo $data['date']; ?></p></td>
            </tr>


    <?php } else if ($_POST['type'] == 'real'){ ?>

            <tr>
                <td class=""><a href="./movie.php?id=<?php echo $data['UID']; ?>" style="text-decoration: none;color:#FB667A;"><?php echo $data['title']; ?></a></td>
                <td style="width:170px;" class=""><p style="color: white;"><?php echo $data['film_director']; ?></p></td>
            </tr>


    <?php } else if ($_POST['type'] == 'acteur'){ ?>

            <tr>
                <td class=""><a href="./movie.php?id=<?php echo $data['UID']; ?>" style="text-decoration: none;color:#FB667A;"><?php echo $data['title']; ?></a></td>
                <td style="width:170px;" class=""><p style="color: white;"><?php echo $data['actors']; ?></p></td>
            </tr>

    <?php } else if ($_POST['type'] == 'genre') { ?>

            <tr>
                <td class=""><a href="./movie.php?id=<?php echo $data['UID']; ?>" style="text-decoration: none;color:#FB667A;"><?php echo $data['title']; ?></a></td>
                <td style="width:170px;" class=""><p style="color: white;"><?php echo $data['kind']; ?></p></td>
            </tr>

    <?php } else {}}}?>