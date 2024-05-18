<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro de Entrada | SGPV</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initio-scale-1.0">
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
			width: 400px;
			margin: auto;
		}

		.botao a {
			width: 200px;
			text-decoration: none;
			margin: 10px 10px;
			padding: 12px 10px;
			color: black;
			border: 1px solid #808080;
			position: relative;
		}

		.print {
			display: none;
			margin: 10px;
			padding: 20px;
			border: 1px solid black;
			border-radius: 30px;
			width: 600px;
		}

		.print h1 {
			border-bottom: 1px solid black;
			margin-bottom: 20px;
		}

		.print h2 {
			padding: 10px;
			border: 1px solid black;
			border-radius: 20px;
			display: inline-block;
			margin-left: 10px;
		}

		@media print {
			.print {
				display: block;
			}
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

	<section id="main">
		<h1>Pagamento do Utente</h1>

		<fieldset>
			<legend>Entrada</legend>
			<table cellspacing="10">
				<tr>
				<?php
					$codigo = $_POST['codigo'];
					//$pagamento = $_POST['pagamento'];
					//$valor = $_POST['valor'];


					//Conexao com a base de dados
					$conn = new mysqli('localhost', 'root', 'root', 'sgpv');

					if ($conn->connect_error) {
						die('Falha na conexao com a base de dados: '.$conn->connect_error);
					} else{
						$valor_mensal =3500;
						$sql= "SELECT u.codigo_utente, e.hora_entrada, e.hora_saida, u.tp_utente, u.termos_pagamento, 
								CASE 
									WHEN u.tp_utente = 'estudante' THEN
										CASE 
											WHEN u.termos_pagamento = 'Mensal' THEN
												$valor_mensal - ($valor_mensal * 0.5) 
												/*((TIMESTAMPDIFF(MINUTE, e.hora_entrada, e.hora_saida)/60) * 50) * 0.5 * 0.5*/
											WHEN u.termos_pagamento = 'Hora' THEN
												((TIMESTAMPDIFF(MINUTE, e.hora_entrada, e.hora_saida)/60) * 50) * 0.5
										END 
									ELSE 
										CASE
											WHEN u.termos_pagamento = 'Mensal' THEN
												/*((TIMESTAMPDIFF(MINUTE, e.hora_entrada, e.hora_saida)/60) * 50) * 0.25*/
												$valor_mensal - ($valor_mensal * 0.25)
											WHEN u.termos_pagamento = 'Hora' THEN
												((TIMESTAMPDIFF(MINUTE, e.hora_entrada, e.hora_saida)/60) * 50) * 1.0
										END 
								END AS valor_pagar
							FROM utente u
							JOIN entrada_saida e ON u.codigo_utente = e.codigo_utente";

						//Executar a consulta
						$result = $conn->query($sql);

						if ($result === FALSE) {
							die("Erro na consulta: ".$conn->error);
						} else {
							//Processar os resultados
							$row = $result->fetch_assoc();
							if ($row == TRUE) {
								$valor_pagar = $row['valor_pagar'];
								$stmt = $conn->prepare("insert into pagamento(codigo_utente, valor_pagar) values (?, ?)");
								$stmt->bind_param("ii", $codigo, $valor_pagar);
								$stmt->execute();

								echo "<br>";
								echo "Codigo do Utente: ".$codigo."<br>";
								echo "Valor a pagar: ".$valor_pagar."Mts";
							}
							/*while ($row) {
								$valor_pagar = $row['valor_pagar'];
								$stmt = $conn->prepare("insert into pagamento(codigo_utente, valor_pagar) values (?, ?)");
								$stmt->bind_param("ii", $codigo, $valor_pagar);
								$stmt->execute();

								echo "Codigo do Utente: ".$codigo."<br>";
								echo "Valor a pagar: ".$valor_pagar."Mts";

								//echo "Codigo do Utente: ".$row['codigo_utente']. "<br>";
								//echo "Valor a pagar: ".$row['valor_pagar'];
							}*/
						}

						
						/*
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
						$valor_pagar = $row['valor_pagar'];
						echo "<h3>O valor a pagar pelo utente e: ".$valor_pagar;
						*/
					}
				?>
					<br>
					<br>
					<div class="btn">
						<a href="return-menu.html"><span></span>Pagar</a>
					</div>
					<style type="text/css">
						.btn a {
							width: 200px;
							text-decoration: none;
							margin: 10px 10px;
							padding: 12px 10px;
							color: black;
							border: 1px solid #808080;
						}
					</style>
					<!--
					<button type="button" name="pagar" class="pagar"><a href="return-menu.html"></a>Pagar</button>";
				-->
				<?php
					$conn->close();
				?>
				</tr>
			</table>
		</fieldset>
	</section>
</body>
</html>