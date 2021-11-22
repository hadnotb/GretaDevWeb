const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
// var width = canvas.width;
// var height = canvas.height;
// ctx.fillStyle = 'rgb(0, 0, 0)';
// ctx.fillRect(0, 0, width, height);

ctx.fillStyle ='rgb(25,46,150)';
canvas.addEventListener('click',onClickCanvas);


function onClickCanvas(event){
    let random = Math.random();
    
    let x = event.offsetX;
    let y = event.offsetY;
    let width = getRandomIntInclusive(0,150);
    let height = getRandomIntInclusive(0,150);
    let rgb = genRgbColor();
    if(random < 0.5){
        
        let rayon = getRandomIntInclusive(1,150);
        genCircle(rayon,rgb,x,y);
        return genCircle;
    }
    else {

        genRectangle(x,y,rgb,width,height);
        return genRectangle;
    }
    
}




function genRgbColor(){
    let red = getRandomIntInclusive(0,235);
    let green = getRandomIntInclusive(0,235);
    let blue = getRandomIntInclusive(0,235);
    let opacity = Math.random();
    return "rgb("+red+","+green+","+blue+","+opacity+")";
}



function genCircle(rayon,rgb,x,y){
    
    ctx.fillStyle = rgb;
    ctx.arc(x,y, rayon, 0, Math.PI * 2, true);  // Cercle extérieur
    ctx.moveTo(110,75); 
    
    ctx.fill();
}

function genRectangle(x,y,rgb,width,height){

    ctx.beginPath();
    ctx.fillStyle = rgb;
    ctx.fillRect(x, y, width, height);

}








function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min +1)) + min;
}





 