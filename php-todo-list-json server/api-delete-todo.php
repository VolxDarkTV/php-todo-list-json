<?php
include("cors_policy.php");

$index = $_GET['index'];

$jsonTodoList = file_get_contents('todo.json');
$todoList = json_decode($jsonTodoList);

array_splice($todoList, $index, 1);

$jsonTodoList = json_encode($todoList);
file_put_contents('todo.json', $jsonTodoList);
?>