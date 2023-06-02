<?php
include 'db.php';
if (!isset ($_GET['id'])) {
    header ('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM tarefas WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header ('Location: listar.php');
    exit;
}
$titulo = $appointment['titulo'];
$data = $appointment['data'];
$autor = $appointment['autor'];
$descricao = $appointment['descricao'];
$status = $appointment['status'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar compromisso</title>
    <link rel="shortcut icon" href="logo1.png" type="image/x-icon">
	<link rel="stylesheet" href="atualizar.css">

</head>
<body>
    <h1> Atualizar tarefa </h1>
    <form method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?php echo $titulo; ?>" required><br>

        <label for="data">Data de criação:</label>
        <input type="date" name="data" value="<?php echo $data; ?>" required><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" value="<?php echo $autor; ?>" required><br>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" value="<?php echo $descricao; ?>" required><br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="to_do">To do</option>
            <option value="in_progress">In progress</option>
            <option value="finished">Finished</option>
        </select> 
<br><br>
        <button type="submit">Atualizar </button>
</form>
        
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $autor = $_POST['autor'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    //validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE tarefas SET titulo = ?, data = ?, autor = ?, descricao = ?, status = ? WHERE id = ?');
    $stmt->execute([$titulo, $data, $autor, $descricao, $status, $id]);
    header ('location: index.php');
    exit;
}
?>