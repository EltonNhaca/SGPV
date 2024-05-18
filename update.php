<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Alterar Dados do Utente | SGPV</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
	<style type="text/css">
		.logo{
			width: 10%;
			position: absolute;
			top: 4%;
			left: 5%;
		}

		#header {
			background: linear-gradient(rgba(0, 0, 0, 0.5), #009688) ,url(images/placegar-parque-estacionamento-4.jpg);
			height: 150px;
		}

		.banner-header {
			text-align: center;
			color: #fff;
			padding-top: 50px;
		}

		.banner-header h1 {
			font-size: 130px;
			font-family: 'Playfair Display', serif;
		}

		.banner-header p {
			font-size: 20px;
			font-style: italic;
		}

		#main {
			width: 50%;
			margin: auto;
		}

	</style>
</head>
<body>
	<section id="header">
		<img src="images/onepark.png" class="logo">

		<div class="banner-header">
			<h2>S.G.P.V.</h2>
			<p>Garantimos seguranca a sua viatura</p>
		</div>
	</section>
	<br>
	<br>
	<br>

	<section id="main">
		<form action="alterar.php" method="post">
			<fieldset>
				<legend>Introduza o codigo do Utente</legend>
				<table cellspacing="10">
					<tr>
						<td>
							<label for="codigo">Codido do Utente: </label>
						</td>
						<td align="left">
							<input type="number" name="codigo">
						</td>
					</tr>
				</table>
			</fieldset>
			<br>
			<br>
			<input type="submit" name="enviar" id="enviar" value="Buscar">
		</form>
	</section>
</body>
</html>