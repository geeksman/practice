<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once("database.php");

    require_once("models/articles.php");

    $link = db_connect();
    $articles = articles_all($link);
    include("views/articles.php");
