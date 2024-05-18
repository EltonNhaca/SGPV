<?php
    if(!empty($_GET['id'])){
        include_once('config.php');
        $id=$_GET['id'];
        $sqlSelect = "SELECT * FROM funcionario WHERE codigo_func=$id";
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM funcionario WHERE codigo_func=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: Funcionarios.php');
?>