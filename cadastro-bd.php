<?php
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$nrdoc = $_POST['doc'];
	$tpdoc = $_POST['tpDoc'];
	$rua = $_POST['rua'];
	$nrcasa = $_POST['nrCasa'];
	$bairro = $_POST['bairro'];
	$provincia = $_POST['provincia'];
	$distrito = $_POST['distrito'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$telefone2 = $_POST['telefone2'];
	$pagamento = $_POST['pagamento'];
	$tputente = $_POST['utente'];

	//concatenar algumas variaveis para evitar muitos campos
	$nome_completo = $nome. " ". $sobrenome;
	$endereco = $rua.", ".$nrcasa.", ".$bairro.", ".$provincia."-".$distrito;

	//Conexao com a base de dados
	$conn = new mysqli('localhost', 'root', 'root', 'sgpv');
	if ($conn->connect_error) {
		die('Falha de conexao: '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into utente(nome_utente, nr_documento, tp_documento, endereco, email, telefone, telefone2, termos_pagamento, tp_utente) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssiiss", $nome_completo, $nrdoc, $tpdoc, $endereco, $email, $telefone, $telefone2, $pagamento, $tputente);
		$stmt->execute();
		include 'return-menu.html';
		//echo "Yeeeesssssssssss";
		$stmt->close();
		$conn->close();
	}
?>