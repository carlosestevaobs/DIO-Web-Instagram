<?php
include 'control/conexao.php';
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/estilo.css">
    <title>CRUD com PHP/MySQL</title>
    <script type="text/javascript">
        function confirmarDelete(id) {
            var confirmacao = confirm("Deseja realmente apagar?");
            if (confirmacao) {
                window.location = id.attr("href");
            }
        }
    </script>
</head>

<body>

    <!-- menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"> Exemplo básico de CRUD com PHP e MySQL</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#cadastrar">
                    Cadastrar/Atualizar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pesquisar">
                    Pesquisar
                    </a>
                </li>
            </ul>            
        </div>
    </nav>

    <!-- Section de cadastro -->
    <section class="container-fluid  espacos" id="cadastrar">
        <div class="text-center">        
            <h3> Cadastrar/Atualizar usuários</h3>
            <div class="container espacos">
                <div class="row">
                    <div class="col-lg-2">
                        <img src="img/cadastro.png" width="50%">
                    </div>
                    <div class="col-lg-10">
                        <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $nome = $_GET['nome'];
                                $usuario = $_GET['usuario'];
                                $senha = $_GET['senha'];
                                ?>
                                <!-- editar --> 
                                 <form method="GET" action="control/editar.php">
                                    <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $id; ?>">
                                    <input type="text" class="form-control mb-2" name="nome" value="<?php echo $nome; ?>" placeholder="Nome completo">
                                    <input type="text" class="form-control mb-2" name="usuario" value="<?php echo $usuario; ?>" placeholder="Usuário">
                                    <input type="password" class="form-control mb-2" name="senha" value="<?php echo $senha; ?>" placeholder="Senha">
                                    <button type="submit" class="btn btn-dark mb-2">
                                        <img src="img/cadastro.png" width="30px">
                                        Editar</button>
                                    </form>
                                    <form method="GET" action="index.php">
                                        <button type="submit" class="btn btn-danger mb-2">
                                        <img src="img/eraser.png" width="20px">
                                        Cancelar edição</button>
                                    </form>


                                <?php

                            } else {
                                ?>
                                 <!-- quando for salvar -->
                                <form method="GET" action="control/salvar.php">
                                    <input type="text" class="form-control mb-2" name="nome" placeholder="Nome completo">
                                    <input type="text" class="form-control mb-2" name="usuario" placeholder="Usuário">
                                    <input type="password" class="form-control mb-2" name="senha" placeholder="Senha">
                                    <button type="submit" class="btn btn-dark mb-2">
                                        <img src="img/cadastro.png" width="30px">
                                        Salvar</button>
                                    <button type="reset" class="btn btn-danger mb-2">
                                        <img src="img/eraser.png" width="20px">
                                        Limpar</button>
                                </form>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section de cadastro -->
    <section class="container-fluid  espacos" id="cadastrar">
        <div class="text-center">
            <h3> Pesquisar usuários</h3>
            <div class="container">
                <div class="row justify-content-center mb-2">
                    <form method="GET" action="#">
                    <input type="text" class="form-control mb-2" name="pesquisa" placeholder="Pesquisar">
                    <button type="submit" class="btn btn-dark mb-2">
                        <img src="img/search.png" width="20px">
                        Pesquisar</button>
                    </form>
                </div>

                <div class="row">
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Usuário</th>
                                <th scope="col">Senha</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($_GET['pesquisa'])) {
                                    $pesquisa = $_GET['pesquisa'];
                                    $sql = "Select * from usuarios where usu_nome like '%$pesquisa%'";
                                } else {
                                    $sql = "Select * from usuarios";
                                }
                                $resultado = mysqli_query($conexao, $sql);
                                while ($linha = $resultado->fetch_assoc()) {
                                    echo " <tr>
                                    <td>". $linha['usu_nome'] . "</td>
                                    <td>". $linha['usu_usuario'] . "</td>
                                    <td>". $linha['usu_senha'] . "</td>
                                    <td><a href='?id=".$linha['usu_id'] . "&nome=".$linha['usu_nome'] . "&usuario=".$linha['usu_usuario'] . "&senha=".$linha['usu_senha'] . "'>
                                     <img src='img/edit.png' width='20px'></a></td>
                                    <td>                                    
                                    <a onclick='confirmarDelete(this); return false;' href='control/deletar.php?id=".$linha['usu_id'] . "'>
                                        <img src='img/delete.png' width='20px'>
                                    </a>
                                    </td>
                                        </tr>
                                    ";
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>