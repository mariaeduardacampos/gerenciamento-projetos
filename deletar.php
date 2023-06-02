<?php
include 'db.php';

if (!isset ($_GET['id'])) {
    header('location: index.php');
    exit;

}

$id = $_GET ['id'];
$stmt = $pdo->prepare('SELECT * FROM tarefas WHERE id = ?');
$stmt-> execute([$id]);
$appointment = $stmt-> fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header ('location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM tarefas WHERE id = ?');
    $stmt->execute ([$id]);

   header ('location: index.php');
   exit;
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar card</title>
    <link rel="stylesheet" href="deletar.css">
</head>
<body>
    <h1> Deletar card </h1>
    <p> Tem certeza que deseja deletar o card de 
        <?php echo $appointment ['titulo'];?>
        com data de: <?php echo date ('d/m/y', strtotime ($appointment['data'])); ?>?</p>

        <form method="post">
            <button type= "submit" >sim </button> 
            <a href = "index.php"> não </a>
</form> </body> </html>
