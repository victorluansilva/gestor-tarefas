<?php
require_once 'config.php';

$stmt = $pdo->query('SELECT * FROM tasks ORDER BY created_at DESC');
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>📝 Gestor de Tarefas</h1>

        <form action="acoes.php" method="POST" class="task-form">
            <input type="hidden" name="action" value="create">
            <input type="text" name="description" class="task-input" placeholder="Digite uma nova tarefa..." required>
            <button type="submit" class="btn">Adicionar</button>
        </form>

        <ul class="task-list">
            <?php if (count($tasks) > 0): ?>
                <?php foreach ($tasks as $task): ?>
                    <li class="task-item <?= $task['is_completed'] ? 'completed' : '' ?>" data-task-id="<?= $task['id'] ?>">
                        <span class="task-description"><?= htmlspecialchars($task['description']) ?></span>
                        <div class="task-actions">
                            <form action="acoes.php" method="POST">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                                <button type="submit" class="btn-icon btn-delete" title="Excluir tarefa">✖</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="no-tasks">Nenhuma tarefa encontrada. Adicione uma!</li>
            <?php endif; ?>
        </ul>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.task-list').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('task-description')) {
                const taskItem = e.target.closest('.task-item');
                const taskId = taskItem.dataset.taskId;

                fetch('api.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id: taskId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        taskItem.classList.toggle('completed');
                    }
                })
                .catch(error => console.error('Erro:', error));
            }
        });
    });
    </script>
</body>
</html>
