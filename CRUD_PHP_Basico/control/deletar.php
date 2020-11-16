<?php
include 'conexao.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql =  "DELETE FROM usuarios where usu_id = $id";

    mysqli_query($conexao, $sql);

    echo "<script type='text/javascript'>
        alert('Deletado com sucesso!');
        location.href='../index.php';
        </script>";
}






?>