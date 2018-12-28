<?php 

require_once("config.php");

?>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="css/header.style.css">
</head>

<body class="header">


 <!-- ### HEADER - BEGINNING ### -->
  <header class="header">
		<div class="container header">
			<a class="btn header logo" href="http://kmdc.kelou.fr/"><h1 class="logo header">
				KELOU <span class="header">MDC</span>
			</h1></a>
			<section class="social">
				<?php if (isset($_SESSION['connected']) && $_SESSION['connected'] == 1) { ?>
					<a class="btn header" href="http://kmdc.kelou.fr/admin/add.php"><i class="fas fa-plus fa-2x"></i></a>
					<a class="btn header" href="http://kmdc.kelou.fr/admin/index.php"><i class="fas fa-film fa-2x"></i></a>
					<a class="btn header" href="http://kmdc.kelou.fr/user.php"><i class="far fa-user fa-2x"></i></a>
					<a class="btn header" href="http://kmdc.kelou.fr/search.php"><i class="fas fa-search fa-2x"></i></a>
					<a class="btn header" href="http://kmdc.kelou.fr/dev.php"><i class="fab fa-dev fa-2x"></i></a>
					
				<?php } ?>
			</section>
		</div>
	</header>
<!-- ### HEADER - ENDING ### -->
<!-- # -->
<!-- # -->


<div id="background" class="background"></div>



</body>

</html>
