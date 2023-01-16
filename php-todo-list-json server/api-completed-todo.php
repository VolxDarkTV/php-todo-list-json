<?php 

include("cors_policy.php");

$ind = $_GET["ind"];

$jsonTodoList = file_get_contents("todo.json");
$todoList = json_decode($jsonTodoList);

$todoElem = $todoList[$ind];

$todoElem -> completed = !$todoElem -> completed;

$jsonTodoList = json_encode($todoList);
file_put_contents("todo.json", $jsonTodoList);

echo true;
?>