const userElt = document.querySelector('.UserMenu-userBox-img');
const userMenuElt = document.querySelector('.UserMenu');
const userMenuLink = document.querySelectorAll('.UserMenu-nav-item-link');


//----------------

userElt.addEventListener("click", function(){
    console.log("coucou");
    //Si le UserMenu contient la classe active
    if (userMenuElt.classList.contains("active")){
        userMenuElt.classList.remove("active");
        
    //Si c'est que le menu est invisible
    }else{
        userMenuElt.classList.add("active");
    }


});

// on aurait pu faire ce qui suit en css, mais avec javascript la classe s'applique quel que soit le nombre d'item de menu, en CSS ce serait impossible
for(let i = 0 ; i<userMenuLink.length ; i++){
    userMenuLink[i].style.animationDelay = i/20 + "s";
}