<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Pagamento | SGPV</title>
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

		.main {
			width: 50%;
			padding-left: 25%;
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

	<section class="main">
		<h1>Pagamento do Utente</h1>

		<form action="pagamento-bd.php" method="post">
			<!--Dados do Utente -->
			<fieldset>
				<legend>Detalhes do Utente</legend>
				<table cellspacing="10">
					<tr>
						<td>
							<label for="codigo">Codigo de Utente</label>
						</td>
						<td align="left">
							<input type="number" name="codigo" id="codigo" min="000000" max="999999" required>
						</td>
					</tr>
				</table>
			</fieldset>

			<!--Modo de Pagamento
			<fieldset>
				<legend>Forma de Pagamento</legend>
				<table cellspacing="10">
					<tr>
						<td>
							<h4>Carteiras Moveis</h4>
						</td>
					</tr>
					<tr>
						<td>
							<label for="mpesa">Mpesa</label>
							<input type="radio" name="pagamento" id="pagamento" value="Mpesa">
							<label for="emola">E-mola</label>
							<input type="radio" name="pagamento" id="pagamento" value="emola">
							<label for="contaMovel">Conta Movel</label>
							<input type="radio" name="pagamento" id="pagamento" value="Conta Movel">
						</td>
					</tr>

					<tr>
						<td>
							<h4>Transferencia Bancaria</h4>
						</td>
					</tr>
					<tr>
						<td>
							<label for="bci">BCI</label>
							<input type="radio" name="pagamento" id="pagamento" value="bci">
							<label for="millenium">Millenium</label>
							<input type="radio" name="pagamento" id="pagamento" value="Millenium">
							<label for="moza">Moza Banco</label>
							<input type="radio" name="pagamento" id="pagamento" value="Moza Banco">
						</td>
					</tr>
				</table>
			</fieldset>
			-->
			<br>
			<!--
			<label for="valor">Valor a Pagar:</label>
			<input type="number" name="valor" id="valor">
		-->
			<br>
			<br>
			<input type="submit" name="submit" value="Calcular">
			<input type="reset" name="limpar" value="Cancelar">
		</form>
	</section>
</body>
</html>