<?php
    include_once './dbFunction.php';
    $table = "TASK";
    $DB = "workouttask";
    deleteTask($DB, $table);
    require 'index.php';