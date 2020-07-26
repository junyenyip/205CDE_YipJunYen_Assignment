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
			session_start();
			unset($_SESSION);
			session_destroy();
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
