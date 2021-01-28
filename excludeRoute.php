<?php
include_once "connect.php";

try{
    $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);

    $delete = $connect->prepare("DELETE FROM data WHERE id = :id");
    $delete->bindParam(":id", $id);
    $delete->execute();

    header("location: index.php");
}catch(PDOException $e){
    echo $e->getMessage();
}