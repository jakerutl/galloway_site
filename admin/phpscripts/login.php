<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$password}'";
		$user_set = mysqli_query($link, $loginstring);
		//echo mysqli_num_rows($user_set);
		if(mysqli_num_rows($user_set)){
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name']= $founduser['user_fname'];
			if(mysqli_query($link, $loginstring)){
				$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
				$updatequery = mysqli_query($link, $update);
				if($founduser['user_level'] < 2){
					$newquery = "UPDATE `tbl_user` SET `user_new` = {$newnum} WHERE `user_id` = {$id}";
					redirect_to("admin_index.php");
				}else{
					$newquery = "UPDATE `tbl_user` SET `user_new` = {$newnum} WHERE `user_id` = {$id}";
					redirect_to("student_posts.php");
				}
			}
			redirect_to("admin_index.php");
		}else{
			$message = "Woops, looks like you spelt something wrong!";
			return $message;
		}

		mysqli_close($link);
	}
?>
