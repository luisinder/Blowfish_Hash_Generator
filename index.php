<?php
function crypt_blowfish($password, $dig = 5) {
	$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$salt = sprintf('$2a$%02d$', $dig);
	for($i = 0; $i < 22; $i++)
	{
		$salt .= $set_salt[mt_rand(0, 10)];
	}
	return crypt($password, $salt);
}

if (isset($_REQUEST['submit']))
{

	if (isset($_REQUEST['passwd']))
	{
		$password = crypt_blowfish($_REQUEST['passwd'],rand(1,10));
	}
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Blowfish HASH Generator</title>
	<link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>
	<div class="grid-third float-center styledbox">
		<h1>Write de password</h1>		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">			
			<div class="styledbox grid-half float-center">					
				<p><b>Password:</b> <input type="box" class="box" name="passwd"  value="" ></p>
			</div>
			<hr/>				
			<input type="submit" name="submit" class="btn btn-block" value="Generate">
		</form>
		<?php if (isset($password)) echo "HASH: ". $password ?>		
	</div>
</body>
</html>