<?php

$lifetime= 60*60*24*365;

session_set_cookie_params($lifetime, "/");
session_start();

$task_list = filter_input(INPUT_POST, 'tasklist', FILTER_DEFAULT, 
        FILTER_REQUIRE_ARRAY);
if ($task_list === NULL) {
    $task_list = array();
}
$action = filter_input(INPUT_POST, 'action');
$errors = array();

switch( $action ) {
    case 'add':
        if (empty(filter_input(INPUT_POST, 'newtask'))) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            if(!isset($_SESSION["task"])){
                $_SESSION["task"]=array();
            }
            array_push($_SESSION["task"], filter_input(INPUT_POST, 'newtask'));
        }
        break;
    case 'delete':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === NULL || $task_index === FALSE) {
            $errors[] = 'The task cannot be deleted.';
        } else {
            array_splice($_SESSION["task"], array_search($task_index, $_SESSION["task"]), 1);
        }
        break;
}

include('task_list.php');
?>