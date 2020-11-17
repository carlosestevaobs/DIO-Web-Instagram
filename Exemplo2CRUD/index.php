<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <title> Cadastro de livros </title>
</head>
<body>
    <div class="container">
        <h1> Cadastro de livros </h1>
        <hr>
        <div class="row">
            <div class="col-lg-2">
                <img src="images/book.png">
            </div>
            <div class="col-lg-10">
                <h4> Preencha o formulário </h4>
                <form enctype="multipart/form-data" action="control/salvar.php" method="POST">
                    <input type="text" name="titulo" placeholder="Título do livro" class="form-control md-2" required>
                    <br> <input type="text" name="descricao" placeholder="Descrição" class="form-control md-2" required>
                    <br> <select name="genero" class="form-control md-2">
                        <option>Selecione</option>
                        <option>Ação</option>
                        <option>Romance</option>
                        <option>Terror</option>
                    </select>
                    <br> <input type="text" name="preco" placeholder="Preço" class="form-control md-2" required>
                    <br> <h5> Envie a foto do livro </h5>
                    <input type="file" class="form-control md-2" name="arquivo" required>
                    <br>
                    <input type="submit" class="btn btn-dark form-control md-2" value="Salvar">                
                </form>
            </div>
        </div>
    </div>
</body>
</html>