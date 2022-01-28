<?php
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include("config.php");
    include ("conexao.php");
    $conn = conn();

    $dados = isset($_POST['dados']) && !empty($_POST['dados']) ? $_POST['dados'] : null;

    if(isset($dados['nome']) && !empty($dados['nome']) && isset($dados['mensagem']) && !empty($dados['mensagem'])){
        $nome = $dados['nome'];
        $_SESSION['nome_usuario'] = $nome;
        $mensagem = $dados['mensagem'];
        $query = "INSERT INTO chat1(nome,mensagem)value(?, ?)";

        try {
            $stmt = $conn->prepare($query);
            $stmt->bind_param(
                'ss',$nome,$mensagem

            );
            $stmt->execute();
            header('Location: index.php');
            die();
        }catch (\Exception $th){
            header('Location: index.php');
            die($th);
        }
    }
    header('Location: index.php');
    die();

}else{
    header('Location: index.php');
    die();
}



?>
