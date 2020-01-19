<?php

require_once('connection.php');
require_once('class/Student.php');

if(isset($_GET['p']) && file_exists('view/' . $_GET['p'] . '.php') && file_exists('app/' . $_GET['p'] . '.php')){
    require_once('app/' . $_GET['p'] . '.php');
    require_once('view/' . $_GET['p'] . '.php');
} else {
    require_once('app/index.php');
    require_once('view/index.php');
}