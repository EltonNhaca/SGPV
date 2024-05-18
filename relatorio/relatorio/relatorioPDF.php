<?php
	$conn = new mysqli('localhost', 'root', 'root', 'sgpv');

	if ($conn->connect_error) {
		die('Erro na conexao com a base de dados: '.$conn->connect_error);
	}

   	// Consulta para calcular a soma dos valores de "saidas" nos últimos 30 dias
    $resultSaidas = "SELECT SUM(Valor_pagar) AS ValorTotalPagar
        FROM Pagamento
        WHERE Codigo_utente IN (
            SELECT Codigo_utente
            FROM entrada_saida
            WHERE Hora_entrada >= DATE_SUB(NOW(), INTERVAL 30 DAY))";
    $rs = $conn->query($resultSaidas);

    if ($rs->num_rows > 0) {
       	$rowSaidas = $rs->fetch_assoc();
       	$totalHora = $rowSaidas['ValorTotalPagar'];

       	require('fpdf/fpdf.php');

       	$rel = new FPDF();
       	$rel->AddPage();

       	$rel->SetFont('Times', 'B', 24);
       	$rel->Cell(0, 10, 'Relatorio Mensal', 0, 1, 'C');
       	$rel->SetFont('Times', '', 12);
       	$rel->Cell(40, 10, 'Data do Relatorio:', 0, 0);
        $dataHora = date("Y/m/d H:i:s");
        $rel->Cell(40, 10, $dataHora, 0, 1, 'L');
       	$rel->SetFont('Times', 'B', 14);
        $rel->Cell(40, 10, '', 0, 1);
       	$rel->SetFont('Times', 'B', 16);
       	$rel->Cell(40, 10, 'Receita nos Ultimos 30 dias', 0, 1);
       	$rel->SetFont('Times', '', 14);
       	$rel->Cell(40, 10, 'Este relatoio reflete a atividade do estacionamento nos ultimos 30 dias.', 0, 1);
       	$rel->Cell(75, 10, 'A receita total nesse periodo foi de:',0, 0);
       	$rel->Cell(40, 10, $totalHora.'Mts', 0, 1, 'L');
       	$rel->Cell(40, 10, '', 0, 1);
       	//$rel->Cell(40, 10, '<hr>', 0, 1);
        $rel->Cell(10,10, '----------------------------------------------------------------------------------------------', 0, 1);

        $rel->Cell(60, 10, 'Codigo do Pagamento', 1);
        $rel->Cell(40, 10, 'Codigo do Utente', 1);
        $rel->Cell(40, 10, 'Valor a Pagar', 1);
        $rel->Ln();

        $tabelaP = "SELECT codigo_pagamento, codigo_utente, valor_pagar FROM pagamento";
        $paga = mysqli_query($conn, $tabelaP);

        while ($row = mysqli_fetch_assoc($paga)) {
          $rel->Cell(60, 10, $row['codigo_pagamento'], 1);
          $rel->Cell(40, 10, $row['codigo_utente'], 1);
          $rel->Cell(40, 10, $row['valor_pagar'], 1);
          $rel->Ln();
        }

       	$rel->Output();
    }
    $conn->close();
?>
            
