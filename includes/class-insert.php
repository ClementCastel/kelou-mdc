<?php
	require_once('class-db.php');

	if ( !class_exists('INSERT') ) {
		class INSERT {
			public function post($postdata) {
				global $db;

				$kind = serialize($postdata['post_kind']);

				$query = "
								INSERT INTO posts (post_title, post_date, post_real, post_actors, post_kind, post_duration, post_language, post_subs, post_quality, post_synopsis, post_ba)
								VALUES ('$postdata[post_title]', '$postdata[post_date]', '$postdata[post_real]', '$postdata[post_actors]', '$kind', '$postdata[post_duration]', '$postdata[post_language]', '$postdata[post_subs]', '$postdata[post_quality]', '$postdata[post_synopsis]', '$postdata[post_ba]')
							";

				return $db->insert($query);
			}
		}
	}

	$insert = new INSERT;
?>
