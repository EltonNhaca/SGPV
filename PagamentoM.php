<?php
    session_start();
    include_once('config.php');
    $sql = "SELECT * FROM pagamento ORDER BY codigo_pagamento DESC";
    $result = $conexao->query($sql);
   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Pagamentos</title>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">

    </style>
</head>
<body>

<div id="table-data">
    <div class="order">
         <div class="head">
            <h3>Pagamentos</h3>
         </div>
    <table class = "table">
       <thead>
        <tr>
            <th scope="col">Código do pagamento</th>
            <th scope="col">Código do utente</th>
            <th scope="col">valor a pagar</th>
            <!--<th scope="col">termos de pagamento</th>-->
            <th scope="col">...</th>
            
        </tr>
       </thead>
       <tbody>
        <?php 
            while($user_data = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$user_data['codigo_pagamento']."</td>";
                echo "<td>".$user_data['codigo_utente']."</td>";
                echo "<td>".$user_data['valor_pagar']."</td>";
                //echo "<td>".$user_data['termos_pagamento']."</td>";
                echo "</tr>";
                
            }
        ?>
       </tbody>
    </table>
    </div>

    <!-- Adicione o botão switch aqui -->
   
</div>

<!--<button onclick="toggleMode()">Mudar Modo</button> -->

<script>
    function toggleMode() {
        const body = document.body;
        body.classList.toggle("dark-mode");
    }
</script>

</body>
</html>