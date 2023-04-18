
const playBoard=document.querySelector(".play-board");
const scoreEl=document.querySelector(".score");
const controls=document.querySelectorAll(".controls i");
let gameOver=false;
let foodX, foodY;
let snakeX=5,snakeY=10;
let velocityX=0,velocityY=0;
let snakeBody=[];
let setIntervalId;
let score=0;
const changeFoodPosition=()=>{
    foodX=Math.floor(Math.random()*30) +1;
    foodY=Math.floor(Math.random()*30) +1;
}
const handleGameOver=(e)=>{
    localStorage.setItem('mostRecentScore', score);
    clearInterval(setIntervalId);
    
    return window.location.assign('end.html');
}
const changeDirection=(e)=>{
    if(e.key=="ArrowUp" && velocityY!=1){
        velocityX=0;
        velocityY=-1;
    }
    else if(e.key=="ArrowDown" && velocityY!=-1){
        velocityX=0;
        velocityY=1;
    }
    else if(e.key=="ArrowLeft" && velocityX!=1){
        velocityX=-1;
        velocityY=0;
    }
    else if(e.key=="ArrowRight" && velocityX!=-1){ // && velocityX sprecava da zmija direktno promeni smer iz desnog u levi i iz gornjeg u donji
        velocityX=1;
        velocityY=0;
    }
    initGame();
}
controls.forEach(key => {
    key.addEventListener("click", ( )=> changeDirection({key:key.dataset.key}));
});
const initGame=()=>{
    if(gameOver===true){
        return handleGameOver();
    }
    let htmlMarkup=`<div class="food" style="grid-area: ${foodY}/${foodX} "></div>`;
    if(snakeX ===foodX && snakeY ===foodY){
        changeFoodPosition();
        snakeBody.push([foodX,foodY]);
        score++;
        scoreEl.innerText=`Rezultat: ${score}`;
    }
    for(let i=snakeBody.length-1;i>0;i--){
        snakeBody[i]=snakeBody[i-1];
    }
    snakeBody[0]=[snakeX,snakeY];
    snakeX+=velocityX;
    snakeY+=velocityY;

    if(snakeX<=0 || snakeX>30 || snakeY<=0 || snakeY>30){
        gameOver=true;

    }

    for(let i=0;i<snakeBody.length;i++){
        htmlMarkup+=`<div class="snakeHead" style="grid-area: ${snakeBody[i][1]}/${snakeBody[i][0]}"></div>`;
        if(i!==0 && snakeBody[0][1]===snakeBody[i][1] && snakeBody[0][0]===snakeBody[i][0]){
            gameOver=true;

        }

    }
    playBoard.innerHTML=htmlMarkup;
}
changeFoodPosition();
setIntervalId= setInterval(initGame,125);
document.addEventListener("keydown", changeDirection);