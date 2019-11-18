<?php

$db = new PDO('sqlite:../database.sqlite'); 

$db->exec("CREATE TABLE IF NOT EXISTS students (
id INTEGER PRIMARY KEY, 
last_name TEXT, first_name TEXT, 
father_name TEXT, birthday_date TEXT, 
math INT, rus INT, bio INT, eng INT, geo INT)");

$insert = "INSERT INTO students (last_name, first_name, father_name, birthday_date, math, rus, bio, eng, geo) 
            VALUES (:last_name, :first_name, :father_name, :birthday_date, :math, :rus, :bio, :eng, :geo)";
$stmt = $db->prepare($insert);
print_r($_POST['family']);
$stmt->bindParam(':last_name', $_POST['family']);
$stmt->bindParam(':first_name', $_POST['name']);
$stmt->bindParam(':father_name', $_POST['father-name']);
$stmt->bindParam(':birthday_date', $_POST['date-born']);
$stmt->bindParam(':math', $_POST['mathan']);
$stmt->bindParam(':rus', $_POST['russian']);
$stmt->bindParam(':bio', $_POST['botanic']);
$stmt->bindParam(':eng', $_POST['english']);
$stmt->bindParam(':geo', $_POST['geography']);
$stmt->execute();
// Close file db connection
$file_db = null;
// Close memory db connection
$memory_db = null;
header('Location: ../');
exit;
?>  