<?php
    include('conexao.php');  
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
    <div class="container">
        <h1 class="text-login">
            Login
        </h1>
        <p class="caso-erro">
            <?php include('validacao.php')?>
        </p>
        <form class="formulario" action="" method="POST">
            <p>
                
                <input class="input" type="text" name="nome" placeholder="Login">
            </p>
            <p>
                <input class="input" type="password" name="senha" placeholder="Senha">
            </p>
            <p>
                <button type="submit">Entrar</button>
            </p>
        </form>
    </div>
    <script src="./javascript/main.js"></script>
</body>
</html>