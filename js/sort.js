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