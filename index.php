<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>All Blacks</title>
</head>
<body>

<?php
require './app/db/database.php';
if (isset($_POST['buttonImport'])) {
         copy($_FILES['xmlFile']['tmp_name'], 'data/' . $_FILES['xmlFile']['name']);
        $torcedores = simplexml_load_file('data/' . $_FILES['xmlFile']['name']);

        //print_r($torcedores->torcedor['nome']);

    foreach ($torcedores as $torcedor) {

        //print_r($torcedor['nome']);
            $query = $conn->prepare('INSERT INTO torcedores (DOCUMENTO, NOME, TELEFONE, EMAIL, CEP, ENDERECO, BAIRRO, CIDADE, UF, ATIVO) VALUES(:DOCUMENTO, :NOME, :TELEFONE, :EMAIL, :CEP, :ENDERECO, :BAIRRO, :CIDADE, :UF, :ATIVO)');
            $query->bindValue(':DOCUMENTO', $torcedor['documento']);
            $query->bindValue(':NOME', $torcedor['nome']);
            $query->bindValue(':TELEFONE', $torcedor['telefone']);
            $query->bindValue(':EMAIL', $torcedor['email']);
            $query->bindValue(':CEP', $torcedor['cep']);
            $query->bindValue(':ENDERECO', $torcedor['endereco']);
            $query->bindValue(':BAIRRO', $torcedor['bairro']);
            $query->bindValue(':CIDADE', $torcedor['cidade']);
            $query->bindValue(':UF', $torcedor['uf']);
            $query->bindValue(':ATIVO', $torcedor['ativo']);
            $query->execute();
            //echo '<br>ID: '.$product->id_user;
    }
}
?>

    <div class="container">
        <h3>Insira o arquivo XML para leitura</h3>
<form action="" method="post" enctype="multipart/form-data">
        Arquivo XML <input type="file" name="xmlFile" id="">
        <br>
        <input type="submit" value="Import" name="buttonImport">
    </form>
    </div>

    <div class="container">
    <h3>Lista de Torcedores Cadastrados</h3>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">DOCUMENTO</th>
            <th scope="col">NOME</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">CEP</th>
            <th scope="col">ENDERECO</th>
            <th scope="col">BAIRRO</th>
            <th scope="col">CIDADE</th>
            <th scope="col">UF</th>
            <th scope="col">ATIVO</th>
        </tr>
        </thead>
        <?php
        $query = $conn->prepare('SELECT * FROM torcedores');
        $query->execute();
        while ($torcedor = $query->fetch(PDO::FETCH_OBJ)) {?>
            <tr>
                <td><?php echo $torcedor->DOCUMENTO?></td>
                <td><?php echo $torcedor->NOME?></td>
                <td><?php echo $torcedor->TELEFONE?></td>
                <td><?php echo $torcedor->EMAIL?></td>
                <td><?php echo $torcedor->CEP?></td>
                <td><?php echo $torcedor->ENDERECO?></td>
                <td><?php echo $torcedor->BAIRRO?></td>
                <td><?php echo $torcedor->CIDADE?></td>
                <td><?php echo $torcedor->UF?></td>
                <td><?php echo $torcedor->ATIVO?></td>
            </tr>

        <?php }?>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>