<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>Contato</title>
</head>
<body>
    <div class="flex-row">
        <div class="title">
            <h1 id="msg">Entre em contato conosco</h1>
        </div>
        <form action="contato.php" class="form" method="POST">
            <input type="text" name="nome" id="nome" placeholder="primeiro nome"  data-js="false" class="input autocapitalize"  required>
            <input type="email" name="email" id="email" placeholder="email" data-js="false" class="input" required>
            <input type="tel" name="tel" id="phone" placeholder="número (00000000000)" maxlength="11" data-js="false" class="input" required>
            <input type="submit" class="input submit" id="submitContato" name="submit">
        </form>
    </div>  
    <?php 
            if(isset($_SESSION['erro'])):
        ?>
            <script>document.getElementById("msg").innerHTML = "Por favor, preencha os campos obrigatórios. &#x1F643";</script>
        <?php 
            elseif(isset($_SESSION['certo'])): 
        ?>
            <script>document.getElementById("msg").innerHTML = "Em breve entraremos em contato. &#x1F609";</script>
        <?php 
            endif;
            unset($_SESSION['erro']);
            unset($_SESSION['certo']);
        ?>
    <script src="script.js"></script>
</body>
</html>