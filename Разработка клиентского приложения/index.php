 <?php
	// подключение БД 
		$connect=@new mysqli("localhost","root","","han_proekt");
		$connect->set_charset("utf-8");
		if ($connect->connect_error)
		die("Ошибка подключения".$connect->connect_error);

	// вывод сообщения
		$message="";
		if (isset($_GET["massage"]))
		$message = sprintf('<div class="message"></div>', $_GET["massage"]);

	// Sostavleni zaproca
 		$zapros = "SELECT * FROM `applications` ";
	// Otpravka zaprosa v bazu
 		$Rezult = $connect->query($zapros);
	// Proverka na oshibki
 		if (!$Rezult) die ("SOS!!!".$connect->connect_error);
	// poluchenie dannih nz rezult
 		$app = "";
		while ($row=$Rezult->fetch_assoc())
		$app = sprintf('
 						<div class="col">
						 <img src="%s">
						 <h3>%s</h3>
						 
						 
						 </div>',
						 $row["path_image_before"], $row["title"]);
 


?>




<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Demoexam2022</title>
	<link rel="stylesheet" href="style01.css">
</head>
<body>
	
 
	<header>
		<div class="top">
			<h1>
			<p><a href="index.html"><img src="images/ico01.png"  alt=""></a>
				 ООО Техносервис
				</h1>
			<h2> Ремонт и диагностика любой сложности</h2>
		</div>
		<div class="content">
			<nav>
				<p><a href="#register">Регистрация</a></p>
				<p><a href="index.html"><img src="images/ico01.png" alt=""></a></p>
				<p><a href="#login">Войти</a></p>
			</nav>
		</div>
	</header>

<?= $massadge ?>


	<main>
		<div class="content">
			
			<div class="head">Последние одобренные заявки</div>
			<p class="small">Количество одобренные заявок - 5</p>
			<!-- Vivod dannih zaprosa-->
			<div class="row">
				<?=$app ?>

				<!-- 
					<div class="col">
					<img src="images/RemGdu.jpg" alt="">
					<h3>Одобренная заявка</h3>
					<p>Категория заявки: <b>Первая категория</b></p>
					<p class="small">2022-01-21 09:00:00</p>
				</div>
				<div class="col">
					<img src="images/RemGdu.jpg" alt="">
					<h3>Одобренная заявка</h3>
					<p>Категория заявки: <b>Вторая категория</b></p>
					<p class="small">2022-01-21 09:00:00</p>
				</div>
				<div class="col">
					<img src="images/RemGdu.jpg" alt="">
					<h3>Одобренная заявка</h3>
					<p>Категория заявки: <b>Первая категория</b></p>
					<p class="small">2022-01-21 09:00:00</p>
				</div>
				<div class="col">
					<img src="images/RemGdu.jpg" alt="">
					<h3>Одобренная заявка</h3>
					<p>Категория заявки: <b>Вторая категория</b></p>
					<p class="small">2022-01-21 09:00:00</p>
				</div>
				-->
			</div>
		

			<div class="head" id="register">Регистрация</div>
			<form method="POST">
				<input type="text" name="fio" placeholder="ФИО (кириллица, дефис, пробел, до 32 символов)" pattern="[а-яА-ЯёЁ\-\s]{1,32}" required>
				<input type="text" name="login" placeholder="Логин (латиница, до 16 символов)" pattern="[a-zA-Z]{1,16}" required>
				<input type="email" name="email" pattern=".{1,32}" placeholder="Email (наличие @, до 32 символов)" required>
				<input type="password" name="password" pattern=".{1,32}" placeholder="Пароль (до 32 символов)" required>
				<input type="password" name="password_check" placeholder="Повтор пароля" required>
				<div class="line">
					<input type="checkbox" required>
					<p>Согласие на обработку персональных данных</p>
				</div>
				<button>Зарегистрироваться</button>
			</form>

			<div class="head" id="login">Войти</div>
			<form action="profile.html" method="POST">
				<input type="text" name="login" placeholder="Логин">
				<input type="password" name="password" placeholder="Пароль">
				<button>Войти</button>
			</form>

		</div>
	</main>

</body>
</html>