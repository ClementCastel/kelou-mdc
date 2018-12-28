<?php
set_include_path(get_include_path().";"."C:/wamp64/www/LOGIN-PASSWORD/");
require_once('../config.php');
require_once('../header.php');

$user = $_SESSION['ID'];

$conn = mysqli_connect(host, user, pass, db);
$query = "SELECT UID, title
          FROM movies
          WHERE user=$user
          ORDER BY title
          ";

$result = mysqli_query($conn, $query);

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KMDC\admin\index</title>
    <link rel="stylesheet" href="css/table.style.css">
</head>
<body>
    <style>
    
    i {
        margin-right:5px;
    }

    a {
        text-decoration: none;
        color: #ababab  ;
    }
    
    </style>
    <table class="mv-container mv" style="max-width: 1200px; margin-top: 80px;">
        <tbody class="mv">
        <?php while ($data = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td class=""><?php echo $data['title']; ?></td>
                <td style="width:170px;" class=""><a href="http://kmdc.kelou.fr/admin/edit.php?uid=<?php echo $data['UID']; ?>"><i class="far fa-edit"></i>Modifier</a></td>
                <td style="width:170px;" class=""><a href="http://kmdc.kelou.fr/admin/delete.php?uid=<?php echo $data['UID']; ?>"><i class="far fa-trash-alt"></i>Supprimer</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>



</body>