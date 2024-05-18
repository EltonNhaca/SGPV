<?php

    
    if(!empty($_GET['id'])){

        include_once('config.php');

        $id=$_GET['id'];
        $sqlSelect = "SELECT * FROM funcionario WHERE codigo_func=$id";
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {

            while($user_data = mysqli_fetch_assoc($result)){
                $nome = $user_data['nome_func'];
                $nr = $user_data['nr_doc_func'];
                $tipo = $user_data['tp_funcionatio'];
            }
        }
    }else{
      //  header('Location: index.html');
    }
    print_r($nome);
     
       // $query = "update `funcionario` set `nome_func`='".$nome."', `nr_documento`='".$nr."', `tp_funcionatio`='".$tipo."' where `codigo_utente`=$id";
       // $r = $conexao->query($query);
       // print_r('já está'); 
  //  include_once('update.php');
    
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Alterar Dados do funcioanrio | SGPV</title>
	
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

	<!--<section id="header">
		<img src="images/onepark.png" class="logo">

		<div class="banner-header">
			<h2>S.G.P.V.</h2>
			<p>Garantimos seguranca a sua viatura</p>
		</div>
	</section>-->

	<section class="main">
		<h1> Alterar Dados do Funcionario no Sistema</h1> 
  <h2> Preencha o formulário com os dados novos do funcionario, mas tem de preencher todo o formulario</h2><br />

<form action="update.php" method="post">

<!--Codigo do Funcionario -->
<fieldset>
  <legend>Identificao do Utente</legend>
  <table cellspacing="10">
    <tr>
      <td>
        <label for="codigo">Codido do funcionario: </label>
      </td>
      <td align="left">
        <input type="nummber" name="codigo" id="codigo" value="<?php echo $id?>" required="">
      </td>
    </tr>
  </table>
</fieldset>
<br>

<!-- DADOS PESSOAIS-->
<fieldset>
 <legend>Dados Pessoais</legend>
 <table cellspacing="10">
  <tr>
   <td>
    <label for="nome">Nome: </label>
   </td>
   <td align="left">
    <input type="text" name="nome" id="nome" value="<?php echo $nome?>" required>
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
    <input type="text" name="doc" id="doc" size="13" maxlength="13" value="<?php echo $nr?>" required> 
   </td>
  </tr>
  <tr>
   <td>
    
    <!--<input type="text" name="cpf" size="9" maxlength="9"> - <input type="text" name="cpf2" size="2" maxlength="2">-->
   </td>
  </tr>
 </table>
</fieldset>

<br />
<!-- ENDEREÇO -->

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
	<legend>Tipo de funcioanrio</legend>
	<table cellspacing="10">
		
		<tr>
			<td>
				<label for="utente">Tipo de funcionario:</label>
			</td>
			<td align="left">
				<select name="utente" id="utente"  required>
					<option value="municipal">Municipal</option>
					<option value="outro">Parque</option>
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