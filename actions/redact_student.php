<?php
print_r($_POST);

$db = new PDO('sqlite:../database.sqlite'); 
$id = $_POST['id'];

$name = $_POST["name"];
$last_name = $_POST["last_name"];
$father_name = $_POST["father_name"];
$date_of_birth = $_POST["date_of_birth"];
$math = $_POST["math"];
$rus = $_POST["rus"];
$bio = $_POST["bio"];
$eng = $_POST["eng"];
$geo = $_POST["geo"];

$update = "UPDATE students set last_name = '$last_name', 
                  first_name = '$name', 
                  father_name = '$father_name', 
                  birthday_date = '$date_of_birth', 
                  math = '$math', 
                  rus = '$rus', 
                  bio = '$bio', 
                  eng = '$eng', 
                  geo = '$geo'
                  WHERE ID = $id";
// Execute update
$db->exec($update);
 
$db = null;
header('Location: ../');
exit;
?>