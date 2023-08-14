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
            if(!empty($_GET['id'])){
                
                    include('conexao.php');
                    $id = $_GET['id'];
                    

                    $sql = "SELECT* FROM colaboradores WHERE id=$id";

                    $resultado = $mysqli->query($sql) or trigger_error($mysqli->error);
                
                    if($resultado->num_rows > 0){
                        while($user_data = mysqli_fetch_assoc($resultado)){
                            $nome = $user_data['nome'];
                            $senha = $user_data['senha'];
                        }
                       
                    }else{
                        header('Location: inicio.php');
                    }
            }
        ?>
        </div>
        <h1 class="text-login">
            Editar perfil
        </h1>
        <form action="saveEdit.php" method="POST">
            <p>

                <input class="input" type="text" name="nome" placeholder="Nome" value="<?php echo $nome?>">
            </p>    
            
            <p>

                <input class="input" type="text" name="senha" placeholder="Senha" value="<?php echo $senha?>">
            </p>
            
            <p>
                <input type="hidden" name="id" value=<?php echo $id?>>
            </p>
            
            <button type="submit" name="update" id="update">Enviar</button>
            
        </form>
        <a class="btn-sair" href="inicio.php">Voltar</a>
    </div>
    <script src="./javascript/main.js"></script>
</body>
</html>