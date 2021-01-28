<?php
include_once "connect.php";

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

try{
    $url = $_FILES["file"]["tmp_name"];
    $fileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
    console_log($fileType == "xml");
    if($fileType !== "xml"){
        echo "Formato invalido, insira um arquivo xml";
    }else{
        $xml = simplexml_load_file($url);
        
        foreach($xml->rota as $data){
            $name = $data->nome;
            $driver = $data->motorista;
            $plaque = $data->placa;

            $create = $connect->prepare("INSERT INTO data (nome, motorista, placa) VALUES (:nome, :motorista, :placa)");
            $create->bindParam(":nome", $name);
            $create->bindParam(":motorista", $driver);
            $create->bindParam(":placa", $plaque);
            $create->execute();
        }

        //header("location: index.php");
    }
}catch(PDOException $e){
    echo $e->getMessage();
}