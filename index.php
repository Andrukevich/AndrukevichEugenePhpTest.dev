<?php include_once("includes/data.php"); ?>
<?php include_once("includes/header.php"); ?>

<body class="animated bounce">

<!--Проверка ввод исходных данных для создания БД-->
<section class="text-justify center col-sm-offset-1 col-sm-10 ">
	<h2 class="bg-info">База данных не идет вместе с файлами, БД создается локально на каждой машине, для обеспечения
		безопасности данные берутся не из формы, ввод происходит вручную вручную в файле config.php(переменные
		обязательные: $host, $user, $pass(в файле includes/data.php); необязательные(могут оставаться по-умолчанию): $dbname, $uploaddir  $uploaddir). Введите данные в указанный файл и нажмите на кнопку "Создать БД", если создана
		- "БД создана"</h2>
	<article>

<!--		Создание БД-->
		<div class="col-sm-6">
			<form action="createdb.php" method="post">
				<input type="text" class="hidden" name="send">
				<button type="submit" class="btn btn-warning btn-lg btn-block">
					<span class="h2">Создать БД</span>
				</button>
			</form>
		</div>

<!--		Проверка на наличие БД-->
		<div class="col-sm-6">
			<form action="checkbd.php" method="post">
				<input type="text" class="hidden" name="send">
				<button type="submit" class="btn btn-success btn-lg btn-block">
					<span class="h2">БД создана</span>
				</button>
			</form>
		</div>
	</article>
</section>
</body>

<?php include_once("includes/footer.php"); ?>








