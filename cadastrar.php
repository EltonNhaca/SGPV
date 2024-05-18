<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Cadastrar Utente | SGPV</title>
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
			width: 60%;
			padding-left: 20%;
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
		<h1> Cadastro do Utente no Parque de Maxaquene</h1> 
  <h2> Preencha o formulário abaixo para cadastrar o utente no sistema</h2><br />

<form action="cadastro-bd.php" method="post">

<!-- DADOS PESSOAIS-->
<fieldset>
 <legend>Dados Pessoais</legend>
 <table cellspacing="10">
  <tr>
   <td>
    <label for="nome">Nome: </label>
   </td>
   <td align="left">
    <input type="text" name="nome" id="nome" required>
   </td>
   <td>
    <label for="sobrenome">Sobrenome: </label>
   </td>
   <td align="left">
    <input type="text" id="sobrenome" name="sobrenome" required>
   </td>
  </tr>
  <!--
  <tr>
   <td>
    <label>Nascimento: </label>
   </td>
   <td align="left">
    <input type="text" name="data" id="dia" size="2" maxlength="2" value="dd"> 
   <input type="text" name="data" id="mes" size="2" maxlength="2" value="mm"> 
   <input type="text" name="data" id="ano" size="4" maxlength="4" value="aaaa">
   </td>
  </tr>
-->
  <tr>
   <td>
    <label for="doc">No. Documento: </label>
   </td>
   <td align="left">
    <input type="text" name="doc" id="doc" size="13" maxlength="13" required> 
   </td>
  </tr>
  <tr>
   <td>
    <label for="tpDoc">Tipo de Documento:</label>
   </td>
   <td align="left">
   	<label for="bi">BI</label><input type="radio" name="tpDoc" id="tpDoc" value="BI">
   	<label for="carta">Carta de Conducao</label><input type="radio" name="tpDoc" id="tpDoc" value="Carta de Conducao">
    <!--<input type="text" name="cpf" size="9" maxlength="9"> - <input type="text" name="cpf2" size="2" maxlength="2">-->
   </td>
  </tr>
 </table>
</fieldset>

<br />
<!-- ENDEREÇO -->
<fieldset>
 <legend>Dados de Endereço</legend>
 <table cellspacing="10">

  <tr>
   <td>
    <label for="rua">Rua:</label>
   </td>
   <td align="left">
    <input type="text" name="rua" id="rua">
   </td>
   <td>
    <label for="nrCasa">Numero:</label>
   </td>
   <td align="left">
    <input type="text" name="nrCasa" id="nrCasa" size="4">
   </td>
  </tr>
  <tr>
   <td>
    <label for="bairro">Bairro: </label>
   </td>
   <td align="left">
    <input type="text" name="bairro" id="bairro">
   </td>
  </tr>
  <tr>
   <td>
    <label for="provincia">Provincia:</label>
   </td>
   <td align="left">
    <select name="provincia"> 
      <option value="mc">Cidade de Maputo</option> 
      <option value="mp">Maputo Provincia</option> 
      <option value="gz">Gaza</option> 
      <option value="sf">Sofala</option> 
      <option value="mn">Manica</option> 
      <option value="ib">Inhambane</option> 
      <option value="tt">Tete</option> 
      <option value="zz">Zambezia</option> 
      <option value="nm">Nampula</option> 
      <option value="cb">Cabo Delgado</option> 
      <option value="ns">Niassa</option>
      <option value="ot">Exterior</option>
   </select>
   </td>
  </tr>
  <tr>
   <td>
    <label for="distrito">Distrito: </label>
   </td>
   <td align="left">
    <input type="text" name="distrito" id="distrito">
   </td>
  </tr>
  <!--
  <tr>
   <td>
    <label for="cep">CEP: </label>
   </td>
   <td align="left">
    <input type="text" name="cep" size="5" maxlength="5"> - <input type="text" name="cep2" size="3" maxlength="3">
   </td>
  </tr>-->
 </table>
</fieldset>
<br />

<!-- DETALHES DE CONTACTO -->
<fieldset>
 <legend>Contacto</legend>
 <table cellspacing="10">
  <tr>
   <td>
    <label for="email">E-mail: </label>
   </td>
   <td align="left">
    <input type="text" name="email" id="email">
   </td>
  </tr>
  <tr>
   <td>
    <label for="telefone">Telefone 1:</label>
   </td>
   <td>
   	<!--validar o valor introduzir para seguir o padrao +258 8XXXXXXXX-->
    <input type="tel" name="telefone" id="telefone" pattern="[0-9]{9}" required>

   </td>
  </tr>
  <tr>
   <td>
    <label for="telefone2">Telefone 2: </label>
   </td>
   <td align="left">
    <input type="tel" name="telefone2" id="telefone2" pattern="[0-9]{9}">
   </td>
  </tr>
  <!--
  <tr>
   <td>
    <label for="pass">Senha: </label>
   </td>
   <td align="left">
    <input type="password" name="pass">
   </td>
  </tr>
  <tr>
   <td>
    <label for="passconfirm">Confirme a senha: </label>
   </td>
   <td align="left">
    <input type="password" name="passconfirm">
   </td>
  </tr>
-->
 </table>
</fieldset>
<br />

<!-- Dados de Modo de Pagamento -->
<fieldset>
	<legend>Termos de Pagamento</legend>
	<table cellspacing="10">
		<tr>
			<td>
				<label for="pagamento">Preferencia de Pagamento:</label>
			</td>
			<td align="left">
				<label for="mensal">Mensal</label>
				<input type="radio" name="pagamento" id="pagamento" value="Mensal">
				<label for="hora">Por Hora</label>
				<input type="radio" name="pagamento" id="pagamento" value="Hora">
			</td>
		</tr>

		<tr>
			<td>
				<label for="tipoUtente">Tipo de Utente:</label>
			</td>
			<td align="left">
				<select name="utente" id="utente" required>
					<option value="estudante">Estudante</option>
					<option value="outro">Outro</option>
				</select>
			</td>
		</tr>
	</table>
</fieldset>
<br>
<br>
<input type="submit" name="enviar" id="enviar" value="Enviar">
<input type="reset" id="limpar" value="Limpar">
</form>
	</section>

</body>
</html>