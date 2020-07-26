<!DOCTYPE HTML>
<html>

<head>
  <?php
	include 'header.php';
	?>
</head>

<body>
  <div id="main">
    <div id="site_content">
      <div id="content">
	<?php
	$dbc = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($dbc, 'assignmentwebsite');
	
	$query='SELECT * FROM adminupdate ORDER BY date DESC';
	
	if($r = mysqli_query($dbc, $query)){
		while($row = mysqli_fetch_array($r)){
			print "<h1>{$row['title']} {$row['date']}</h1>
					<p>{$row['adminUpdate']}</p>
					";
		}
	}
	mysqli_close($dbc);
	?>
      </div>
    </div>
  </div>
</body>
</html>
