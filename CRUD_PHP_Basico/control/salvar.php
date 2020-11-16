<?php
include 'conexao.php';


if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];
    $usuario = $_GET['usuario'];
    $senha = $_GET['senha'];


    $sql =  "INSERT INTO usuarios (usu_nome, usu_usuario, usu_senha)
    values ('$nome', '$usuario', '$senha')";

    mysqli_query($conexao, $sql);

    echo "<script type='text/javascript'>
        alert('Salvo com sucesso!');
        location.href='../index.php';
        </script>";
}






?>