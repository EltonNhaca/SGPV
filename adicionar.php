<?php
    include_once('config.php');
    //include_once('alterar-bd.php');
    //$codigo = $_POST['codigo'];
   // $id= $_POST['codigo_utente'];
    $nome1 = $_POST['nome'];
    $name2 = $_POST['sobrenome'];
    $nr = $_POST['doc'];
    $tipo =$_POST['utente'];

    $nome = $nome1." ".$name2;
   
    if(empty ($nome1) || empty ($name2) || empty ($nr) || empty ($tipo))
    {
        echo "sho";
    } 
    else{
        $sql = "INSERT INTO funcionario (nome_func, nr_doc_func, tp_funcionatio) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        $stmt = mysqli_stmt_init($conexao);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            die(mysqli_error($conexao));
        }

        mysqli_stmt_bind_param($stmt, "sss", $nome, $nr, $tipo);

        if (mysqli_stmt_execute($stmt)){
            header ("Location: Funcionarios.php");
           // exit();
        }
        else{
            echo "no";
        }

        //$stmt->execute();

        $stmt->close();

    }
?>