<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '123456');
define('MYSQL_DB', 'blog');

function db_connect()
{
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or die ("Error: ".mysqli_error($link));
    
    if(!mysqli_set_charset($link, "utf8")) {
        printf("Error: ".mysqli_error($link));
    }
    
    return $link;
}

