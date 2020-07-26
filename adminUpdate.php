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
        <h1>Send Update</h1>
		<?php
			if(isset($_POST['submitted'])){
			$dbc=mysqli_connect('localhost', 'root', '');
			mysqli_select_db($dbc, 'assignmentwebsite');
	
			$problem=FALSE;
			if(!empty($_POST['title']) && !empty($_POST['adminUpdate'])){
				$title=trim($_POST['title']);
				$adminUpdate=trim($_POST['adminUpdate']);
			}else{
				$problem=TRUE;
				print '<p>Please check fields!</p>';
			}
			if(!$problem){
				$query = "INSERT INTO adminUpdate(title, adminUpdate, date) VALUES ('$title', '$adminUpdate', NOW())";
			}
			if(@mysqli_query($dbc, $query)){
				print '<p>Successful</p>';
			}
			mysqli_close($dbc);
		}
		?>
        <form action="adminUpdate.php" method="post">
          <div class="form_settings">
			<p><span>Title</span><input type="text" name="title" value="" /></p>
            <p><span>Update</span><textarea rows="8" cols="50" name="adminUpdate"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="Submit" type="submit" name="submitted" value="submit" /></p>
          </div>
        </form>
		<a href="updates.php">View update page</a>
      </div>
    </div>
  </div>
</body>
</html>
