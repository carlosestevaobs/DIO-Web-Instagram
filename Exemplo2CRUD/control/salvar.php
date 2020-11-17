<?php

include 'conexao.php';

if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $preco =  $_POST['preco'];
    $descricao = $_POST['descricao'];
    $arquivo = $_FILES['arquivo'];
    
    $caminho = "../img/";
    $nome = md5(basename($_FILES['arquivo']['name']));
    //echo $nome;
    $caminho = $caminho.$nome;
    //echo $caminho;
    //echo $_FILES['arquivo']['tmp_name'];
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho)) {
        $sql = "INSERT INTO `tb_livros` (`liv_titulo`, `liv_imagem`, `liv_descricao`, `liv_genero`, `liv_valor`)
         VALUES ('$titulo', '$nome', '$descricao', '$genero', $preco);";
        // echo $sql;
         mysqli_query($conexao, $sql);
        
        echo "arquivo enviado";


    } else {
        echo "erro ao enviar";
    }
} else {
    header("location: ../index.php");
}


?>