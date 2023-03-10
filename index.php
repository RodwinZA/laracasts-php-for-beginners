<?php

require "functions.php";

//require "router.php";


// connect to mysql database

// create a new instance of the PDO class
// the instance expects an argument called dsn - data source name

$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4;user=root";

$pdo = new PDO($dsn);

// prepare a new query
$statement = $pdo->prepare("select * from posts");
$statement->execute();


// fetch results
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post){
    echo "<li>" . $post['title'] . "</li>";
}