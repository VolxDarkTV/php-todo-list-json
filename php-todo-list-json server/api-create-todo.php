<?php

include("cors_policy.php");

$newTodo = $_GET ['newTodo'];

$jsonTodoList = file_get_contents("todo.json");
$todoList = json_decode($jsonTodoList);

$todoList[] = [
    "text" => $newTodo,
    "completed" => false
];
$jsonTodoList = json_encode ($todoList);
file_put_contents('todo.json', $jsonTodoList);