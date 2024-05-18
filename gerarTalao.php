<?php 
	//include 'registrar-entrada.php';
	$conn = new mysqli('localhost', 'root', 'root', 'sgpv');

	if ($conn->connect_error) {
		die('Erro na conexao com a base de dados: '.$conn->connect_error);
	}

	//Recupere os dados do formulario
	$codigo = $_POST['codigo'];

	//Inserir os dados na base de dados (registro de entrada)
	$sql = "INSERT INTO entrada_saida (codigo_utente, hora_entrada, activo) VALUES ('$codigo', NOW(), 1)";

	if ($conn->query($sql) === TRUE) {
		$last_insert_id = $conn->insert_id;
		require('fpdf/fpdf.php');

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);

		$talao = "SELECT codigo_utente, hora_entrada FROM entrada_saida WHERE codigo_utente=$codigo";
		$result = $conn->query($talao);

		//Adicionar dados da base de dados no PDF
		/*
		while ($row = $result->fetch_assoc()) {
	   		$pdf->Cell(40, 10, $row['codigo_utente']);
	 		$pdf->Cell(40, 10, $row['hora_entrada']);
		}
		*/

		if ($row = $result->fetch_assoc()) {
			$pdf->SetFont('Times', 'B', 26);
			$pdf->Cell(0, 10, 'T a l a o', 0, 1, 'C',);
			$pdf->SetFont('Times', 'I', 16);
			$pdf->Cell(0, 10, 'S.G.P.V.', 0, 1, 'C');
			$pdf->Cell(10,10, '----------------------------------------------------------------------------------------------', 0, 1);
			$pdf->Cell(40, 10, '', 0, 1);
			$pdf->SetFont('Times', '', 14);
			$pdf->Cell(0, 10, 'Bem-vindo ao Parque de Estacionamento do Municipio de Maxaquene', 0, 1, 'C');
			$pdf->Cell(0, 10, 'Aqui a sua viatura e viagiada com maior seguranca.', 0, 1, 'C');
			$pdf->Cell(40, 10, '', 0, 1);
			$pdf->SetFont('Arial', '', 14);
			$pdf->Cell(140, 10, 'Codigo do Talao: ', 0, 0, 'L');
			$pdf->Cell(40, 10, $last_insert_id, 0, 1, 'R');
			$pdf->Cell(140, 10, 'Codigo do Utente: ', 0, 0, 'L');
			$pdf->Cell(40, 10, $row['codigo_utente'], 0, 1, 'R');
			$pdf->Cell(140, 10, 'Data de entrada: ', 0, 0, 'L');
			$pdf->Cell(40, 10, $row['hora_entrada'], 0, 1, 'R');
		}

		//Incluir a biblioteca PHP QR Code
		include 'phpqrcode/qrlib.php';

		//Dados para exibir no QR Code
		$dados = 'www.google.com';

		//Nome da QR code
		$output_file = 'qrcode.png';

		//Gerar QR code
		QRcode::png($dados, $output_file);
		$qrCodePath = 'qrcode.png';
		$qrCodeWidth = 50; // Largura do QR code
		$qrCodeHeight = 50; // Altura do QR code
		$pdfWidth = 210; // Largura da página em milímetros (padrão A4)
		$pdfHeight = 297; // Altura da página em milímetros (padrão A4)
		$margin = 10; // Margem da página

		$x = ($pdfWidth - $qrCodeWidth) - $margin;
		$y = ($pdfHeight - $qrCodeHeight) - $margin;

		$pdf->Image($qrCodePath, $x, $y, $qrCodeWidth, $qrCodeHeight);

		// Gerar o PDF e exibir
		$pdf->Output();


		//Exibir o qr code
		//$pdf->Image($output_file, 10, 30, 210, 297);		

		//Gerar o PDF e exibir
		//$pdf->Output();
	}
	$conn->close();

?>