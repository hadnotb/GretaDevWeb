 function AppBurger(){

    this.breakPoint = 600;
    this.construct = function(){
        this.initMenu();
    };
    let links = document.querySelectorAll('#MenuLink');
   
    let menuBars =document.getElementById('MenuBars');
    let menuClose =document.getElementById('MenuClose');
    let menu =document.getElementById('Menu');
    menuBars.addEventListener('click',function(){
        menuBars.style.display = 'none';
        menuClose.style.display ='block';
        // link.style.display  = "block";
        for(let link of links){
            link.style.display ='block';
        }
    });
    menuClose.addEventListener("click",function(){
        menuBars.style.display = 'block';
        menuClose.style.display ='none';
        for(let link of links){
            link.style.display ='none';
        }
    });
    let that = this;
    let curwiwidth = window.innerWidth;
    window.addEventListener('resize', function(){
        
        if(window.innerWidth  > that.breakPoint ) {
            menuBars.style.display = 'none';
            menuClose.style.display = 'none';
            for(let link of links){
                link.style.display ='block';
            }

        } else if (window.innerWidth !== curwiwidth ){

            menuBars.style.display = 'block';
            menuClose.style.display = 'none';
            for(let link of links){
                link.style.display ='none';
            }
           
        }
    });
}
function showSearchBar(){
    
    let searchBar = document.getElementById("search-bar");
  searchBar.classList.toggle("not-hidden");
}

function showCategoryList(){
    let catList = document.getElementById("Category");
    catList.classList.toggle("showCategory");
    let button = document.getElementById('boutonTrier');
    if(button.innerHTML === "Trier"){
        button.innerHTML = "Cacher";
    }else{
        button.innerHTML = "Trier";
    }   
}


let appBurger = new AppBurger();

 

// class Carousel {

//     /**
//     * @param (HTMLElement) element
//     * @param (Object) options
//     * @param (Object) options.slidesToScroll nombre d'element a faire défilé
//     * @param (Object) options.slidesVisible nombre d'element visible
//     */

//     constructor (element, options ={}) {
//         this.element = element
//         this.options = Object.assign({}, {
//             slidesToScroll: 1,
//             slidesVisible: 1
//         },options)
        
//         let children = [].slice.call(element.children);
        
//         this.root = this.createDivWithClass('carousel');
//         this.container = this.createDivWithClass('carousel__container');
//         this.root.appendChild(this.container);
//         this.element.appendChild(root);
//         this.children.map((child) => {
//            let item = this.createDivWithClass('carousel__item');
            
//             item.appendChild(child) ;
//             this.container.appendChild(item);
//             return item;
//         })
//         this.setStyle();
//     }
//     setStyle(){
//         let ratio = this.items.length / this.options.slidesVisible;
//         this.container.style.width = (ratio * 100) + "%"; 
//         this.items.forEach(item => item.style.width = ((100/ this.options.slidesVisible)/ ratio) + "%")
//     }
//     createNavigation(){
//         let nextButton = this.createDivWithClass('carousel__next')
//         let
//     }

//     /**
//     * @param (string) className 
//     * @returns (HTMLElement)
//     */

//    createDivWithClass (className){

//     let div = document.createElement('div');
//     div.setAttribute('class', className);
//     return div ;
//    }
// }

// new Carousel(document.querySelector('.lecarousel'),{
//     slidesToScroll:  b 3,

//     slidesVisible: 3
// })

$('.slider').slick({
    prevArrow: $('.slick-prev'),
    nextArrow: $('.slick-next')
});

$('.slider-forYou').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3

});















































