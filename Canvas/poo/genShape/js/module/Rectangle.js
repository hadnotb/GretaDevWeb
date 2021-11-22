export class Rectangle{
    constructor(originX,originY,width,height,color){
        this.originX = originX;
        this.originY =originY;
        this.width = width;
        this.height =height;
        this.color = color;
    }

    draw(context){

        context.beginPath();
        context.fillStyle = this.color;
        context.fillRect(this.originX, this.originY, this.width, this.height);

    }


}



