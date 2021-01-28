<?php

try{
    $connect = new PDO("mysql:host=localhost;port=3306;dbname=lerxml;", "root", "");
}catch(PDOException $e){
    echo $e->getMessage();
}