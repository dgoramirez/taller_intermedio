
<?php
    use Task\Models\Task;
    require_once '../vendor/autoload.php';
    use Task\Controllers\TaskController;

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

