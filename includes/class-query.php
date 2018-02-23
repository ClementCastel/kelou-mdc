<?php
	setlocale(LC_CTYPE, 'fr_FR.UTF-8');
	require_once('class-db.php');

	if ( !class_exists('QUERY') ) {
		class QUERY {
			public function all_posts() {
				global $db;

				$query = "
								SELECT * FROM posts
								ORDER BY post_title
							";

				return $db->select($query);
			}

			public function post($postid) {
				global $db;

				$query = "
								SELECT * FROM posts
								WHERE ID = '$postid'
							";

				return $db->select($query);
			}
		}
	}

	$query = new QUERY;
?>
