<?php
	require_once('phpscripts/config.php');

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>The one ring to control all rings...</title>
</head>
<body>
	<?php
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = 1;
		echo single_edit($tbl, $col, $id);
	?>
</body>
</html>
