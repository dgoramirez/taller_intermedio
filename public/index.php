<?php

    require_once '../vendor/autoload.php';
    use Task\Controllers\TaskController;
    $taskController = new TaskController('../tasks.json');
    $tasks= $taskController->readJsonFile();
    /*$contacts = [
        [
            'name' => 'Pepe',
            'phone' => '3100000000'
        ],
        [
            'name' => 'Juan',
            'phone' => '3211111111'
        ]
    ];*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller Intermedio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<?php
    use Task\Models\Task;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descri = $_POST['descri'];
            $date = $_POST['date'];
            $state = false;
            $TaskController = new TaskController('../tasks.json');
            $task = new Task($descri, $date, $state);
            $TaskController->add($task);
            header('Location: index.php');
        }
?>
    <div class="container my-4">
            <h3>Create a task</h3>
            <form method="POST" class="form p-3 border rounded">
                <div>
                    <label>Task</label>
                    <input type="text" name="descri" id="descri">
                </div>
                <br>
                <div>
                    <label>Date</label>
                    <input type="date" name="date" id="date">
                </div>
                <br>
                <button class="btn btn-success" id="add">Add</button>
            </form>
    </div>
    <div class="container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">Date Limit</th>
                        <th scope="col">State</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($tasks as $index => $task) {
                            echo "<tr>";
                                echo "<th scope='row'>" . ($index + 1) . "</th>";
                                echo "<td>" . $task['descri'] . "</td>";
                                echo "<td>{$task['date']}</td>";
                                echo "<td>".($task['state'] ? "Done" : "To do")."</td>";
                                echo "<td><input type='checkbox'></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>