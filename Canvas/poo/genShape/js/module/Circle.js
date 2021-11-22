export class Circle {
    constructor(centerX, centerY, radius, color){
        this.centerX = centerX;
        this.centerY = centerY;
        this.radius = radius;
        this.color = color;
    }

    draw(context){

        context.beginPath();
        context.fillStyle = this.color;
        context.arc(this.centerX,this.centerY, this.radius, 0, Math.PI * 2, true);  
        context.moveTo(110,75); 
        context.fill();

    }

}