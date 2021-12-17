

let bCat = document.getElementById('MenuLinkCategorie');


function onClickCat(){
    let list = document.getElementById('categoryList');
    

    list.classList.toggle('hidden');

}

bCat.addEventListener('click',onClickCat);
