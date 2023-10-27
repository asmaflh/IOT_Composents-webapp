<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <title>Document</title>
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="login.php" method="post">
			<h1>Sign in</h1>
			<span>start your journey with us!</span>
			<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
			<input type="text" placeholder="Username" name="username"/>
			<input type="password" placeholder="Password" name="password" />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
		
			<div class="overlay-panel overlay-right">
        <img src="images/esilogo.png" alt="" width="100px" height="100px">
				<h1>Hello, there !</h1>
				<p>Start using our website to get the most incredible experience.</p>
			</div>
		</div>
	</div>
</div>


</body>
</html>
