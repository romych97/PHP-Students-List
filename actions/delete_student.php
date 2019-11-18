<?php
$db = new PDO('sqlite:../database.sqlite'); 
$db->exec("DELETE FROM students WHERE id='". $_POST['id'] ."';");
// Close file db connection
$file_db = null;
// Close memory db connection
$memory_db = null;
header('Location: ../');
exit;