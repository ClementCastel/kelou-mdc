<?php
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
#                                                                         -
#  Ce fichier n'execute rien, il sert uniquement à stocker des variables  -
#                                                                         -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
#                          Base de données                                -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

define ('host','localhost');

define ('user','root');

define ('pass', '');

define ('db', 'kmdc');

# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
#                          Lancement Session                              -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

session_start();

error_reporting(E_ALL ^ E_DEPRECATED);
require_once("loader.php");
?>
