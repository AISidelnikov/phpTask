<?php

function createDB($DB)
{
    $conn = new mysqli("localhost", "root", "");
    if($conn->error)
    {
        die("Connection faild: ".$conn->connect_error);
    }
    $sql = "CREATE DATABASE IF NOT EXISTS $DB";
    $conn->query($sql);
    $conn->close();
}

function createTable($DB, $table)
{
    $conn = new mysqli("localhost", "root", "", $DB);
    if(!$db = $conn->select_db($DB))
    {
        die("Connection faild: ".$conn->error);
    }
    $sql = "CREATE TABLE IF NOT EXISTS $table (id INT(11) NOT NULL AUTO_INCREMENT , name CHAR(50) NULL , description VARCHAR(1000) NULL , dateTime DATETIME NULL , time TIME NULL , PRIMARY KEY (`id`))";     
    $conn->query($sql);
    $conn->close();
}

function createTask($DB, $table)
{
    $conn = new mysqli("localhost", "root", "", $DB);
    $sql = "INSERT INTO `$table`(`name`, `description`, `dateTime`, `TIME`) VALUES('{$_POST['name']}', '{$_POST['description']}', '{$_POST['dateTime']}', '{$_POST['time']}')";
    $conn->query($sql);
    header('Location: ./index.php');
    $conn->close();
}

function deleteTask($DB, $table)
{
    $conn = new mysqli("localhost", "root", "", $DB);
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $taskid = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM $table WHERE id = '$taskid'";
    $conn->query($sql);
    $conn->close(); 
}
    