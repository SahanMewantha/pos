<?php
    $serverName="localhost";
    $userName="root";
    $password="";
    $database="pos";

    $conn=new mysqli($serverName,$userName,$password,$database);

    if(!$conn){
        echo "Connection Faild...!" . $conn->conect_error;
        die;
    }
?>