<?php
    if(!empty($_GET['id'])){
                
        include('conexao.php');
        $id = $_GET['id'];
                    

        $sql = "SELECT* FROM colaboradores WHERE id=$id";

        $resultado = $mysqli->query($sql) or trigger_error($mysqli->error);
                
        if($resultado->num_rows > 0){
           $sqlDelete = "DELETE FROM colaboradores WHERE id=$id";
           $resultadoDelete = $mysqli->query($sqlDelete);
    }
    header('Location: inicio.php');
}
?>