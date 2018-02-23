<?php
	require_once('class-db.php');

	if ( !class_exists('INSERT') ) {
		class INSERT {
			public function post($postdata) {
				global $db;

				$kind = serialize($postdata['post_kind']);
				$_FILES['post_pic']['name'] = $postdata['post_title'];
				$path = 'C:\wamp64\www\kelou-mdc\uploads/'.$_FILES['post_pic']['name'].'.jpg';
				move_uploaded_file($_FILES['post_pic']['tmp_name'], $path);
				$path_file = "./uploads/".$postdata['post_title'].".jpg";

				$query = "
								INSERT INTO posts (post_title, post_date, post_real, post_actors, post_kind, post_duration, post_language, post_subs, post_quality, post_synopsis, post_ba, post_pic)
								VALUES ('$postdata[post_title]', '$postdata[post_date]', '$postdata[post_real]', '$postdata[post_actors]', '$kind', '$postdata[post_duration]', '$postdata[post_language]', '$postdata[post_subs]', '$postdata[post_quality]', '$postdata[post_synopsis]', '$postdata[post_ba]', '$path_file')
							";

				return $db->insert($query);
			}
		}
	}

	$insert = new INSERT;
?>
