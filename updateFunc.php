<?php
    include_once('config.php');
    //include_once('alterar-bd.php');
    //$codigo = $_POST['codigo'];
    $id= $_POST['codigo'];
    $nome1 = $_POST['nome'];
    $name2 = $_POST['sobrenome'];
    $nr = $_POST['doc'];
    $tipo =$_POST['utente'];

    $nome = $nome1." ".$name2;
    $sqlSelect = "SELECT * FROM funcionario WHERE codigo_func=$id";
    //$result = $conexao->query($sqlSelect);

   // $result = $conexao->query($query);
  

   $query = "UPDATE `funcionario` set `nome_func`='".$nome."', `nr_doc_func`='".$nr."', `tp_funcionatio`='".$tipo."' WHERE  `codigo_func`=$id";
   $r = $conexao->query($query);
    

    if ($r===true) {

        include 'Funcionarios.php';
      
    } else
    {
        
        print_r ("Not this time");

    }
    mysqli_close($conexao);
?>