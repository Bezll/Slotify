<!DOCTYPE html>
<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Welcome to Slotify!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>

<body>
	<div id="background">

		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<P>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bobFossil12" required>
					</P>
					<P>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Your Password" required>
					</P>	

					<button type="submit" name="loginButton">LOG IN</button>

					<div class="hasAccountText">
							<span id="hideLogin"> Don't have an account yet? Sign up here.</span>
					</div>

				</form>

				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your free account</h2>
					<P>
						<?php echo $account->getError(Constants::$usernameNameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" placeholder="e.g. bobFossil12" value="<?php getInputValue('username')?>" required>
					</P>
					<P>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">First name</label>
						<input id="firstName" name="firstName" type="text" placeholder="e.g. Bob" value="<?php getInputValue('firstName')?>" required>
					</P>
					<P>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Last name</label>
						<input id="lastName" name="lastName" type="text" placeholder="e.g. Fossil" value="<?php getInputValue('lastName')?>" required>
					</P>
					<P>
						<?php echo $account->getError( Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="e.g. bobfossil@gmail.com" value="<?php getInputValue('email')?>" required>
					</P>
					<P>
						<label for="email2">Confirm email</label>
						<input id="email2" name="email2" type="email" placeholder="e.g. bobfossil@gmail.com" value="<?php getInputValue('email2')?>" required>
					</P>

					<P>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" placeholder="Your Password" required>
					</P>	
					<P>
						<label for="password2">Confirm password</label>
						<input id="password2" name="password2" type="password" placeholder="Your Password" required>
					</P>	

					<button type="submit" name="registerButton">SIGN UP</button>

						<div class="hasAccountText">						
							<span id="hideRegister"> Already have an account? Log in here.</span>

					</div>
				</form>

			</div>
		</div>
	</div>
</body>

</html>