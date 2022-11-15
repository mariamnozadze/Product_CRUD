<?php

// //Create connection to the database
// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
// //If connection isn't successful; so when there is an error, throw an exception
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// //Select and display products from mysql
// $statement = $pdo->prepare('SELECT * FROM products');
// $statement->execute();
// $products = $statement->fetchAll(PDO::FETCH_ASSOC);
//--------------don't mind this





//---------2-nd version
$serverName = "localhost";
$userName = "root";
$password = "";
$conn = new PDO("mysql:host=$serverName;dbname=products_crud", $userName, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
