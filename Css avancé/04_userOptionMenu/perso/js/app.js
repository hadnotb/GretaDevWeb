const picus = document.querySelector('.SiteHeader-avatarImg');

picus.addEventListener('click',changeNavUser);

function changeNavUser(){
    
    let nav = document.querySelector('.NavUser');
    
    nav.classList.toggle('navUserClicked');
    picus.classList.toggle('indeximg');

}