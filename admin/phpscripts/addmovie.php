<?php

	function addPost( $title, $story, $release) {
		include('connect.php');



				//Add to database
				$qstring = "INSERT INTO tbl_post VALUES(NULL,'{$title}','{$story}','{$release}')";
				//echo $qstring;
				$result = mysqli_query($link, $qstring);
				if($result){
					$qstring2 = "SELECT * FROM tbl_post ORDER BY post_id DESC LIMIT 1";
					$result2 = mysqli_query($link, $qstring2);

				}
				redirect_to("admin_posts.php");

		mysqli_close($link);
	}

	function addStudentPost( $title, $story, $release) {
		include('connect.php');



				//Add to database
				$qstring = "INSERT INTO tbl_studentPost VALUES(NULL,'{$title}','{$story}','{$release}')";
				//echo $qstring;
				$result = mysqli_query($link, $qstring);
				if($result){
					$qstring2 = "SELECT * FROM tbl_studentPost ORDER BY s_post_id DESC LIMIT 1";
					$result2 = mysqli_query($link, $qstring2);

				}
				redirect_to("student_posts.php");

		mysqli_close($link);
	}



?>
