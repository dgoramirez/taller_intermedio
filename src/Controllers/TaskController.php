<?php
namespace Task\Controllers;
use Task\Models\Task;

class TaskController {
    //Atributos
    private string $jsonFile;
    
    //Magic Methods
    public function __construct(string $jsonFile) {
        $this->jsonFile = $jsonFile;
    }

    public function readJsonFile() {
        return json_decode(
            file_get_contents($this->jsonFile), true
        );
    }

    public function add(Task $task) {
        $tasks = $this->readJsonFile($this->jsonFile);
        $tasks[] = $task->toArray();
        file_put_contents($this->jsonFile, json_encode($tasks));
    }

}