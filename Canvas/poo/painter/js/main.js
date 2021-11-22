import { Slate } from "./module/Slate.js";
import { Pen } from "./module/Pen.js";
import { Painter } from "./module/Painter.js";


// Petite function temporaire --------------------------------------
function genRgbColor(){
    let red = getRandomIntInclusive(0,235);
    let green = getRandomIntInclusive(0,235);
    let blue = getRandomIntInclusive(0,235);
    let opacity = Math.random();
    return "rgb("+red+","+green+","+blue+")";
}
function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min +1)) + min;
}
// Petite function temporaire --------------------------------------
let bgColor = null;
let bgInput = document.getElementById('bgInput')
bgInput.addEventListener('input',onChangeInputBgColor)

function onChangeInputBgColor(){
    bgColor = this.value;
    

}

    


// console.log(bgColor);
let bg1 = genRgbColor();
let bg2= genRgbColor();
let bg3= genRgbColor();
const painter = new Painter(bgColor,'canvas');
// let saveCanva = document.getElementById('canvas');
// let saveCanva = Slate.canv;





// async function onSubmitDownload(event){
//     // On annule le comportement par défaut du navigateur
//     event.preventDefault();

//     // On récupère les données du formulaire grâce à la classe FormData
//     const formData = new FormData(Form);
//     // const formData = new FormData(this);
//     // const formData = new FormData(evet.currentTarget);
    
//       // On préparer les options de la requête
//     const url = '../ajax.php';
//     const options = {
//         method : "POST",
//         body: formData
//     }
//     // On envoie la requête AJAX avec fetch()
//     // 2 syntaxe : ↓
//     // fetch(url,options).then(response => response.text()).then(svg => console.log(svg));
//     const response = await fetch(url,options);
//     const data = await response.text();
    
//      // Remplacement du code SVG de l'avatar... sur la page... (le placer dans une <div> avec un id)
//     let AvContainer = document.getElementById('avatar-container');
//     AvContainer.innerHTML = data;

//     //  ... mais aussi dans les champs cachés des autres formulaires !
//      document.querySelectorAll('[name="svg"]').forEach(field => {
//         field.value = data;
//     });
// } 