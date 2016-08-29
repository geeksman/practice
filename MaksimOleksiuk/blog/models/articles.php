<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    function articles_all($link)
    {
        $query = "SELECT * FROM articles ORDER BY id DESC";
        $result = mysqli_query($link, $query);

        if(!$result) {
            die(mysqli_error($link));
        }

        $n = mysqli_num_rows($result);
        $articles = array();

        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($result);
            $articles[] = $row;
        }

        return $articles;
    }

    function articles_get($link, $id)
    {
        $query = sprintf("SELECT * FROM articles WHERE id=%d", (int)$id);
        $result = mysqli_query($link, $query);

        if (!$result){
            die(mysqli_error($link));
        }  

        $article = mysqli_fetch_assoc($result);        
        return $article;
    }

    function articles_new($link, $title, $date, $content)
    {
        $title = trim($title);
        $content = trim($content);

        if ($title == '') {
            return false;
        }

        $query = "INSERT INTO articles (title, date, content) VALUES ('" . $title . "', '" . $date . "', '" . $content . "')";
        $result = mysqli_query($link, $query);

        if (!$result) {
            die(mysqli_error($link));
        }  
        return true;    
    }

    function articles_edit($link, $id, $title, $date, $content){

        $title = trim($title);
        $content = trim($content);
        $date = trim($date);
        $id = (int)$id;

        if ($title == '') {
            return false;
        }

        $query = "UPDATE articles SET title='". $title ."', content='". $content ."', date='". $date ."' WHERE id='". $id ."'";
        
        $result = mysqli_query($link, $query);
        
        if (!result) {
            die(mysqli_error($link));
        }
        
        return mysqli_affected_rows($link);
    }


    function articles_delete($link, $id){
        $id = (int)$id;
        // Проверка
        if ($id == 0)
            return false;
        
        // Запрос
        $query = sprintf("DELETE FROM articles WHERE id='%d'", $id);
        $result = mysqli_query($link, $query);
        
        if (!result)
            die(mysqli_error($link));
        
        return mysqli_affected_rows($link);
    }
    function articles_intro($text, $len = 500)
    {
        return mb_substr($text, 0, $len);        
    }

