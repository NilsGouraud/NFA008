<?php

//displaying errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
//mysql DB connection
require 'functions.php';

class Person{
    public $name;
    public $age;

    public function breathe(){
        echo $this->name . ' is breathing';
    }

}

$person=new Person();
$person->name='John Doe';
$person->age=25;
//$person->breathe();


$dsn="mysql:host=localhost;port=3306;dbname=myApp;user=root;password=a;charset=utf8mb4";
dd($dsn);
$pdo=new PDO($dsn);


$statement=$pdo->prepare("select * from posts");
$statement->execute();

$posts=$statement->fetchAll(PDO::FETCH_ASSOC);



dd($posts);

foreach($posts as $post){
    echo"<li>" . $post['title'] . "</li>";
}




//céréales
$dsn="mysql:host=localhost;port=3306;dbname=cereale;user=root;password=a;charset=utf8mb4";
dd($dsn);
$pdo=new PDO($dsn);


$statement=$pdo->prepare("select * from client");
$statement->execute();

$posts=$statement->fetchAll(PDO::FETCH_ASSOC);
dd($posts);

foreach($posts as $post){
    echo"<li>" . $post['title'] . "</li>";
}






require 'router.php';



