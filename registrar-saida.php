<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro de Saida | SGPV</title>
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

		.btn a {
			width: 200px;
			text-decoration: none;
			margin: 10px 10px;
			padding: 12px 10px;
			color: black;
			border: 1px solid #808080;
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
		<h1>Registro de Saida de uma Viatura</h1>

		<fieldset>
			<legend>Saida</legend>
			<table cellspacing="10">
				<tr>
					<h3>Saida registrada com sucesso</h3>
					<?php
					// Conecte-se ao banco de dados (ajuste as configurações de conexão)
					$db = new mysqli('localhost', 'root', 'root', 'sgpv');

					if ($db->connect_error) {
					    die('Erro na conexão com o banco de dados: ' . $db->connect_error);
					}

					$id = $_POST['id'];
					// Atualize a saída da viatura no banco de dados
					$sql = "UPDATE entrada_saida SET hora_saida = NOW() WHERE id_inout = $id";
					$out = "UPDATE entrada_saida SET activo =0 WHERE id_inout=$id";
					$valor = "SELECT codigo_utente, hora_entrada, hora_saida, (TIMESTAMPDIFF(MINUTE, hora_entrada, NOW())/60) * 50 AS valor_pagar FROM entrada_saida WHERE id_inout=$id";
					$result = $db->query($valor);

					if ($db->query($sql) === TRUE && $db->query($out)) {
						$row = $result->fetch_assoc();
						$data = date('Y/m/d');
						$hora = date('H:i:s');
						$valor_pagar=$row['valor_pagar'];
						echo "Data de saida: ".$data."<br>";
						echo "Hora de saida: ".$hora."<br>";
						echo "<p> Valor a pagar:    ".$valor_pagar."Mts";

					} else {
						echo "Erro ao registrar saída: " . $db->error;
					}
					$db->close();
				?>

				<div class="btn">
					<a href="pagamento.php"><span></span>Pagamento</a>
					<a href="main.php"><span></span>Menu Principal</a>
				</div>
					
				</tr>
			</table>
		</fieldset>
	</section>

</body>
</html>