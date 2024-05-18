<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

	//Conexao com a base de dados
	$conn = new mysqli('localhost', 'root', 'root', 'sgpv');
	if ($conn->connect_error) {
		die('Falha de conexao: '.$conn->connect_error);
	}else {
		$stmt = $conn->prepare("select * from funcionario where nome_func = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$stmt_result = $stmt->get_result();

		if ($stmt_result->num_rows > 0) {
			$data = $stmt_result->fetch_assoc();
			if ($data['codigo_func'] == $password) {
				if ($data['tp_funcionatio'] == 'Gerente') {
					include 'index.php';
				} else{
					echo "<h3>Sem privilegios necessarios</h3>";
					?>
					<!--
					<button type="button" name="button"><a href="MenuInicial.html"></a>Voltar</button>
				-->
					<div class="btn">
						<a href="MenuInicial.html"><span></span>Voltar!</a>
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
				<?php	
				}
				
			} else{
				echo "<h3>Credenciais invalidas!</h3>";
			}
		} else{
			echo "<h3>If de No rows selected</h3>";
		}
	}
?>