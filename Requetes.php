<?php
include_once "Connexion.php";
//session_start();

if (isset($_GET["action"])) {

    switch ($_GET["action"]) {

        case "add":
            $date=$_GET["date"];
            $name=$_GET["name"];
            $sql = "insert into task (date, name) values(:date,:name)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([":date"=>$date,":name"=>$name]);
            //header("Location:index.php");
            break;

        case "remove":
            $id = $_GET["id"];
            $sql = "delete from task where id= $id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $reponse = json_encode($stmt);
            break;

        case "update":
            $id = $_GET["id"];
            $name = $_GET["name"];
            $date = $_GET["date"];
            $sql = "update task set name='$name', date='$date' where id=$id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $reponse = json_encode($stmt);
            break;
}}

    $sql = "select * from task";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row);
    }
    
    echo json_encode($data);   

