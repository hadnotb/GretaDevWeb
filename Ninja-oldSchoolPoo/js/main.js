
function player(name,domId){
    this.name = '';
    this.dom = null ;
    this.life = null;

    this.construct = function(name,domId){
        this.name = name;
        alert(this.name);
        this.dom = document.getElementById(domId);
    };
    this.construct(name,domId);
}
let Player2 = new player('Naruto','PlayerTwo');
let Player1 = new player('Naruto','PlayerOne');


let player1 = document.getElementById("PlayerOne");
let player2 = document.getElementById("PlayerTwo");
let winner = null;
let loser = null;
let playAgain = document.getElementById('Play-again');
document.addEventListener('keyup',play);
document.addEventListener('click', refresh);



function play(e){
    
    if (e.code == "KeyA"){
        player2.classList.add('playing');
        if(winner){
            return;
        }
        
        winner = player2;
        loser = player1;
    }
    else if (e.code == "Numpad6"){
        player1.classList.add('playing');
        if(winner){
            return;
        }
        winner = player1;
        loser = player2;
    }
    winner.classList.add('winner');
    loser.classList.add('loser');
    playAgain.classList.add('Play-again-show');
}





function refresh(){

    player1.classList.remove('winner');
    player1.classList.remove('loser');
    player1.classList.remove('playing');

    player2.classList.remove('winner');
    player2.classList.remove('loser');
    player2.classList.remove('playing');

    playAgain.classList.remove('Play-again-show');

    winner = null;
    loser = null;


}
function keyPress(e){
    if(e.code =="Space"){
        refresh();
    }
}