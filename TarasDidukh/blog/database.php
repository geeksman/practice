<?php

define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'blog');

function db_connect()
{
    $link = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $link->query("SET NAMES 'utf8'"); 
    $link->query("SET CHARACTER SET 'utf8'");
    $link->query("SET SESSION collation_connection = 'utf8_general_ci'");
    
    return $link;
}