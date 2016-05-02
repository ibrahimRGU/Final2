<?php
	include('login.php'); // Include Login Script

	if ((isset($_SESSION['username']) != '')) 
	{
		header('Location: photos.php');
		//SESSION TIMEOUT TWO MINUTES
	if(isset($_SESSION['last-activity']) && time() - $_SESSION['last-activity'] > 120) {
    // session inactive more than 2 min
    header('location: /logout.php?timeout=1');
}

$_SESSION['last-activity'] = time(); // update last activity time stamp

if(time() - $_SESSION['created'] > 120) {
    // session started more than 10 min ago
    session_regenerate_id(true); // change session id and invalidate old session
    $_SESSION['created'] = time(); // update creation time
}
		
		
	}	//END OF SEESION CODES
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Login Form with Session</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<div class="main">
<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;">Welcome to Photo Commenter</h1>
    <div class="formbox">
        <h3>Login Form</h3>
        <br><br>
        <form method="post" action="">
            <label>Username:</label><br>
            <input type="text" name="username" placeholder="username" /><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" placeholder="password" />  <br><br>
            <input type="submit" name="submit" value="Login" />
        </form>
        <div class="error"><?php echo $error;?></div>
        <div class="register">You can register <a href="register.php"> here </a> </div>
    </div>

</div>
</body>
</html>
