<!DOCTYPE HTML>
<html>

<head>
  <?php
	include 'adminheader.php';
	?>
</head>

<body>
  <div id="main">
    <div id="site_content">
      <div id="content">

	<?php
	$dbc = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($dbc, 'assignmentwebsite');
	
	$query='SELECT * FROM review ORDER BY date DESC';
	
	if($r = mysqli_query($dbc, $query)){
		while($row = mysqli_fetch_array($r)){
			print "<h2>{$row['title']} by {$row['name']} {$row['date']} in {$row['category']}</h2>
					<p>{$row['review']}</p>
					<a href=\"adminEditReview.php?id={$row['title']}\">Edit</a>
					<a href=\"adminDeleteReview.php?id={$row['title']}\">Delete</a>
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
