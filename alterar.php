<?php
  $codigo=$_POST['codigo'];

  $conn = new mysqli('localhost', 'root', 'root', 'sgpv');
  if ($conn->connect_error) {
    die('Falha de conexao: '.$conn->connect_error);
  } else {
    $query="select * from utente";
    $result=mysqli_query($conn, $query);
  }
?>

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
		<h1> Alterar Dados do Utente no Sistema</h1> 
  <h2> Preencha o formulário com os dados novos do utente, mas tem de preencher todo o formulario</h2><br />


<form action="alterar-bd.php" method="post">
  <label for="codigo">Codigo do Utente</label>
  <?php
    echo '<input type="text" name="codigo" id="codigo" value="'.$codigo.'">';
  ?>
  <br><br>
<!--Codigo do Utente 
<fieldset>
  <legend>Identificao do Utente</legend>
  <table cellspacing="10">
    <tr>
      <td>
        <label for="codigo">Codido fo Utente: </label>
      </td>
      <td align="left">
        <input type="nummber" name="codigo" id="codigo" value="" required="">
      </td>
    </tr>
  </table>
</fieldset>
<br>
-->

<!-- DADOS PESSOAIS-->
<fieldset>
 <legend>Dados Pessoais</legend>
 <table cellspacing="10">
  <?php
    while ($rows=mysqli_fetch_assoc($result)) {
      if ($rows['codigo_utente']==$codigo) {
  ?>
      <tr>
       <td>
        <label for="nome">Nome Completo do Utente: </label>
       </td>
       <td align="left">
        <?php
          echo '<input type="text" name="nome" id="nome" value="'.$rows['nome_utente'].'">';
        ?>
       </td>
      </tr>

      <tr>
       <td>
        <label for="doc">No. Documento: </label>
       </td>
       <td align="left">
        <?php
          echo '<input type="text" name="doc" id="doc" size="13" maxlength="13" value="'.$rows['nr_documento'].'">';
        ?>
       </td>
      </tr>
      <tr>
       <td>
        <label for="tpDoc">Tipo de Documento:</label>
       </td>
       <td align="left">
        <?php
        echo '<label for="bi">BI</label><input type="radio" name="tpDoc" id="tpDoc" value="'.$rows['tp_documento'].'"><label for="carta">Carta de Conducao</label><input type="radio" name="tpDoc" id="tpDoc" value="'.$rows['tp_documento'].'">';
        ?>
       </td>
      </tr>
        </table>
      </fieldset>
      <br/>

      <!--ENDERECO -->
      <fieldset>
        <legend>Dados de Endereco</legend>
        <table cellspacing="10">
          <tr>
            <td>
              <label for="endereco">Endereco:</label>
            </td>
            <td align="left">
              <?php
                echo '<input type="text" name="endereco" id="endereco" value="'.$rows['endereco'].'">';
              ?>
            </td>
          </tr>
        </table>
      </fieldset>
      <br />

      <!--DETALHES DE CONTACTO -->
      <fieldset>
        <legend>Contancto</legend>
        <table cellspacing="10">
          <tr>
            <td>
              <label for="email">E-mail:</label>
            </td>
            <td align="left">
              <?php
                echo '<input type="text" name="email" id="email" value="'.$rows['email'].'">';
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <label for="telefone">Telefone 1:</label>
            </td>
            <td align="left">
              <?php
                echo '<input type="tel" name="telefone" id="telefone" pattern="[0-9]{9}" value="'.$rows['telefone'].'">';
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <label for="telefone">Telefone 2:</label>
            </td>
            <td align="left">
              <?php
                echo '<input type="tel" name="telefone2" id="telefone2" pattern="[0-9]{9}" value="'.$rows['telefone2'].'">';
              ?>
            </td>
          </tr>
        </table>
      </fieldset>
      <br>

      <!-- TERMOS DE PAGAMENTO -->
      <fieldset>
        <legend>Termos de Pagamento</legend>
        <table cellspacing="10">
          <tr>
            <td>
              <label for="pagamento">Preferencia de Pagamento:</label>
            </td>
            <td align="left">
              <?php
                echo '<label for="mensal">Mensal</label>';
                echo '<input type="radio" name="pagamento" id="pagamento" value="'.$rows['termos_pagamento'].'">';
                echo '<label for="hora">Por Hora</label>';
                echo '<input type="radio" name="pagamento" id="pagamento" value="'.$rows['termos_pagamento'].'">';
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <label for="tipoUtente">Tipo de Utente:</label>
            </td>
            <td align="left">
              <?php
                echo '<select name="utente" id="utente" value="'.$rows['tp_utente'].'">';
                echo '<option value="estudante">Estudante</option>';
                echo '<option value="outro">Outro</option>';
                echo '</select>';
              ?> 
            </td>
          </tr>
        </table>
      </fieldset>
  <?php
      }
    }
  ?>

<br>
<br>
<input type="submit" name="enviar" id="enviar" value="Enviar">
<input type="reset" id="limpar" value="Limpar">
</form>
	</section>

</body>
</html>