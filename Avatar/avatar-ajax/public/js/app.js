let Form = document.getElementById('form-generate');

let Save = document.getElementById('save-form');

async function onSubmitGenerate(event){
    // On annule le comportement par défaut du navigateur
    event.preventDefault();

    // On récupère les données du formulaire grâce à la classe FormData
    const formData = new FormData(Form);
    // const formData = new FormData(this);
    // const formData = new FormData(evet.currentTarget);
    
      // On préparer les options de la requête
    const url = '../ajax.php';
    const options = {
        method : "POST",
        body: formData
    }
    // On envoie la requête AJAX avec fetch()
    // 2 syntaxe : ↓
    // fetch(url,options).then(response => response.text()).then(svg => console.log(svg));
    const response = await fetch(url,options);
    const data = await response.text();
    
     // Remplacement du code SVG de l'avatar... sur la page... (le placer dans une <div> avec un id)
    let AvContainer = document.getElementById('avatar-container');
    AvContainer.innerHTML = data;

    //  ... mais aussi dans les champs cachés des autres formulaires !
     document.querySelectorAll('[name="svg"]').forEach(field => {
        field.value = data;
    });
}
async function onSubmitSave(event){
    event.preventDefault();

    // On récupère les données du formulaire grâce à la classe FormData
    const formData = new FormData(Save);
    // const formData = new FormData(this);
    // const formData = new FormData(evet.currentTarget);
    
      // On préparer les options de la requête
    const url = '../ajax.php';
    const options = {
        method : "POST",
        body: formData
    }
    // On envoie la requête AJAX avec fetch()
    // 2 syntaxe : ↓
    // fetch(url,options).then(response => response.text()).then(svg => console.log(svg));
    const response = await fetch(url,options);
    // const data = await response.text();
    
    //  // Remplacement du code SVG de l'avatar... sur la page... (le placer dans une <div> avec un id)
    // let AvContainer = document.getElementById('avatar-container');
    // AvContainer.innerHTML = data;

    // //  ... mais aussi dans les champs cachés des autres formulaires !
    //  document.querySelectorAll('[name="svg"]').forEach(field => {
    //     field.value = data;
    // });

}






Form.addEventListener('submit',onSubmitGenerate);
Save.addEventListener('submit', onSubmitSave);

