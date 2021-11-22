import{Painter} from'./Painter.js';
import{Pen} from'./Pen.js';
export class Slate {

    constructor(pen,bgColor,id){
        this.currentPosition = {
            x:0,
            y:0
        }
        this.pen = pen;
        this.isDrawing = false;
        this.slateBg = bgColor;
        this.canvas = document.getElementById(id);
        this.canvas.style.backgroundColor = bgColor;
        this.ctx = this.canvas.getContext('2d');
        this.installEventHandlers();
        this.BgDraw(this.ctx,bgColor);
        

    }
    installEventHandlers(){
        
        // let canvas = document.getElementById('canvas'); a laisser si tu veux creer toujours le meme canva
        this.canvas.addEventListener("mousedown", this.onMouseDown.bind(this));
        this.canvas.addEventListener("mousemove", this.onMouseMove.bind(this));
        document.addEventListener("mouseup", this.onMouseUp.bind(this));
        this.canvas.addEventListener('mouseenter', this.onMouseEnter.bind(this));
        
        let submit = document.getElementById('submit-canva');
        submit.addEventListener('click', this.saveCanva.bind(this));
        
        
        

        
    }

    onMouseDown(event){

   
        this.currentPosition.x = event.offsetX;
        this.currentPosition.y = event.offsetY;
        this.isDrawing = true;
        
        
    }
    
    onMouseMove(event){
        if(this.isDrawing == true){
    
            this.drawLine(this.ctx, this.currentPosition.x, this.currentPosition.y, event.offsetX,event.offsetY);
            this.currentPosition.x = event.offsetX;
            this.currentPosition.y = event.offsetY;
        } 
    }
     onMouseEnter(event){
        if(this.isDrawing == true){
            this.currentPosition.x = event.offsetX;
            this.currentPosition.y = event.offsetY;
        }
    }
    
    onMouseUp(){
        if(this.isDrawing == true){
            
            this.currentPosition.x = 0;
            this.currentPosition.y = 0;
            this.isDrawing = false;
    
        }
    }
    drawLine(context, x1, y1, x2, y2) {
   
        context.beginPath();
        context.strokeStyle = this.pen.color;
        context.lineWidth = this.pen.size;
        context.moveTo(x1, y1);
        context.lineTo(x2, y2);
        context.stroke();
        context.closePath();
    }
    BgDraw(context,bgColor){
        context.fillStyle = bgColor;
        context.fillRect(0, 0, this.canvas.width, this.canvas.height);
    }

    async saveCanva(){
        const dataUrl = this.canvas.toDataURL('image/png');
        
        console.log(dataUrl);
        
        const formData = new FormData();
        formData.append('canva',dataUrl);
        
        
        
        const url = 'save.php';
        const options = {
            method : "POST",
            body: formData
        }
      
        const response = await fetch(url,options);

        const fileName = await response.text();
        // console.log(data);
        const vignette = document.createElement('img');
        vignette.setAttribute('class','vig');
        vignette.src = 'canvas/'+fileName;
        
        document.getElementById('canva-image').appendChild(vignette);


        
    }
}