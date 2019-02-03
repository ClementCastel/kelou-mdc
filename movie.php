<?php
require_once('config.php');
require_once('header.php');

$uid = $_GET['id'];

 ?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>movie-page</title>
    <link rel="stylesheet" href="css/movie.style.css">
</head>

<body>

<?php
          if (isset($_GET['id'])){
          $conn = mysqli_connect(host, user,pass, db);

          $sql = "SELECT * FROM movies WHERE UID = '$uid'";
          $result = mysqli_query($conn, $sql);

            while ($data = mysqli_fetch_assoc($result)){


            if ($data['user'] == $_SESSION['ID']) {  ?>
                <table>
                    <tr>
                        <h1 class="mv" style="min-height: 42px; margin-top: 30px;"><span class="yellow mv"><?php echo $data['title']; ?></span> - <a href="http://kmdc.kelou.fr/admin/edit.php?uid=<?php echo $uid; ?>"><i title="Editer" style="font-size: 35px;" class="yellow far fa-edit"></i></a></h1>
                    </tr>
                    <tr>

                        <td valign="top"><img src="<?php echo $data['poster']; ?>" style="max-width:500px; margin-left: 30px;" /></td>

                        <td>


                            
                            <table class="mv-container mv">
                            <tbody class="mv">
                                <tr>
                                    <td class="title">DATE</td>
                                    <td class="data"><?php echo $data['date']; ?></td>
                                </tr>
                                <tr class="mv">
                                    <td class="title">REALISATEUR</td>
                                    <td class="data"><?php echo $data['film_director']; ?></td>
                                </tr>
                                <tr class="mv">
                                    <td class="title">ACTEURS</td>
                                    <td class="data"><?php echo $data['actors']; ?></td>
                                </tr>
                                <tr class="mv">
                                    <td class="title">DUREE</td>
                                    <td class="data"><?php echo $data['duration']; ?></td>
                                </tr>
                                <tr class="mv">
                                    <td class="title">GENRE(S)</td>
                                    <td class="data"><?php echo $data['kind']; ?></td>
                                </tr>
                                <tr class="mv">
                                    <td class="title">LANGAGE(S)</td>
                                    <td class="data"><?php echo $data['languages']; ?></td>
                                </tr>
                                <tr class="mv">
                                    <td class="title">SOUS-TITRE(S)</td>
                                    <td class="data"><?php echo $data['subs']; ?></td>
                                </tr>
                                <tr class="mv">
                                    <td class="title">QUALITE(S)</td>
                                    <td class="data"><?php echo $data['quality']; ?></td>
                                </tr>
                                <tr class="mv">
                                    <td class="title">SYNOPSIS</td>
                                    <td class="data synopsis"><?php echo $data['synopsis']; ?></td>
                                </tr>
                                <tr class="mv">
                                    <td class="title trailer">TRAILER <br/></td>
                                    <td class="trailer-video"><iframe width="400" height="315" allowfullscreen="" frameborder="0" style="width:853px;height:480px;padding-left:25px;padding-right:25px;padding-top:10px;" src="https://www.youtube.com/embed/<?php echo substr($data['ytb'], 20); ?>"></iframe>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                     </td>
                </table>
                <?php } else {}
            }}
            ?>
</body>

</html>