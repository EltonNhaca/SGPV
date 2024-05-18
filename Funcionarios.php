<?php
    session_start();
    include_once('config.php');
    $sql = "SELECT * FROM funcionario ORDER BY codigo_func DESC";
    $result = $conexao->query($sql);
   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Funcionários</title>

<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<!-- My CSS -->
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<div id="table-data">
    <div class="order">
        <div class="head">
            <h3>Funcionário</h3>
        </div>

    <!-- Adicione o botão switch aqui -->
    <input type="checkbox" id="switch-mode" hidden>
    <label for="switch-mode" class="switch-mode"></label>

    <table class = "table">
       <thead>
        <tr>
            <th scope="col">Código do funcioanrio</th>
            <th scope="col">Nome do funcionario</th>
            <th scope="col">Nr de domcumento</th>
            <th scope="col">tipo de documento</th>
            <th scope="col">...</th>
        </tr>
       </thead>
       <tbody>
        <?php 
            while($user_data = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$user_data['codigo_func']."</td>";
                echo "<td>".$user_data['nome_func']."</td>";
                echo "<td>".$user_data['nr_doc_func']."</td>";
                echo "<td>".$user_data['tp_funcionatio']."</td>";
                echo "<td> 
                        <a class='btn btn-sm btn-primary' href='alterarFunc-bd.php?id=$user_data[codigo_func]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                        </svg>
                        </a>
                     </td>";
                echo "<td> 
                        <a class='btn btn-sm btn-primary' href='delete.php?id=$user_data[codigo_func]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                        </svg>
                        </a>
                    </td>";
                echo "</tr>";
              
            }
        ?>
       </tbody>
    </table>
    </div>
</div>

<div id="add">
    <form action="add.php">
        <input type="submit" name="enviar" id="enviar" value="Enviar">
    </form> 
</div>

<script src = "script.js">
  
</script>

</body>
</html>