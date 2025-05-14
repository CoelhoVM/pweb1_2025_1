<?php

include "./db.class.php"

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<?php

$db = new db(table_name: 'usuario');

$dados = $db->all();

?>

<body>

    <div class="container" style="margin-top: 100px;">

        <div class="row">

            <h3>Listagem Usuário</h3>
            <!-- http://localhost/php/site/UsuarioForm.php -->

            <form action="" method="get">

                <div class="row">

                    <div class="col-md-6">
                        <label for="" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>

                </div>

                <div class="row mt-4">

                    <div class="col">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        <a href="./UsuarioForm.php" class="btn btn-secondary">Cadastrar</a>
                    </div>

                </div>

            </form>

        </div>

        <div class="row mt-4">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>

                <tbody>

                    <?php

                    foreach ($dados as $item) {

                        echo "
                    <tr>
                        <th scope='row'>$item->id</th>
                        <td>$item->nome</td>
                        <td>$item->cpf</td>
                        <td>$item->telefone</td>
                        <td>$item->email</td>
                    </tr>";
                    }

                    ?>

                </tbody>

            </table>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

</body>

</html>