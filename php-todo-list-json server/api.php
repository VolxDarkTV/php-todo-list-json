<?php
// Permettere l'accesso al front 
include("cors_policy.php");

$jsonTodoList = file_get_contents("todo.json");
// $todoList = json_decode($jsonTodoList);

// echo json_encode($todoList);

echo $jsonTodoList;

?>