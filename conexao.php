<?php 
$usuario = 'root';
$senha = '';
$database = 'base_de_dados';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
    die("Falha ao conectar ao banco de dados" . $mysqli->error);
}


?>