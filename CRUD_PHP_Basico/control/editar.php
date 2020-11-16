<?php
include 'conexao.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $usuario = $_GET['usuario'];
    $senha = $_GET['senha'];


    $sql =  "UPDATE `usuarios` SET 
    `usu_nome` = '$nome',
    `usu_usuario` = '$usuario',
    `usu_senha` = '$senha' 
    WHERE `usuarios`.`usu_id` = $id;";

    mysqli_query($conexao, $sql);

    echo "<script type='text/javascript'>
        alert('Editado com sucesso!');
        location.href='../index.php';
        </script>";
}

?>