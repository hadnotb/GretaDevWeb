export class Word{

    constructor(originX,originY,word,color){
        this.originX = originX;
        this.originY =originY;
        this.word = word;
        this.color = color;
    }

    draw(context){

        context.beginPath();
        context.fillStyle=this.color;
        context.strokeStyle="rgb(15, 14, 14)";
        context.lineWidth=1;
        context.font="50pt arial";
        context.fillText(this.word,this.originX,this.originY);
        context.strokeText(this.word,this.originX,this.originY); 

    }

}


