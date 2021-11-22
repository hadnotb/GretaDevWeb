let currentPosition = {
    x: 0,
    y: 0
};

let isDrawing = false;
let color ='blue';
let canvaBackgroundColor = 'black';

let gomme1 = document.getElementById('gomme1');
let gomme2 = document.getElementById('gomme2');
let gomme3 = document.getElementById('gomme3');

const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

let colorInput = document.getElementById('colorInput');
let lineWidth = document.getElementById('lineWidth');
canvas.style.backgroundColor = canvaBackgroundColor;
let lineSize = 10;



let colors =  document.querySelectorAll('.color');
let eraser =  document.querySelectorAll('.fa-eraser');



for(let i = 0; i< colors.length; i++){

    let currentDiv = colors[i];

    currentDiv.addEventListener('click',onClickColor);
   
}
for(let i = 0; i< eraser.length; i++){

    let currentEraserSize = eraser[i];
    // console.log(currentEraserSize);
    currentEraserSize.addEventListener('click', initEraserSize)
}

function initEraserSize(){
    lineSize = this.dataset.erasesize;
    
}

function initLineWith(){
    lineSize = this.value;
    
}
function onClickColor(){
    color = this.dataset.color;
    lineSize = lineWidth.value;
}





function onMouseDown(event){

   
    currentPosition.x = event.offsetX;
    currentPosition.y = event.offsetY;
    isDrawing = true;
    
}

function onMouseMove(event){
    if(isDrawing == true){

        drawLine(ctx,currentPosition.x,currentPosition.y,event.offsetX,event.offsetY);
        currentPosition.x = event.offsetX;
        currentPosition.y = event.offsetY;
    } 
}
function onMouseEnter(event){
    if(isDrawing == true){
        currentPosition.x = event.offsetX;
        currentPosition.y = event.offsetY;
    }
}

function onMouseUp(){
    if(isDrawing == true){
        
        currentPosition.x = 0;
        currentPosition.y = 0;
        isDrawing = false;

    }
}




function drawLine(context, x1, y1, x2, y2) {
   
    context.beginPath();
    context.strokeStyle = color;
    context.lineWidth = lineSize;
    context.moveTo(x1, y1);
    context.lineTo(x2, y2);
    context.stroke();
    context.closePath();
}
function onClickErase(){

    color =canvaBackgroundColor;

}
function initColorInput(){

    color = this.value;
}



canvas.addEventListener("mousedown", onMouseDown);
canvas.addEventListener("mousemove", onMouseMove)
document.addEventListener("mouseup", onMouseUp);
canvas.addEventListener('mouseenter', onMouseEnter)
lineWidth.addEventListener('input', initLineWith);
colorInput.addEventListener('input',initColorInput)
gomme1.addEventListener('click',onClickErase);
gomme2.addEventListener('click',onClickErase);
gomme3.addEventListener('click',onClickErase);


  