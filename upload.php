<?php
session_start();

require_once "includes/data.php";
require_once "includes/functions.php";
require_once "includes/connection.php";

//Добавление файла в БД с привязкой к текущему пользователю
if(isPost()){

	$stmt = $pdo->prepare("INSERT INTO files(user_id, full_path, path, name_file, type_file) 
							VALUES (:user, :full_path, :path, :name_file, :type_file)");
	$stmt->bindParam(':user', $user);
	$stmt->bindParam(':full_path', $full_path);
	$stmt->bindParam(':path', $path);
	$stmt->bindParam(':name_file', $name_file);
	$stmt->bindParam(':type_file', $type_file);

	$user = $_SESSION['user_id'];
	$full_name = $_FILES['file']['name'];
	$full_path = __DIR__  . "\\{$uploaddir}" . "\\{$full_name}";
	$path = "\\{$uploaddir}" . "\\{$full_name}";
	$arr = explode(".", $full_name);
	$name_file = $arr[0];
	$type_file = $arr[1];
	$stmt->execute();

	move_uploaded_file($_FILES['file']['tmp_name'], $full_path);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>


<?php include_once("includes/header.php"); ?>

<body class="animated">

<section class="col-sm-12">
	<div class="clearfix ">
		<span  class="h2 pull-left animated bounceInRight">Добро пожаловать, <span><?php

				$stmt = $pdo->prepare('SELECT name_user FROM users WHERE id = :id');
				$stmt->execute(array('id' => $_SESSION['user_id']));
				$row = $stmt->fetch();

				echo $row['name_user'];

				?>! </span></span>

		<p class="h2 text-right pull-right animated bounceInLeft"><a id="nodecor"  href="logout.php">Выйти</a> из системы</p>
	</div>

	<form enctype = 'multipart/form-data' method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">

		<div class="form-group">
			<label class="h1" for="file">Загрузка файла</label>
			<input id="zoominp" name="file" type="file" id="file">
		</div>
		<button type="submit" class="btn btn-success btn-lg">Зугрузить</button>
	</form>
</section>

<section>

<!--	Вывод файлов текущего пользоателя-->
	<div class="col-sm-6">

		<h2>Ваши загруженные файлы</h2>

		<?php

		$stmt = $pdo->prepare('SELECT id, path, name_file, type_file FROM files WHERE user_id=:user_id ORDER BY id DESC');
		$stmt->execute(array('user_id' =>  $_SESSION['user_id']));

		static $countcolumnuser = 0;
		$chechclearfix = "";
		$count = 0;

		while ($row = $stmt->fetch()) : ?>

			<?php

			$count += 1;

			$check_format = checkFormat($row['type_file'], $row['path'], $row['name_file']);

			$countcolumn += $occupetedcolumn;
			if ($countcolumn % 12 == "clearfix") : ?>
				<div class="clearfix mb-1">
			<?php endif; ?>

			<div class="uploaded-user pull-left col-sm-<?= $occupetedcolumn ?> bordoub">
				<img class="otstup" src="<?= $check_format['path'] ?>" alt="<?= $check_format['name_file'] ?>">
				<p class="h3 text-center"><?= $check_format['name_file'] ?></p>
			</div>

			<?php
			if ($countcolumn % 12 == 0) : ?>
				</div>
			<?php endif; ?>

		<?php endwhile; ?>

		<?php if($count == 0) : ?>
			<h3 class="bg-info">Вы не загрузили еще файлы</h3>
		<?php endif; ?>


	</div>

<!--	Вывод файлов всех пользователей-->
	<div class="col-sm-6">
		<h2>Загруженные файлы всех пользователей</h2>

		<?php

		$stmt = $pdo->query('SELECT id, path, name_file, type_file FROM files ORDER BY id DESC');

		static $countcolumnusers = 0;
		$chechclearfix = "";
		$count = 0;


		while ($row = $stmt->fetch()) : ?>
			<?php
			$count += 1;
			$check_format = checkFormat($row['type_file'], $row['path'], $row['name_file']);

			$countcolumnusers += $occupetedcolumn;
			if ($countcolumnusers % 12 == "clearfix") : ?>
				<div class="clearfix mb-1">
			<?php endif; ?>

			<div class="uploaded-user pull-left col-sm-<?= $occupetedcolumn ?> bordoub">
				<img class="otstup" src="<?= $check_format['path'] ?>" alt="<?= $check_format['name_file'] ?>">
				<p class="h3 text-center"><?= $check_format['name_file'] ?></p>
			</div>


			<?php
			if ($countcolumnusers % 12 == 0) : ?>



				</div>
			<?php endif; ?>

		<?php endwhile; ?>

		<?php if($count == 0) : ?>
			<h3 class="bg-info">Никто из пользователей файлы не загружал</h3>
		<?php endif; ?>

	</div>

</section>

<?php include_once("includes/footer.php"); ?>

