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
        <h1>Contact Us</h1>
        <p>If you have any feedback or would like to contact us please fill the form below!</p>
		<?php
			if(isset($_POST['submitted'])){
			$dbc=mysqli_connect('localhost', 'root', '');
			mysqli_select_db($dbc, 'assignmentwebsite');
	
			$problem=FALSE;
			if(!empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['title']) && !empty($_POST['review'])){
				$name=trim($_POST['name']);
				$category=trim($_POST['category']);
				$title=trim($_POST['title']);
				$review=trim($_POST['review']);
			}else{
				$problem=TRUE;
				print '<p>Please check fields!</p>';
			}
			if(!$problem){
				$query = "INSERT INTO review(name, category, title, review, date) VALUES ('$name', '$category', '$title', '$review', NOW())";
			}
			if(@mysqli_query($dbc, $query)){
				print '<p>Review submitted!</p>';
			}
			mysqli_close($dbc);
		}
		?>
        <form action="write_review.php" name="write_review" method="post">
          <div class="form_settings">
            <p><span>Name</span><input type="text" name="name" /></p>
			<p><span>Category</span>
			<select name="category">
				<option value="Video Games">Video Games</option>
				<option value="Movies">Movies</option>
				<option value="Music">Music</option>
			</select>
			</p>
			<p><span>Title</span><input type="text" name="title" /></p>
            <p><span>Write A Review</span><textarea rows="8" cols="50" name="review"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="Submit" type="submit" name="submitted" value="submit" /></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
