<?php
include("config.php");
include ("conexao.php");
$conn = conn();

try {
    $query = "SELECT * FROM `chat1`";
    $cliente_bd = $conn->prepare($query);
    $cliente_bd->execute();
    $res = $cliente_bd->get_result();
    $test = $res->fetch_all(MYSQLI_ASSOC);

    foreach ($test as $key => $value){
        echo "<img src='imgs/Icon%20awesome-rocketchat.png'> <span style='color: red; font-size: 16px;'>".$value['nome']."</span> :";
        echo " <p style='margin-left: 40px;'>".$value['mensagem']."</p>";
    }
    die();
}catch (\Exception $th){
    header('Location: index.php');
    die($th);
}

?>





