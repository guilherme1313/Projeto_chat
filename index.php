<?php
session_start();
$usuario = $_SESSION['nome_usuario'];
$_SESSION['nome_usuario'] = null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Chat - Avanco</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <script type="text/javascript">
        function ajax(){
            var req = new XMLHttpRequest();
            req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }
            req.open('GET', 'chat.php', true);
            req.send();
        }

        setInterval(function(){ajax();}, 1000);


    </script>

</head>
<body onload="ajax();">
<aside>
    <img src="imgs/Icon ionic-ios-chatboxes.png" alt="Chat" title="Chat"/>

    <form method="post" action="recebe.php">
        <input type="text" placeholder="Digite seu nome..." value="<?Php if(isset($usuario) && !empty($usuario)){ echo $usuario; } ?>" name="dados[nome]" id="name" />
        <input type="text" placeholder="Digite sua mensagem..." name="dados[mensagem]" id="message" />
        <button type="submit" class="btn btn-lg btn-block btn-success">Enviar</button>
        <a href="#" class="btn btn-lg btn-block btn-danger">Deletar Mensagens</a>
    </form>


</aside>

<section >
    <div class="row">
        <div class="col-12" >
            <di id="chat">

            </di>
        </div>


    </div>
</section>

</body>
</html>