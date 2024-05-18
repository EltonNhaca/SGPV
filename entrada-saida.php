<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Controlo de Entradas e Saidas | SGPV</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
	<style type="text/css">
		* {
			box-sizing: border-box;
		}
		.logo{
			width: 10%;
			position: absolute;
			top: 4%;
			left: 5%;
		}

		#header {
			background: linear-gradient(rgba(0, 0, 0, 0.5), #009688) ,url(images/placegar-parque-estacionamento-4.jpg);
			background-size: cover;
			background-position: center;
			height: 100vh;
		}

		.banner-header {
			text-align: center;
			color: #fff;
			padding-top: 50px;
		}

		.banner-header h2 {
			font-size: 40px;
			font-family: 'Playfair Display', serif;
		}

		.banner-header p {
			font-size: 20px;
			font-style: italic;
		}

		#main {
			width: 1000px;
			height: 100px;
			position: absolute;
			left: 25%;
			margin-left: -35px;
			margin-top: -5px;
		}

		#main h2 {
			/*text-align: center;*/
			padding-left: 20%;
		}

		.botao a {
			width: 200px;
			text-decoration: none;
			margin: 10px 10px;
			padding: 12px 10px;
			color: white;
			border: 1px solid #808080;
			position: relative;
		}

		.row {
			margin-right: -5px;
			margin-left: -5px;
		}

		.column-left {
			float: left;
			width: 35%;
			padding: 3%;
			border: 1px solid white;
			margin-right: 2%;
		}

		.column-right {
			float: left;
			width: 35%;
			padding: 3%;
			border: 1px solid white;
			margin-left: 2%;
		}

		.content-text h3 {
			padding-top: 0px;
		}

		.row::after {
			content: "";
			clear: both;
			display: table;
		}
		/*
		.down {
			background: linear-gradient(rgba(0, 0, 0, 0.5), #009688);
			color: white;
			height: 150px;
			width: 75%;
		}
		*/

		.down {
			/*margin: 5%;*/
			padding-top: 5%;
		}
		
		.status {
			/*text-align: center;*/
			padding-right: 45%;
		}

		.aberto {
			padding-right: 30%;
			font-size: 30px;
		}

		.status h1 {
			font-size: 40px;
			padding-left: 150px;
		}

		.status h2 {
			font-size: 30px;
			font-family: 'Times New Roman', serif;
			padding-left: 30px;
		}

		table {
			border-collapse: collapse;
			border-spacing: 0;
			width: 80%;
		}

		th, td {
			text-align: left;
			padding: 16px;
		}

	</style>
</head>
<body>
	<section id="header">
		<img src="images/onepark.png" class="logo">

		<div class="banner-header">
			<h2>S.G.P.V.</h2>
			<p>Garantimos seguranca a sua viatura</p>
			<div id="main">
				<div class="row">
				<div class="column-left">
					<table cellspacing="10">
						<tr>
							<div class="content-text">
								<h3>Entrada</h3>
								<p>Registrar entrada de uma viatura no parque</p>
							</div>
							<div class="botao">
								<a href="entradas.html"><span></span>Registrar</a>
							</div>
						</tr>
					</table>
				</div>

				<div class="column-right">
					<table cellspacing="10">
						<tr>
							<div class="content-text">
								<h3>Saida</h3>
								<p>Registrar saida de uma viatura no parque</p>
							</div>
							<div class="botao">
								<a href="saidas.php"><span></span>Registrar</a>
							</div>
						</tr>
					</table>
				</div>
			</div>
			<!--<br>-->
			<div class="down">
				<div class="status">
					<h2>Numero de Lugares Disponiveis</h2>
					<?php
						// Conecte-se ao banco de dados (ajuste as configurações de conexão)
						$db = new mysqli('localhost', 'root', 'root', 'sgpv');

						if ($db->connect_error) {
						    die('Erro na conexão com o banco de dados: ' . $db->connect_error);
						}

						$sql = "SELECT COUNT(*) AS lugares_ocupados FROM entrada_saida WHERE activo = 1";
						$result = $db->query($sql);

						if($result->num_rows > 0){
							$row = $result->fetch_assoc();
							$lugares_ocupados=$row['lugares_ocupados'];
						} else{
							$lugares_ocupados = 0;
						}
						$db->close();
					?>
					<h1><?php echo $lugares_ocupados; ?>/100</h1>
				</div>
				<div class="aberto">
					<p>O parque do momento encontra-se <?php 
						$horaAtual = date("H");
						if ($horaAtual >= 6 && $horaAtual <= 23) {
							echo "aberto";
						} else{
							echo "fechado";
						}
					?>
					</p>
				</div>
			</div>
			</div>
			
		</div>
	</section>
	<br>
	<br>
	<br>

	<!--
	<section id="main">
		<h2>Controlo de Entradas e Saidas</h2>
	</section>
-->
</body>
</html>