<?php
session_start();

require_once "includes/functions.php";
require_once "includes/connection.php";

//Берет id текущего пользователя
if (isPost()) {

	$stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email AND password = :password ');
	$stmt->execute(array('email' => $_POST['email'],
		'password' => $_POST['pass']));
	$row = $stmt->fetch();

	if(strlen($row['id'])!=0) {
		$_SESSION['user_id']=$row['id'];
		header("Location: upload.php");

	} else {
		require_once("errors/repeatenter.php");
	}
}

?>

<?php include_once("includes/header.php"); ?>

<body class="animated bounce">

<!--Форма отправки данных зарегистрированного пользователя для входа-->
<form class="center form-horizontal" name="register" action="" method="post">
	<p class="h1 text-center">Вход зарегистрированного пользователя</p>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Email</label>
		<div class="col-sm-4">
			<input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email" required>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-4 control-label">Password</label>
		<div class="col-sm-4">
			<input name="pass" type="password" class="form-control" id="inputPassword3" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<button type="submit" class="btn btn-default" name="login">Sign in</button>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<p >Не зарегистрированы? <a href= "register.php">Пройти регистрацию</a>!</p>
		</div>
	</div>
</form>

</body>

<?php include_once("includes/footer.php"); ?>

