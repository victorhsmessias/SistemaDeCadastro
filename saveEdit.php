<?php 
    include('conexao.php');

    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        $sqlUpdate = "UPDATE colaboradores SET nome='$nome', senha='$senha' WHERE id='$id'";
        $resultado = $mysqli->query($sqlUpdate);
    }
    header('Location: inicio.php');
?>