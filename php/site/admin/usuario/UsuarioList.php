<?php

include "../db.class.php";
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

$db = new db('usuario');

if (!empty($_GET['id'])){

    $db->destroy($_GET['id']);

}

if (!empty($_POST)){
    $dados = $db->search($_POST);
}else{
    $dados = $db->all();
}

?>

<body>
    <div class="container">

        <div class="row">

            <h3 style="margin-top: 100px; margin-bottom: 25px;" >Listagem Usuário</h3>
            <!-- http://localhost/pweb1_2025_1/php/site/admin/UsuarioList.php -->
            <form action="./UsuarioList.php" method="post">

                <div class="row">

                    <div class="col-md-2">

                        <select name="tipo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="cpf">CPF</option>
                            <option value="telefone">Telefone</option>
                        </select>

                    </div>

                    <div class="col-md-6">
                        <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                    </div>

                </div>

                <div class="row">
                    <div class="col mt-4">
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
                        <th scope="col">Ação</th>
                        <th scope="col">Ação</th>
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

                            <td>
                                <a href='./UsuarioForm.php?id=$item->id' >Editar</a>
                            </td>

                            <td>
                                <a 
                                onclick='return confirm(\"Deseja Excluir?\")'
                                href='./UsuarioList.php?id=$item->id' >Deletar</a>
                            </td>
                        </tr>
                        ";
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