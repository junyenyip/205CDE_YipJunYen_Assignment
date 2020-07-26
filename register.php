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
			if(isset($_POST['submitted'])){
			$dbc=mysqli_connect('localhost', 'root', '');
			mysqli_select_db($dbc, 'assignmentwebsite');
	
			$problem=FALSE;
			if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])){
				$username=trim($_POST['username']);
				$password=trim($_POST['password']);
				$email=trim($_POST['email']);
			}else{
				$problem=TRUE;
				print '<p>Please check fields!</p>';
			}

			if(!$problem){
				$query = "INSERT INTO account(username, password, email, date) VALUES ('$username', '$password', '$email', NOW())";
			}
			if(@mysqli_query($dbc, $query)){
				print '<p>Thanks for registering!</p>';
			}
			mysqli_close($dbc);
		}
		?>
        <form action="register.php" method="post">
          <div class="form_settings">
            <p><span>Userame</span><input type="text" name="username" value="" /></p>
            <p><span>Password</span><input type="text" name="password" value="" /></p>
			<p><span>Email</span><input type="text" name="email" value="" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="Submit" type="submit" name="submitted" value="submit" /></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
