<?php
require_once("config.php");

$conn = mysqli_connect(host, user,pass, db);
$sql = null;

if (isset($_POST['search']) && !empty($_POST['search'])){

    $search = $_POST['search'];
    $sql = "SELECT * FROM movies WHERE `title` LIKE '%$search%' AND user='$_SESSION[username]'";

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
            </div></a>

    <?php }
    }
?>