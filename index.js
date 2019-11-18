let sorting_rows = document.getElementsByClassName('main-col');
console.log(this)
$(function() {
  $("#myTable").tablesorter();
});

function tableSearch() {
    var phrase = document.getElementById('search-text');
    var table = document.getElementById('myTable');
    var regPhrase = new RegExp(phrase.value, 'i');
    var flag = false;
    for (var i = 1; i < table.rows.length; i++) {
        flag = false;
        for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
            flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
            if (flag) break;
        }
        if (flag) {
            table.rows[i].style.display = "";
        } else {
            table.rows[i].style.display = "none";
        }

    }
}

function redact_student(id) {
    if (document.getElementById('redact_student_popup') !== null) {
        document.getElementById('redact_student_popup').remove()
    }

    let data = document.getElementsByClassName('id-' + id);

    let string = ''
    let window = document.createElement('div');
    window.id = 'redact_student_popup';
    let list = document.getElementsByClassName('main-col');
    for (i=0; i < data.length; i++) {
        string += "<input name='" + list[i].attributes[0].nodeValue  + "' value=\"" + data[i].innerText + "\"> - " + list[i].innerText + "</br>"
  
    }
        if (i == data.length ) {
        window.innerHTML = '<form action="actions/redact_student.php" method="POST">' + 
        '<input type="hidden" name="id" value="' + id + '">' +
        string + 
        '<button type="submit">Сохранить</button>' +
        '<button type="button" onclick="document.getElementById(\'redact_student_popup\').remove()">Закрыть</button></form>'

      }

    document.body.appendChild(window);
}
