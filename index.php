<?php

require "functions.php";
require "Database.php";
//require "router.php";


$db = new Database();
$post = $db->query("select * from posts where id = 1")->fetch(PDO::FETCH_ASSOC);
$posts = $db-> query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

dd($post['title']);