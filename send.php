<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mizuno - Fale com a Mizu</title>

	<link rel="stylesheet" href="vendor/normalize-css/normalize.css">
	<link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="vendor/milligram/dist/milligram.min.css">
	<link rel="stylesheet" href="dist/main.css">
</head>
<body>

	<style type="text/css">
		.content {
			position: relative;
			padding: 10px;
			text-align: center;
			max-width: 1000px;
			margin: 0 auto;
			padding-top: 100px;
		}
	</style>

	<header>
		<div class="container">
			<div class="logo">
				<a href="https://www.mizuno.com.br/" target="_blank">
					<img src="img/logo-mizuno.webp">
					<span class="logo-bg"></span>
				</a>
			</div>
		</div>
	</header>

	<?php

		require_once __DIR__ . '/functions.php';	
		
		if (empty($_REQUEST['email'])) {			
			showError('Não há endereço de destino ou o endereço não é válido');
		} else {
			
			$USER_EMAIL = $_REQUEST['email'];
			$EMAIL_CONTENT = getEmailBody($_REQUEST, $_FILES);

			$SEND_EMAIL = sendEmail([ EMAIL_DEFAULT_DESTINY, $USER_EMAIL ], EMAIL_DEFAULT_SUBJECT, $EMAIL_CONTENT);
			$SEND_EMAIL ? showSuccess() : showError('Erro inesperado ao enviar a solicitação :(');
		
		}

	?>

	<footer></footer>
</body>
</html>