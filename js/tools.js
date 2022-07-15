function GetResult(id) {
    var formData = new FormData(document.forms.tools_form);
   
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/tools/get_result.php?id=" + id);
    xhr.send(formData);
   
    var result = xhr.responseText;
    alert(result);
}