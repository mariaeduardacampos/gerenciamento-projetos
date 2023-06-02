<?php
 require_once('db.php');

    $stmt = $pdo->query ("SELECT * FROM tarefas WHERE status = 'to_do'");
    $tarefas_to_do = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt1 = $pdo->query ("SELECT * FROM tarefas WHERE status = 'in_progress'");
    $tarefas_in_progress = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    $stmt2 = $pdo->query ("SELECT * FROM tarefas WHERE status = 'finished'");
    $tarefas_finished = $stmt2->fetchAll(PDO::FETCH_ASSOC);
   

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <title>Sults</title>
</head>
<body style = background-color:#f2f2f2>
<div class="principal">
<header>
<img src="logo2.png">

            <nav class="menu-superior">
                <a class="sem-cor" href="">Projects</a></li>
                <a class="sem-cor" href="">Dashboard</a></li>
                <a class="sem-cor" href="">Plans</a></li>
                <a class="sem-cor" href="">Apps</a></li>
                <a class="sem-cor" href="">Box</a></li>
                
<div class="botao_adicionar">
    <a class="sem-cor" href="adicionar.php">Adicione uma tarefa nova</a></li>
</div>
<div class="botao_voltar">
    <a class="sem-cor" href="inicio.php">Voltar para o início</a></li>
</div>
  <div id="divBusca">
  <input type="text" id="txtBusca" placeholder="Buscar..."/>
  <button id="btnBusca">Buscar</button>
</div>
            </nav>
           
        </header>
<section class="container">
    <div class= "menu">
        <ul>
            <li><a href=""><i class="icofont-juice"></i> Componentes</a></li>
            <li><a href=""><i class="icofont-fast-food"></i> Project pages</a></li>
            <li><a href=""><i class="icofont-coffee-mug"></i> Completed</a></li>
            <li><a href=""><i class="icofont-sushi"></i> Add items </a></li>
            <li><a href=""><i class="icofont-fruits"></i> Project settings</a></li>
            <li><a href=""><i class="icofont-fruits"></i> Reports </a></li>
            <li><a href=""><i class="icofont-fruits"></i> Backlog </a></li>
            <li><a href=""><i class="icofont-fruits"></i> Roadmap </a></li>
            <li><a href=""><i class="icofont-fruits"></i> Releases </a></li>
            <li><a href=""><i class="icofont-fruits"></i> Trash </a></li>
            
            
        </ul>
    </div>
    
    <div class="direita">
        <div class="item">To do 
            <?php
        if (count ($tarefas_to_do) == 0) {
        echo '<p> Nenhuma tarefa foi encontrado. </p>';
    } else {

        foreach ($tarefas_to_do as $tarefa) {
            echo "<div class='card1'>";
            echo '<h3>' . $tarefa['titulo'] . '</h3>';
            echo '<h5>' . date ('d/m/Y', strtotime ($tarefa ['data'])) . '</h5>';
            echo '<h5>' . $tarefa ['autor'] . '</h5>';
            echo '<h5>' . $tarefa ['descricao'] . '</h5>';
            echo '<h5>' . $tarefa ['status'] . '</h5>';
            echo '<h5><a style="color:black;" href="atualizar.php?id=' . $tarefa ['id'] . '">Atualizar </a></h5>';
            echo '<h5><a style="color:black;" href="deletar.php?id=' . $tarefa ['id'] . '">Deletar</a></h5>'; 
            echo '</div>';
        }
       
    }
    ?>
        </div>


        <div class="item">In progress
        <?php
        if (count ($tarefas_in_progress) == 0) {
        echo '<p> Nenhuma tarefa foi encontrado. </p>';
    } else {
        

        foreach ($tarefas_in_progress as $tarefa) {
            echo "<div class='card2'>";
            echo '<h3>' . $tarefa['titulo'] . '</h3>';
            echo '<h5>' . date ('d/m/Y', strtotime ($tarefa ['data'])) . '</h5>';
            echo '<h5>' . $tarefa ['autor'] . '</h5>';
            echo '<h5>' . $tarefa ['descricao'] . '</h5>';
            echo '<h5>' . $tarefa ['status'] . '</h5>';
            echo '<h5><a style="color:black;" href="atualizar.php?id=' . $tarefa ['id'] . '">Atualizar </a></h5>';
            echo '<td><a style="color:black;" href="deletar.php?id=' . $tarefa ['id'] . '">Deletar</a></td>';  
            echo '</div>';
        }
      
    }
    ?>
        </div>


        <div class="item">Finished
        <?php
        if (count ($tarefas_finished) == 0) {
        echo '<p> Nenhuma tarefa foi encontrado. </p>';
    } else {
        

        foreach ($tarefas_finished as $tarefa) {
            echo "<div class='card3'>";
            echo '<h3>' . $tarefa['titulo'] . '</h3>';
            echo '<h5>' . date ('d/m/Y', strtotime ($tarefa ['data'])) . '</h5>';
            echo '<h5>' . $tarefa ['autor'] . '</h5>';
            echo '<h5>' . $tarefa ['descricao'] . '</h5>';
            echo '<h5>' . $tarefa ['status'] . '</h5>';
            echo '<h5><a style="color:black;" href="atualizar.php?id=' . $tarefa ['id'] . '">Atualizar </a></h5>';
            echo '<td><a style="color:black;" href="deletar.php?id=' . $tarefa ['id'] . '">Deletar</a></td>';
            echo '</div>';
        }
        
    }
    ?>
        </div>
        
</div>
</body>
</html>