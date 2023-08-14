<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['id'])){
        die("<p>Acesso negado, volte para a pagina de <a href=\"index.php\">login</a></p>");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <div class="container conatiner-create">
        <div class="text-login">
        <?php
            if(isset($_POST['nome']) || isset($_POST['senha'])){
                if(strlen($_POST['nome']) == 0){
                    echo "<p class='caso-erro'>
                                Preencha o nome
                            </p>";
                }else if(strlen($_POST['senha']) == 0){
                    echo "<p class='caso-erro'>
                                Preencha a senha
                            </p>";
                }else{
                    include('conexao.php');

                    $nomeCreate = $_POST['nome'];
                    $senhaCreate = $_POST['senha'];

                    $sql = "INSERT INTO colaboradores (nome, senha)VALUES ('$nomeCreate', '$senhaCreate')";

                    $resultado = $mysqli->query($sql) or trigger_error($mysqli->error);
                
                    if($resultado == true){
                    echo"Enviado com sucesso";
                    }else{
                    echo"Falha ao enviar";
                    }
                
                    $mysqli->close();
        
                }
            }
        ?>
        </div>
        <h1 class="text-login">
            Criar novo usuário
        </h1>
        <form action="create.php" method="POST">
            <p>    
                <input class="input" type="text" name="nome" placeholder="Nome">
            </p>
            <p>
                <input class="input" type="password" name="senha" placeholder="Senha">
            </p>
            <p>
                <button type="submit" name="submit">Enviar</button>
            </p>
        </form>
        <a class="btn-sair" href="inicio.php">Voltar</a>
    </div>
    <script src="./javascript/main.js"></script>
</body>
</html>