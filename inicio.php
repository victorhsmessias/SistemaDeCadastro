<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['id'])){
        die("<p>Acesso negado, volte para a pagina de <a href=\"index.php\">login</a></p>");
    }
?>
<?php 
    include('conexao.php');
    if(!empty($_GET['search'])){
        $data = $_GET['search'];
        $registrosBD = "SELECT * FROM colaboradores WHERE id LIKE '%$data%' or nome LIKE '%$data%' ORDER BY id DESC";
    }else{
        $registrosBD = "SELECT * FROM colaboradores ORDER BY id DESC";
    }
    $resultado = $mysqli->query($registrosBD);

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
    <title>inicio</title>
</head>
<body>

    <nav class="menu-lateral">
        <div class="btn-lista" >
            <i class="bi bi-list" id="btnLista"></i>
        </div>
        <ul>
            <li class="item home-menu" >
                <a href="#" onclick="cliqueMenuLateral('home')">
                    <span class="icon"><i class="bi bi-house-door"></i></span>
                    <span class="link">Home</span>
                </a>
            </li>
            <li class="item colaboradores-menu ativo" >
                <a href="#" onclick="cliqueMenuLateral('colab')">
                    <span class="icon"><i class="bi bi-people-fill"></i></span>
                    <span class="link">Colaboradores</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="container-inicial hidden" id="containerHome">

        <h1>
            Seja bem vindo a pagina inicial, <?php echo "$_SESSION[nome]!"?>
        </h1>
        
    </div>
    <div class="container-col" id="containerColab">
    <div class="box-search">
        <input type="search" class="form-control" id="pesquisar" placeholder="Pesquisar...">
        <button class="btn-pesquisa" onclick="searchData()">
            <i class="bi bi-search"></i>
        </button>
    </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Senha</th>
                    <th scope="col">...</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($user_data = mysqli_fetch_assoc($resultado)){
                        echo "<tr>";
                        echo "<td>" . $user_data['id'] . "</td>";
                        echo "<td>" . $user_data['nome'] . "</td>";
                        echo "<td>" . $user_data['senha'] . "</td>";
                        echo "<td>
                        <a class='btn' href='edit.php?id=" . $user_data['id'] . "'>
                            <i class='bi bi-pencil'></i>
                        </a>
                        </td>
                        <td>
                        <a class='btn' href='delete.php?id=" . $user_data['id'] . "'>
                            <i class='bi bi-trash'></i>
                        </a>
                        </td>";
                        echo "</tr>";
                    }

                ?>
            </tbody>
        </table>
        <a href="create.php" class="btn-add">Adicionar colaborador</a>
    </div>
    <a href="logout.php" class="btn-sair">Sair</a>
    
    
    <script src="./javascript/main.js"></script>

</body>
</html>