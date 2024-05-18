<?php
    session_start();
    include_once('config.php');
    $sql = "SELECT * FROM utente ORDER BY codigo_utente DESC";
    $result = $conexao->query($sql);
   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Utentes</title>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<div id = "table-data">

    <div class="order">
        <div class="head">
            <h3>Utente</h3>
        </div >

        <table>
            <thead>
                <tr>
                    <th scope="col">Código do Utente</th>
                    <th scope="col">Nome do Utente</th>
                    <th scope="col">Nr de domcumento</th>
                    <th scope="col">tipo de documento</th>
                    <th scope="col">tipo de documento</th>
                    <th scope="col">tipo de documento</th>
                    <th scope="col">telefone</th>
                    <th scope="col">telefone alternativo</th>
                    <th scope="col">termos de pagamento</th>
                    <th scope="col">tipo de utente</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$user_data['codigo_utente']."</td>";
                        echo "<td>".$user_data['nome_utente']."</td>";
                        echo "<td>".$user_data['nr_documento']."</td>";
                        echo "<td>".$user_data['tp_documento']."</td>";
                        echo "<td>".$user_data['endereco']."</td>";
                        echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['telefone']."</td>";
                        echo "<td>".$user_data['telefone2']."</td>";
                        echo "<td>".$user_data['termos_pagamento']."</td>";
                        echo "<td>".$user_data['tp_utente']."</td>";
                     
                        echo "</tr>";

                        
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>



<script src="script.js">
  
</script>

</body>
</html>