<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo1.png" type="image/x-icon">
   <link rel="stylesheet" href="adicionar.css">
    
    <title>Sults</title>
</head>
<body style = background-color:#4a83d3>

<div class="container-formulario">
    <h1>Adicione um novo projeto</h1>
    <?php
    if (isset($_POST['submit'])) {
        $titulo = $_POST['titulo'];
        $data = $_POST['data'];
        $autor = $_POST['autor'];
        $descricao = $_POST['descricao'];
        $status = $_POST['status'];

        $stmt = $pdo->prepare('INSERT INTO tarefas(titulo, data, autor, descricao, status) VALUES(:titulo, :data, :autor, :descricao, :status)');
        $stmt->execute(['titulo' => $titulo, 'data' => $data, 'autor' => $autor, 'descricao' => $descricao, 'status' => $status]);

        if ($stmt->rowCount()) {
            echo '<span>Tarefa adicionada com sucesso!</span>';
            header("location: index.php");
        
        } else {
            echo '<span>Erro ao adicionar tarefa. Tente novamente mais tarde!</span>';
        }
    }

    if (isset($error)) {
        echo '<span>' . $error . '</span>';
    }
    ?>

    <form method="post">

        <label for="titulo">Título</label>
        <input type="text" name="titulo" required><br> 

        <label for="data">Data de criação</label>
        <input type="date" name="data" required><br> 

        <label for="autor">Autor</label>
        <input type="text" name="autor" required><br> 

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" required><br> 

        <label for="status">Status</label>
        <select name="status" id="status" required>
            <option value="to_do">To do</option>
            <option value="in_progress">In progress</option>
            <option value="finished">Finished</option>
        </select>
<br><br>
        <div>
            <button type="submit" name="submit" value="Criar">Criar</button>
            <button class="botao"><a href="listar.php">Listar</a></button>
            <button class="botao"><a href="index.php">Voltar</a></button>

        </div>
    </form>
</div> 
    
</body>
</html>