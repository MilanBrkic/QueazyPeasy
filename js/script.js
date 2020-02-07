const answer1=document.getElementById('answer1');
const answer2=document.getElementById('answer2');
const answer3=document.getElementById('answer3');
const answer4=document.getElementById('answer4');
const question = document.getElementById('question');
const hscore= document.getElementById('high-score');
const score_span= document.getElementById('score');
var score;
const category= document.getElementById('category');
const outof= document.getElementById('out-of');
const outof2= document.getElementById('out-of2');
const next=document.getElementById('next-btn');
next.style.visibility = "hidden";
const start = document.getElementById('start-btn');
const playa = document.getElementById('playa-btn');
const user = document.getElementById('username');
var set = new Array();


var correctVar;
var wrongArray;

var obj;
var questionNo;
var iterator;
var j;

function getJSON(){
    var xhttp = new XMLHttpRequest();
    
   
    xhttp.open('GET',"data.json",false);

    xhttp.onload = function(){
        var response =JSON.parse(xhttp.responseText);
        obj = response;
    }
    
    xhttp.send();
   
}



getJSON();


var path = window.location.pathname;
var page = path.split("/").pop();
if(page=='main.php'){
    generateSet(10);  
}
else{
    generateSet(5);
}



outof.innerHTML=set.length;
outof2.innerHTML=set.length;

function Start(){
    

    questionNo=0;
    start.style.visibility="hidden";
    
    j=set[questionNo];
    setQuestion(j,questionNo);
    

    score=0;
    score_span.innerHTML=score;
   
    caseCorrect();
    
    caseWrong();

}



function Next(){
    questionNo++;
    
    j = set[questionNo];

    if(questionNo>=set.length){
        playa.style.visibility='visible';
        next.style.visibility='hidden';

        var xhttp = new XMLHttpRequest();
        var params = "score="+score_span.innerHTML;
        
        xhttp.open('POST','../server/highscore.php',true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        

        xhttp.send(params);
        
        return;
    }
    setQuestion(j,questionNo);
    next.style.visibility = "hidden";

    answer1.style.background='black';
    answer2.style.background='black';
    answer3.style.background='black';
    answer4.style.background='black';
    
    caseCorrect();

    caseWrong();
}


function setQuestion(j,questionNo){
    question.innerHTML=questionNo+1 +"."+obj[j].question;
    answer1.innerHTML=obj[j].answer1;
    answer2.innerHTML=obj[j].answer2;
    answer3.innerHTML=obj[j].answer3;
    answer4.innerHTML=obj[j].answer4;
}

function PlayAgain(){
    location.reload();
}

function caseCorrect(){
    switch(parseInt(obj[j].correct)){
        case 2:
            correctVar =answer1;
            wrongArray=[answer2,answer3,answer4];
            break;
        case 3:
            correctVar = answer2;
            wrongArray=[answer1,answer3,answer4];
            break;
        case 4:
            correctVar = answer3;
            wrongArray=[answer1,answer2,answer4];
            break;
        case 5:
            correctVar = answer4;
            wrongArray=[answer1,answer2,answer3];
            break;
    }
    correctVar.onclick= function(){
        correctAnswer();
    }
}


function caseWrong(){
    for(var i=0;i<3;i++){
        wrongArray[i].onclick=function(){
            wrongAnswer();
        }
    }
}



function removeEvents(){
    correctVar.onclick=null;
    

    for(var i=0;i<3;i++){
        wrongArray[i].onclick=null;
    }
}


function correctAnswer(){
    correctVar.style.background = '#2E8B57';
    score++;
    score_span.innerHTML=score;
    
    removeEvents();
    next.style.visibility = "visible";
}

function wrongAnswer(){
    
    correctVar.style.background = '#2E8B57';
    for(var i=0;i<3;i++){
        wrongArray[i].style.background = '#db0f0f';
    }

    removeEvents();
    next.style.visibility = "visible";
}

function generateSet(limit){
    var i=0;
   while(set.length!=limit){
       var random = Math.floor(Math.random()*obj.length);
       if(!exist(random)){
            set[i]=random;
            i++;
        }
        
   }
   console.log(set);
   
   
   
}

function exist(num){
    for(var i=0;i<set.length;i++){
        if(num==set[i]){
            return true;
        }
    }
    return false;
}

