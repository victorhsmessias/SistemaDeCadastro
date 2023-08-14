<?php 
    if(isset($_POST['nome']) || isset($_POST['senha'])){
        if(strlen($_POST['nome']) == 0){
            print "Preencha seu nome.";
        }else if(strlen($_POST['senha']) == 0){
            print "Preencha sua senha.";
        }else{
            //Limpar a string
            $nome = $mysqli->real_escape_string($_POST['nome']);
            $senha = $mysqli->real_escape_string($_POST['senha']);
            //Selecionar todos os campos da tabela onde o nome e a senha são iguais ao digitado
            $sql_verificar = "SELECT * FROM colaboradores WHERE nome = '$nome' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_verificar) or die("Falha na execução do mysql" . $mysqli->error);
            $qntd_linhas = $sql_query->num_rows;
            if($qntd_linhas == 1){
                $usuario = $sql_query->fetch_assoc();
                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['id'] = $usuario['id'];

                header("Location: inicio.php");

            }else{
                print"Login ou senha incorretas!";
            }


        }
    }
?>