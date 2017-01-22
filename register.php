<?php
session_start();
require_once "includes/functions.php";
require_once "includes/connection.php";

//Прием данных и создание пользователя в БД в случае валидных данных
if (isPost()) {

	$stmt = $pdo->prepare("INSERT INTO users (name_user, email, password) VALUES (:name_user, :email, :password)");
	$stmt->bindParam(':name_user', $_POST['name_user']);
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', $_POST['pass']);
	$stmt->execute();

	$stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email AND password = :password ');
	$stmt->execute(array('email' => $_POST['email'],
		'password' => $_POST['pass']));
	$row = $stmt->fetch();

	if(strlen($row['id'])!=0) {
		$_SESSION['user_id']=$row['id'];
		header("Location: upload.php");

	} else {
		require_once("errors/repeatemail.php");
	}

}


?>






<?php include_once("includes/header.php"); ?>

<body class="animated bounce">

<!--Форма отправки данных пользователя для регистрации-->
<form class="center form-horizontal" name="register" action="" method="post">
	<p class="h1 text-center">Регистрация</p>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Name</label>
		<div class="col-sm-4">
			<input name="name_user" type="name" class="form-control" id="inputName3" placeholder="Name" required>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Email</label>
		<div class="col-sm-4">
			<input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email" required>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-4 control-label">Password</label>
		<div class="col-sm-4">
			<input name="pass" type="password" class="form-control" id="inputPassword3" placeholder="Не менее 8 символов" pattern="\w{8,}" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<button type="submit" class="btn btn-default" name="login">Sign up</button>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<p >Уже зарегистрированы? <a href= "login.php">Выполнить вход</a>!</p>
		</div>
	</div>
</form>




</body>

<?php include_once("includes/footer.php"); ?>

