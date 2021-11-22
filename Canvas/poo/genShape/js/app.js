import { Circle } from "./module/Circle.js";
import { Rectangle } from "./module/Rectangle.js";
import { Word } from "./module/Word.js";


const canvas1 = document.getElementById('canvas1');
const canvas2 = document.getElementById('canvas2');
const ctx1 = canvas1.getContext('2d');
const ctx2 = canvas2.getContext('2d');
// canvas.width = window.innerWidth;
// canvas.height = window.innerHeight;
var width = canvas1.width;
var height = canvas1.height;
canvas1.addEventListener('click',onClickCanvas);
canvas2.addEventListener('click',onClickCanvas);


let WordTabs = ['Albert', 'ihhhhhh', 'Ohhh Ouiiiiii','Ehhhhhhhh','Amusons','Mkderh','Bibi','Toto'];
    


function onClickCanvas(event){
    let randomIndex = Math.floor(Math.random()*WordTabs.length);
    console.log(randomIndex);
    let random = Math.random();
    let word = WordTabs[randomIndex];
    let x = event.offsetX;
    let y = event.offsetY;
    let rayon = getRandomIntInclusive(1,150);
    let width = getRandomIntInclusive(0,150);
    let height = getRandomIntInclusive(0,150);
    let color = genRgbColor();
    
    
    if(random<=0.33){
        let circle = new Circle(x,y,rayon,color);
        return circle.draw(ctx1);
        // let rayon = getRandomIntInclusive(1,150);
        // genCircle(rayon,rgb,x,y);
        // return genCircle;
        
    }
    else if(random<=0.66 && random>0.33) {

        let rectangle = new Rectangle(x,y,width,height,color);
        return rectangle.draw(ctx1);

    
        // genRectangle(x,y,rgb,width,height);
        // return genRectangle;
    }else{
        let words = new Word(x,y,word,color);
        return words.draw(ctx1);
        
    }
    
}




function genRgbColor(){
    let red = getRandomIntInclusive(0,235);
    let green = getRandomIntInclusive(0,235);
    let blue = getRandomIntInclusive(0,235);
    let opacity = Math.random();
    return "rgb("+red+","+green+","+blue+","+opacity+")";
}

function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min +1)) + min;
}



// function genCircle(rayon,rgb,x,y){
//     ctx.beginPath();
//     ctx.fillStyle = rgb;
//     ctx.arc(x,y, rayon, 0, Math.PI * 2, true);  // Cercle extérieur
//     ctx.moveTo(110,75); 
//     ctx.fill();
// }

function genRectangle(x,y,rgb,width,height){

    ctx.beginPath();
    ctx.fillStyle = rgb;
    ctx.fillRect(x, y, width, height);

}
















 