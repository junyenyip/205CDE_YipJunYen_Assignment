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
			if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['feedback'])){
				$name=trim($_POST['name']);
				$email=trim($_POST['email']);
				$feedback=trim($_POST['feedback']);
			}else{
				$problem=TRUE;
				print '<p>Please check fields!</p>';
			}

			if(!$problem){
				$query = "INSERT INTO feedback(name, email, feedback, date) VALUES ('$name', '$email', '$feedback', NOW())";
			}
			if(@mysqli_query($dbc, $query)){
				print '<p>Thank you for your feedback!</p>';
			}
			mysqli_close($dbc);
		}
		?>
        <form action="contact.php" method="post">
          <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="name" value="" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="email" value="" /></p>
            <p><span>Feedback message</span><textarea class="contact textarea" rows="8" cols="50" name="feedback"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="Submit" type="submit" name="submitted" value="submit" /></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
