const desktop = window.matchMedia("screen and (min-width: 1280px)");
if (desktop.matches) {
window.onload = function(){
    const section = document.querySelectorAll('section');
    const sectionCount = section.length;

    const ix = document.querySelector('.index');
    const il = document.querySelector('.index__list');
    il.addEventListener('mousewheel', function(event){
        event.preventDefault();
    });
    
    const ic = document.querySelectorAll('.index__circle');
    
    function indexOn() {
        setTimeout(function () {ix.style.display = "block";}, 150)
    };

    ic.forEach(function(clickCircle, index){
        clickCircle.addEventListener('click', function(event){
            let circleSelector = ic[index];
            if (circleSelector === ic[0]) {
                ix.style.display = "none";
            } else {
                indexOn();
            }
        })
    });

    const wb = document.querySelector('.welcome__btn');
    wb.addEventListener('click', function(event){
        indexOn();
    })

    section.forEach(function(item, index){
        item.addEventListener('mousewheel', function(event){
            event.preventDefault();
            let delta = 0;

            if (!event) event = window.event;
            if (event.wheelDelta) {
                delta = event.wheelDelta / 120;
                if (window.opera) delta = -delta;
            } 
            else if (event.detail)
                delta = -event.detail / 3;

            let moveTop = window.scrollY;
            let sectionSelector = section[index];

            // wheel down : move to next section
            if (delta < 0){
                if (sectionSelector !== sectionCount-1){
                    try{
                        if (sectionSelector === section[0]) {
                            indexOn();
                        }
                        moveTop = window.pageYOffset + sectionSelector.nextElementSibling.getBoundingClientRect().top;
                    }catch(e){}
                }
            }
            
            // wheel up : move to previous section
            else{
                if (sectionSelector !== 0){
                    try{
                        if (sectionSelector === section[1]) {
                            ix.style.display = "none";
                        }
                        moveTop = window.pageYOffset + sectionSelector.previousElementSibling.getBoundingClientRect().top;
                    }catch(e){}
                }
            }

            const body = document.querySelector('html');
            window.scrollTo({top:moveTop, left:0, behavior:'smooth'});
        });
    });
}
}