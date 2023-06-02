<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href= "listar.css">
        <title> Sults </title>
</head>

<body class= "listar">
    <h1>Projetos adicionados </h1>

    <?php
    $stmt = $pdo ->query ('SELECT * FROM tarefas order by id');
    $tarefas = $stmt ->fetchAll(PDO::FETCH_ASSOC);

    if (count ($tarefas) == 0) {
        echo '<p> Nenhuma tarefa foi encontrado. </p>';
    } else {
        echo '<table border="1">';
        echo '<thead>
        <tr>
         <th>Título</th>
        <th>Data</th>
        <th>Autor</th>
        <th>Descrição</th>
        <th>Status</th>
        <th colspan="2">Opções</th>
        </tr></thead>';

        echo '<tbody>';

        foreach ($tarefas as $tarefa) {
            echo '<tr>';
            echo '<td>' . $tarefa ['titulo'] . '</td>';
            echo '<td>' . date ('d/m/Y', strtotime ($tarefa ['data'])) . '</td>';
            echo '<td>' . $tarefa ['autor'] . '</td>';
            echo '<td>' . $tarefa ['descricao'] . '</td>';
            echo '<td>' . $tarefa ['status'] . '</td>';
            echo '<td><a style="color:black;" href="atualizar.php?id=' . $tarefa ['id'] . '">Atualizar </a></td>';
            echo '<td><a style="color:black;" href="deletar.php?id=' . $tarefa ['id'] . '">Deletar</a></td>';
            echo '<try>';
        }
        echo '</tbody>';
        echo '</table>';
    }

    ?>
    </body>

    </html>
