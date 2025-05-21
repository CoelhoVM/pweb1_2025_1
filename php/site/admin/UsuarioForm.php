<?php
include "./db.class.php";
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<?php

if (!empty($_POST)) {

    $db = new db('usuario');

    $db->store($_POST);

    header('location:./UsuarioList.php');
}

if (!empty($_GET['id'])){
    $data = $db->find($_GET['id']);
}

?>

<body>

    <div class="container">

        <div class="row">

            <h3>Formulário Usuário</h3>
            <!-- http://localhost/pweb1_2025_1/php/site/admin/UsuarioForm.php -->
            <form action="" method="post">

                <div class="row">

                    <div class="col-md-6">
                        <label for="" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">CPF</label>
                        <input type="text" name="cpf" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-4">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="./UsuarioList.php" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>

            </form>

        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

</body>

</html>