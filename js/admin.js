var asc = true;

function sort(){
        var xhr = new XMLHttpRequest();
        if(asc){
            xhr.open('POST', '../ajax/sortasc.php',true);
            asc = !asc;
        }
        else{
            xhr.open('POST', '../ajax/sortdesc.php',true);
            asc = !asc;
        }
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
        xhr.onload = function(){
            document.getElementById('refresh').innerHTML = this.responseText;
        }
    
        xhr.send();
}

function search(){
    var xhr = new XMLHttpRequest();
    var params = "keyword="+document.getElementById("keyword").value;
    document.getElementById("keyword").value = "";
    xhr.open('POST', '../ajax/search_ajax.php',true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        document.getElementById('refresh').innerHTML = this.responseText;
    }

    xhr.send(params);
}

function defaultTable(){
    var xhr = new XMLHttpRequest();
    
    
    xhr.open('POST', '../ajax/default_ajax.php',true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        document.getElementById('refresh').innerHTML = this.responseText;
    }

    xhr.send();
}