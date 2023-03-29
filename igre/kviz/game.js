const question=document.querySelector('#question');
const choices=Array.from(document.querySelectorAll('.choice-text'));
const progressText=document.querySelector('#progressText');
const progressBarFull=document.querySelector('#progressBarFull');
const scoreText=document.querySelector('#score');

let currentQuestion={};
let acceptingAnswers=true;
let score=0;
let questionCounter=0;
let availableQuestions=[];

let questions=[
    {
        question:'Jedini jezik koji računar razume je:',
        choice1:'mašinski jezik',
        choice2:'windows',
        choice3:'viši programski jezik',
        choice4:'engleski jezik',
        answer:1,
    },
    {
        question:'Poziv funkcije iz tela te iste funkcije zove se:',
        choice1:'restrikcija',
        choice2:'restart',
        choice3:'recall',
        choice4:'rekurzija',
        answer:4,
    },
    {
        question:'Sta znaci skracenica HTML?',
        choice1:'Home Tool Markup Language',
        choice2:'Hyperlinks and Text Markup Language',
        choice3:'Hyper Text Markup Language',
        choice4:'Hyper Transfer Mail',
        answer:3,
    },
    {
        question:'Izaberi HTML element koji ispisuje NAJVECI naslov:',
        choice1:'<h6>',
        choice2:'<p>',
        choice3:'<h3>',
        choice4:'<h1>',
        answer:4,
    },
    {
        question:'Izaberi HTML element za definisanje vaznog teksta',
        choice1:'<i>',
        choice2:'<strong>',
        choice3:'<b>',
        choice4:'<important>',
        answer:1,
    },
    {
        question:'Koji HTML element se koristi za kreiranje "drop-down" liste?',
        choice1:'<input type="list"',
        choice2:'<list>',
        choice3:'<select>',
        choice4:'<input type="dropdown"',
        answer:3,
    },
    {
        question:'Podrazumevana vrednost position property-a u CSS-u:',
        choice1:'relative',
        choice2:'static',
        choice3:'absolute',
        choice4:'fixed',
        answer:2,
    },
    {
        question:'Kako da svaka rec pocinje velikim slovom u CSS-u:',
        choice1:'text-style:capitalize',
        choice2:'transform:capitalize',
        choice3:'text-transform:capitalize',
        choice4:'Ne postoji opcija u CSS-u za to',
        answer:3,
    },
    {
        question:'Sta se koristi u SQL-u za birsanje podataka iz baze:',
        choice1:'COLLAPSE',
        choice2:'DROP',
        choice3:'DELETE',
        choice4:'REMOVE',
        answer:3,
    },
    {
        question:'Sta se koristi u SQL-u za unosenje novih podataka u bazu:',
        choice1:'INSERT NEW',
        choice2:'ADD NEW',
        choice3:'ADD RECORD',
        choice4:'INSERT INTO',
        answer:4,
    },
    {
        question:'Kako se dobijaju informacije iz forme koja je submitovana sa get metodom u php-u:',
        choice1:'Request.Form;',
        choice2:'Request.QueryString;',
        choice3:'$_GET[];',
        choice4:'$_FORM[];',
        answer:3,
    },
    {
        question:'Pravilan nacin za otvaranje fajla "time.txt" kao read-abilnog:',
        choice1:'fopen("time.txt","r");',
        choice2:'open("time.txt","read");',
        choice3:'open("time.txt");',
        choice4:'fopen("time.txt","r+");',
        answer:1,
    }
]
const SCORE_POINTS=100;
const MAX_QUESTIONS=12;

startGame=()=>{
    questionCounter=0;
    score=0;
    availableQuestions=[...questions];
    getNewQuestion();
}

getNewQuestion=()=>{
    if(availableQuestions.length===0 || questionCounter>MAX_QUESTIONS){
        localStorage.setItem('mostRecentScore', score);
        return window.location.assign('end.html');
    }
    questionCounter++;
    progressText.innerText=`Question ${questionCounter} of ${MAX_QUESTIONS}`;
    progressBarFull.style.width=`${(questionCounter/MAX_QUESTIONS)*100}%`;

    const questionIndex=Math.floor(Math.random()*availableQuestions.length);
    currentQuestion=availableQuestions[questionIndex];
    question.innerText=currentQuestion.question;

    choices.forEach(choice => {
        const number=choice.dataset['number'];
        choice.innerText=currentQuestion['choice' +number];
    })
    availableQuestions.splice(questionIndex,1);
    acceptingAnswers=true;
}

choices.forEach(choice=>{
    choice.addEventListener('click', e=>{
        if(!acceptingAnswers) return;
        acceptingAnswers=false;
        const selectedChoice=e.target;
        const selectedAnswer=selectedChoice.dataset['number'];

        let classToApply=selectedAnswer==currentQuestion.answer ? 'correct' : 'incorrect';

        if(classToApply==='correct'){
            incrementScore(SCORE_POINTS);
        }
        selectedChoice.parentElement.classList.add(classToApply);
        setTimeout(()=>{
            selectedChoice.parentElement.classList.remove(classToApply);
            getNewQuestion();
        }, 700)
    })
})

incrementScore=num=>{
    score+=num;
    scoreText.innerText=score;
}
startGame();