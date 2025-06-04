<?php
include "../db.class.php";

include_once "../header.php";

$db = new db('usuario');
$data = null;
$errors = [];
$success = '';

if (!empty($_POST)) {

    $data = (object) $_POST; // sempre preserva os dados do post para exibição

    // remove espaços em branco no inicio e fim sa string

    if (empty(trim($_POST['nome']))) {
        $errors[] = "<li>O nome é obrigatório!</li>";
    }

    if (empty(trim($_POST['email']))) {
        $errors[] = "<li>O email é obrigatório!</li>";
    }

    if (empty(trim($_POST['cpf']))) {
        $errors[] = "<li>O cpf é obrigatório!</li>";
    }

    if (empty(trim($_POST['telefone']))) {
        $errors[] = "<li>O telefone é obrigatório!</li>";
    }

    if (empty($errors)) {
        try {
            if (empty($_POST['id'])) {
                $db->store($_POST);
                $success = "Registro criado com sucesso!";
            } else {
                $db->update($_POST);
                $success = "Registro atualizado com sucesso!";
            }
            echo "<script>
                    setTimeout(
                        ()=> window.locacion.href = 'UsuarioList.php', 1500
                    )
                </script>";
        } catch (Exception $e) {
            $errors[] = "Erro ao salvar: " . $e->getMessage();
        }
    }

    if (empty($_POST['id'])) {

        $db->store($_POST);
        header('location:./UsuarioList.php');

    } else {

        $db->update($_POST);
        header('location:./UsuarioList.php');
    }
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

//var_dump($data);
// exit;

?>


<?php

if (!empty($errors)) { ?>

    <div class="alert alert-danger">
        <strong>Erro ao salvar</strong>
        <ul class="mb-0">
            <?php foreach ($errors as $error) { ?>
                <?= $error ?>
            <?php } ?>
        </ul>

    </div>

<?php } ?>

<?php

if (!empty($success)) { ?>

    <div class="alert alert-success">
        <Strong>
            <?= $success ?>
        </Strong>
    </div>

<?php } ?>

<h3 style="margin-top: 100px;">Formulário Usuário</h3>

<!-- http://localhost/pweb1_2025_1/php/site/admin/UsuarioForm.php -->

<form action="" method="post">

    <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

    <div class="row">

        <div class="col-md-6">
            <label for="" class="form-label">Nome</label>
            <input type="text" name="nome" value="<?php $data->nome ?? '' ?>" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" value="<?php $data->email ?? '' ?>" class="form-control">
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">CPF</label>
            <input type="text" name="cpf" value="<?php $data->cpf ?? '' ?>" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Telefone</label>
            <input type="text" name="telefone" value="<?php $data->telefone ?? '' ?>" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col mt-4">
            <button type="submit" class="btn btn-primary">
                <?= !empty($_GET['id']) ? "Editar" : "Salvar" ?>
            </button>
            <a href="./UsuarioList.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

</form>

<?php

include_once "../footer.php";


?>