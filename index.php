<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Database</title>
    <link rel="stylesheet" href="./index.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.js"></script>
    <!-- <script type="text/javascript" src="tablesorter-2.31.1/js/jquery.tablesorter.js"></script> -->
    <script src="index.js" defer></script>
</head>
<body>
    <div class="header">Student Database</div>
    <div class="menu">
    <form style="float: left">
    <input class="form-control" type="text" placeholder="Поиск" id="search-text" onkeyup="tableSearch()">
    </form>
    <button style="float:right" type="submit" onclick="document.getElementById('add-student-popup').style.display='block'">Добавить студента</button>
    </div>

<div id="add-student-popup" style="display:none">
    <h3>Добавить студента</h3> 
    <form action="actions/save_student.php" method="POST"> 
    
    <input required type="text" name="name"> - Имя  
    <input required type="text" name="family"> - Фамилия  
    <input required type="text" name="father-name"> - Отчество  
    <input required type="text" name="date-born"> - Дата рождения  
    <h4>Оценки</h4>
    <input required type="number" name="mathan" min=1 max=5> - Математика  
    <input required type="number" name="russian" min=1 max=5> - Русский язык  
    <input required type="number" name="botanic" min=1 max=5> - Биология  
    <input required type="number" name="english" min=1 max=5> - Английский язык  
    <input required type="number" name="geography" min=1 max=5> - География  
    </br>
    </br>
    <button type="submit">Сохранить</button>
    <button type="button" onclick="document.getElementById('add-student-popup').style.display='none'">Закрыть</button>
    </form>
</div>

<table id="myTable" class="tablesorter" border="1">
  <thead>
    <tr>
    <th class="main-col_t"></th>
    <th class="main-col_t"></th>
    <th name="name" class="main-col">Имя</th>
    <th name="last_name" class="main-col">Фамилия</th>
    <th name="father_name" class="main-col">Отчество</th>
    <th data-sorter="false" name="date_of_birth" class="main-col">Дата рождения</th>
    <th name="math" class="main-col evaluation" width="5%">Математика</th>
    <th name="rus" class="main-col evaluation" width="5%">Русский язык</th>
    <th name="bio" class="main-col evaluation" width="5%">Биология</th>
    <th name="eng" class="main-col evaluation" width="5%">Английский язык</th>
    <th name="geo" class="main-col evaluation" width="5%">География</th>
    </tr>
  </thead>
 <tbody>
<?php
$db = new PDO('sqlite:database.sqlite');
$result = $db->query('SELECT * FROM students');
foreach($result as $key => $row) {
   echo '<tr>
     <td width="2%" class="native-row native-row-redact">
     <button class="delete_button" type="submit" 
             onclick=\'return redact_student("' . $row['id'] .'")\'>r</button>
     </td>

     <td width="2%" class="native-row native-row-delete">
     <form action="actions/delete_student.php" method="POST">
     <input name="id" type="hidden" value="' . $row['id'] .'">
     <button class="delete_button" type="submit">x</button>
     </form>
     </td>

     <td class="native-row native-row-first_name id-'. $row['id'] .'">' . $row['first_name'] . '</td>
     <td class="native-row native-row-last_name id-'. $row['id'] .'">' . $row['last_name'] . '</td>
     <td class="native-row native-row-family id-'. $row['id'] .'">' . $row['father_name'] . '</td>
     <td class="native-row native-row-birthday_date id-'. $row['id'] .'">' . $row['birthday_date'] . '</td>
     <td class="evaluation-row evaluation-row-math id-'. $row['id'] .'">' . $row['math'] . '</td>
     <td class="evaluation-row evaluation-row-rus id-'. $row['id'] .'">' . $row['rus'] . '</td>
     <td class="evaluation-row evaluation-row-bio id-'. $row['id'] .'">' . $row['bio'] . '</td>
     <td class="evaluation-row evaluation-row-eng id-'. $row['id'] .'">' . $row['eng'] . '</td>
     <td class="evaluation-row evaluation-row-geo id-'. $row['id'] .'">' . $row['geo'] . '</td>
   </tr>';

}
?>
</tbody>
</table>
</div>

</body>
</html>