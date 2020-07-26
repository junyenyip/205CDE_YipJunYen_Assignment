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
        <h1>Login</h1>
		<a href="http://localhost/assignment/register.php">If you don't have an account yet register here.</a>
		<?php
			if(isset($_POST['submitted'])){
				if(!empty($_POST['username']) && !empty($_POST['password'])){
					if(($_POST['username'])=="admin" && ($_POST['password'])=="admin"){
					session_start();
					$_SESSION['username']=$_POST['username'];
					$_SESSION['password']=$_POST['password'];
					print '<p>Login success!</p>';
					echo '<a href="http://localhost/assignment/admin.php">Admin page</a>';
					}
				}else{
					print '<p>Please check fields!</p>';
				}
			}
		?>
        <form action="login.php" method="post">
          <div class="form_settings">
            <p><span>Userame</span><input type="text" name="username" value="" /></p>
            <p><span>Password</span><input type="text" name="password" value="" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="Submit" type="submit" name="submitted" value="submit" /></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
