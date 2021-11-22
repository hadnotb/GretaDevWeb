import { Pen } from "./Pen.js";
import { Slate } from "./Slate.js";

export class Painter {

    constructor(bgColor,id){
        this.pen = new Pen();
        this.slate = new Slate(this.pen,bgColor,id);
        this.installEventHandlers();
        this.lineWidth = document.getElementById('lineWidth');
        this.colorInput = document.getElementById('colorInput');

        
    }

    installEventHandlers(){
        
        let gomme1 = document.getElementById('gomme1');
        let gomme2 = document.getElementById('gomme2');
        let gomme3 = document.getElementById('gomme3');
        // let colorInput = document.getElementById('colorInput');
        
        
        let colors =  document.querySelectorAll('.color');
        let eraser =  document.querySelectorAll('.fa-eraser');

        for(let i = 0; i< colors.length; i++){

            let currentDiv = colors[i];
            currentDiv.addEventListener('click',this.onClickColor.bind(this));
           
        }
        for(let i = 0; i< eraser.length; i++){

            let currentEraserSize = eraser[i];
            // console.log(currentEraserSize);
            currentEraserSize.addEventListener('click', this.initEraserSize.bind(this))
        }
        
        
        lineWidth.addEventListener('input', this.initLineWith.bind(this));
        colorInput.addEventListener('input',this.initColorInput.bind(this));
        // gomme1.addEventListener('click',this.onClickErase.bind(this));
        // gomme2.addEventListener('click',this.onClickErase.bind(this));
        // gomme3.addEventListener('click',this.onClickErase.bind(this));
        
       
    }
    onClickErase(){

        this.pen.setColor( this.slate.slateBg);
        this.pen.setSize(this.line)
    
    }
    initColorInput(){
    
        this.pen.setColor(this.colorInput.value);
    }
    initEraserSize(event){
        const ErSize = event.currentTarget.dataset.erasesize;
        console.log(ErSize)
        this.pen.setSize(ErSize);
        this.pen.setColor( this.slate.slateBg);
    }
    
    initLineWith(){
        this.pen.setSize(this.lineWidth.value);
        
    }
    onClickColor(event){
        const color  = event.currentTarget.dataset.color;
        const size = this.lineWidth.value;
        this.pen.setColor(color);
        this.pen.setSize(size);
        // console.log(this.pen.color);
        // console.log(this.pen.size);
    }
    
}