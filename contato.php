<?php 
session_start();
require("conexao.php");
if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['tel']) ){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    
    $query = "INSERT INTO new_contato(nome,email,tel) VALUES('{$nome}','{$email}','{$tel}')";

    $conexao->query($query);
    $_SESSION['certo'] = true;
    header("location:./");
}else{
    $_SESSION['erro'] = true;
    header("location:./");
}
?>