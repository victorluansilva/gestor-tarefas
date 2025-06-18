<?php 
    require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Gestor de Tarefas</h1>
        <form action="">
            <input type="hidden" name="action" value="create">
            <input type="text" name="description" class="task-input" placeholder="Digite a nova tarefa..." required>
            <button type="submit" class="btn">Adicionar</button>
        </form>
        <ul class="task-list">
        </ul>
    </div>
</body>
</html>