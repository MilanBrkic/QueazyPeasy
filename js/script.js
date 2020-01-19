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

var correctVar;
var wrongArray;
var index;
// var obj;

// const obj=[{
//     question: "Koliko je 2+2?",
//     answer1: 1,
//     answer2: 2,
//     answer3: 3,
//     answer4: 4,
//     correct: 5
// },
// {
//     question: "Koliko je 3+3?",
//     answer1: 6,
//     answer2: 4,
//     answer3: 3,
//     answer4: 5,
//     correct: 2
// },
// {
//     question: "Leo messi?",
//     answer1: "Najgori",
//     answer2: "Najbolji",
//     answer3: "Onk",
//     answer4: "Moze bolje",
//     correct: 3
// }]


function getJSON(){
    var xhttp = new XMLHttpRequest();
    var response;
   
    xhttp.open('GET',"data.json",true);

    xhttp.onload = function(){
        response =JSON.parse(xhttp.responseText);
        console.log(response)
        // return response;
    }
    
    xhttp.send();
   
}

getJSON();
// console.log(getJSON()); 

// console.log(obj);
// outof.innerHTML=obj.length;
// outof2.innerHTML=obj.length;

function Start(){
    
    start.style.visibility="hidden";
    index=0;
    question.innerHTML=obj[index].question;
    answer1.innerHTML=obj[index].answer1;
    answer2.innerHTML=obj[index].answer2;
    answer3.innerHTML=obj[index].answer3;
    answer4.innerHTML=obj[index].answer4;
    

    score=0;
    score_span.innerHTML=score;
   
    caseCorrect();
    
    caseWrong();

}

function Next(){
    
    index++;
    if(index==obj.length){
        return;
    }
    question.innerHTML=obj[index].question;
    answer1.innerHTML=obj[index].answer1;
    answer2.innerHTML=obj[index].answer2;
    answer3.innerHTML=obj[index].answer3;
    answer4.innerHTML=obj[index].answer4;
    next.style.visibility = "hidden";

    answer1.style.background='black';
    answer2.style.background='black';
    answer3.style.background='black';
    answer4.style.background='black';
    
    caseCorrect();

    caseWrong();
}

function caseCorrect(){
    switch(obj[index].correct){
        case 2:
            correctVar =answer1;
            wrongArray=[answer2,answer3,answer4];
            console.log(correctVar);
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
    console.log('tacno');
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

