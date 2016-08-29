<?php

function articles_all($link)
{
    $query = "SELECT * FROM articles ORDER BY id DESC";
    
    $result = $link->query($query);
        
    if($result->num_rows < 0)
        echo "0 results";
        
    $n = mysqli_num_rows($result);
    $articles = array();
        
    for ($i = 0; $i < $n; $i++)
    {
        $row = $result->fetch_assoc();
        $articles[] = $row;
    }
        
    return $articles;
}

function articles_get($link, $id)
{
    $query = "SELECT * FROM articles WHERE id=" . $id;
    
    $result = $link->query($query);
    
    if($result->num_rows < 0)
        echo "0 results";
        
     $article = mysqli_fetch_assoc($result);
    
    return $article;
}

function articles_new($link, $title, $date, $content){
    // Подготовка
    $title = trim($title);
    $content = trim($content);
            
    // Проверка
    if ($title == '')
        return false;
    
    // Запрос
    $query = "INSERT INTO articles (title, date, content) VALUES ('" . $title . "', '" . $date . "', '" . $content . "')";
    
    $result = $link->query($query);
        
    if (!$result) {
        die(mysqli_error($link));
    }
        
    return true;
}


function articles_edit($link, $id, $title, $date, $content)
{
    // Подготовка
    $title = trim($title);
    $content = trim($content);
    $date = trim($date);
    $id = (int)$id;
            
    // Проверка
    if ($title == '') {
        return false;
    }
        
    // Запрос
    $query = "UPDATE articles SET title='". $title ."', content='". $content ."', date='". $date ."' WHERE id='". $id ."'";
            
    $result = $link->query($query);
        
    if (!result) {
        die(mysqli_error($link));
    }
        
    return mysqli_affected_rows($link);
}

function articles_delete($link, $id)
{
    $id = (int)$id;
    // Проверка
    if ($id == 0) {
        return false;
    }
        
    // Запрос
    $query = "DELETE FROM articles WHERE id='".  $id ."'";
    
    $result = $link->query($query);
        
    if (!result) {
        die(mysqli_error($link));
    }
        
    return mysqli_affected_rows($link);
}
function articles_intro($text, $len = 500)
{
    return mb_substr($text, 0, $len);        
}