<?php
	$codigo = $_POST['codigo'];
	$nome_completo = $_POST['nome'];
	$nrdoc = $_POST['doc'];
	$tpdoc = $_POST['tpDoc'];
	$endereco = $_POST['endereco'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$telefone2 = $_POST['telefone2'];
	$pagamento = $_POST['pagamento'];
	$tputente = $_POST['utente'];

	//Conexao com a base de dados
	$conn = new mysqli('localhost', 'root', 'root', 'sgpv');
	if ($conn->connect_error) {
		die('Falha de conexao: '.$conn->connect_error);
	}else{
		/*
		$stmt = $conn->prepare("insert into utente(nome_utente, nr_documento, tp_documento, endereco, email, telefone, telefone2, termos_pagamento, tp_utente) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssiiss", $nome_completo, $nrdoc, $tpdoc, $endereco, $email, $telefone, $telefone2, $pagamento, $tputente);
		$stmt->execute();
		echo "Yeeeesssssssssss";
		$stmt->close();
		$conn->close();
		*/

		//Consulta para Alterar os dados
		$query = "update `utente` set `nome_utente`='".$nome_completo."', `nr_documento`='".$nrdoc."', `tp_documento`='".$tpdoc."', `endereco`='".$endereco."', `email`='".$email."', `telefone`='".$telefone."', `telefone2`='!".$telefone2."', `termos_pagamento`='".$pagamento."', `tp_utente`='".$tputente."' where `codigo_utente`=$codigo";
		$result = mysqli_query($conn, $query);

		if ($result) {
			//include 'template/header.php';
			include 'return-menu.html';
			//echo "Yeeeesssssssssss";
		} else {
			echo "Not this time";
		}

		mysqli_close($conn);
	}
?>