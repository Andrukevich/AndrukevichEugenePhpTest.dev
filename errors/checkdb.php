<?php include_once("includes/header.php"); ?>

<!--Выводит ошибки если была попытка подключится к БД, когда она еще не была создана-->
	<body class="center">
		<div class="animated rollIn">
			<h1 class="text-center text-danger">404</h1>
			<h1 class="text-center text-danger">Проверьте создана ли БД</h1>
			<form action="index.php" method="post">
				<input type="text" class="hidden" name="send">
				<button type="submit" class="btn btn-danger center-block">
					<span class="h2">Вернуться к созданию БД</span>
				</button>
			</form>
		</div>
	</body>

<?php include_once("includes/footer.php"); ?>