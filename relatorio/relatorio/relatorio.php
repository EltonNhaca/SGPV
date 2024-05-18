<!DOCTYPE html>
<html>
 
<head>
    <title>Relatório Mensal</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/relatorio.js" defer></script>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
 
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin: 20px;
        }
 
        h1 {
            text-align: center;
        }
    </style>
</head>
 
<body>
    <div class="container" id="content">
        <h1>Relatório Mensal</h1>
        <p>Data do Relatório:
            <?php echo date("d/m/Y"); ?>
        </p>
 
        <h2>Receita nos Últimos 30 Dias</h2>
        <p>
            <?php
            // Conecta-se ao banco de dados
           // include("conections.php"); // Certifique-se de que este arquivo está correto
            
            // Verifica se a conexão foi estabelecida com sucesso
            
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $db_name = "sgpv";
            $mysqli = new mysqli($servername, $username, $password, $db_name, 3306);
            if ($mysqli->connect_error) {
                die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
            }
 
            // Data atual
            /*
            $today = date("Y-m-d");
 
            // Data 30 dias atrás
            $date30DaysAgo = date("Y-m-d", strtotime("-30 days"));
 
            // Consulta para calcular a soma dos valores de "pagamentos" nos últimos 30 dias
            $resultPagamentos = $mysqli->query("SELECT SUM(valor_a_pagar) as total_receita FROM pagamentos WHERE data_pagamento BETWEEN '$date30DaysAgo' AND '$today'");
            $rowPagamentos = $resultPagamentos->fetch_assoc();
            $totalMes = $rowPagamentos['total_receita'];
            */
 
            // Consulta para calcular a soma dos valores de "saidas" nos últimos 30 dias
            $resultSaidas = $mysqli->query("SELECT SUM(Valor_pagar) AS ValorTotalPagar
                FROM Pagamento
                WHERE Codigo_utente IN (
                    SELECT Codigo_utente
                    FROM entrada_saida
                    WHERE Hora_entrada >= DATE_SUB(NOW(), INTERVAL 30 DAY));
                ");
            $rowSaidas = $resultSaidas->fetch_assoc();
            $totalHora = $rowSaidas['ValorTotalPagar'];
 
            // Soma total
            //$receitaTotal = $totalMes + $totalHora;
 
            /*
            echo "Receita nos últimos 30 dias: " . number_format($totalHora, 2) . " Mts";
            */
            ?>
        </p>
        <p>Este relatório reflete a atividade do estacionamento nos últimos 30 dias.<br> A receita total nesse período foi
            de
            <?php echo "Receita nos últimos 30 dias: " . number_format($totalHora, 2); ?> Mts.
        </p>
        <p>É importante continuar monitorando e otimizando a operação do estacionamento para garantir eficiência e
            satisfação dos clientes.</p>
 
        <!-- Informações de Contato -->
        
        <hr>
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
            $sql = "SELECT * FROM pagamento ORDER BY codigo_pagamento DESC";
            $result = $mysqli->query($sql);

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
    <br>
    <!-- Botões esterilizados para voltar e baixar o relatório -->
    <button onclick="history.back()">Voltar</button>
    <a href="relatorioPDF.php"><button id="generate-pdf">Baixar Relatório</button></a>
</body>
 
</html>
 