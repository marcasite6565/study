const slider = document.querySelector('.portfolio__boxes');
const sliderContents = document.querySelectorAll('.portfolio__box');
const slide = document.querySelector('.portfolio__slide');

let currentIdx = 0;
const sliderItem = sliderContents.length;

const prev = document.getElementById("prev");
const next = document.getElementById('next');

let isMouseDown = false;
let startx, x;

let timer;

const dt = window.matchMedia("screen and (min-width: 1280px)");
const mobile = window.matchMedia("screen and (max-width: 550px)");

if (dt.matches) {
    makeSliderDesktop();
}

const box = document.querySelectorAll('.portfolio__box');

box.forEach(element => {
    element.addEventListener("click", () => {
        element.children[0].classList.toggle("portfolio__card--flipped");
        element.children[1].classList.toggle("portfolio__card--flipped");
    })
});

if (dt.matches) {
    const sliderItemWidth_web = 580;

    document.getElementsByClassName("portfolio__boxes")[0].style.width = sliderItemWidth_web * (sliderItem+2) + 'px';
    document.getElementsByClassName("portfolio__boxes")[0].style.left = -sliderItemWidth_web + 'px';
    /*drag_scroll(slider);*/

    prev.addEventListener('click', handler_prev);
    next.addEventListener('click', handler_next);

    box[0].addEventListener('click', () => {
        box[box.length-2].children[0].classList.toggle("portfolio__card--flipped");
        box[box.length-2].children[1].classList.toggle("portfolio__card--flipped");
    });

    box[box.length-2].addEventListener('click', () => {
        box[0].children[0].classList.toggle("portfolio__card--flipped");
        box[0].children[1].classList.toggle("portfolio__card--flipped");
    });

    box[1].addEventListener('click', () => {
        box[box.length-1].children[0].classList.toggle("portfolio__card--flipped");
        box[box.length-1].children[1].classList.toggle("portfolio__card--flipped");
    });

    box[box.length-1].addEventListener('click', () => {
        box[1].children[0].classList.toggle("portfolio__card--flipped");
        box[1].children[1].classList.toggle("portfolio__card--flipped");
    });

    function handler_prev() {
        if (!timer) {
            timer = setTimeout(function() {
                timer = null;
                if (currentIdx === 0){
                    currentIdx -= 1;
                    slider.style.transition = "transform 0.3s ease-out";
                    slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    currentIdx = sliderItem-1;
                    setTimeout(function () {
                        slider.style.transition = "transform 0s ease-out";
                        slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    }, 300)
                } else if (currentIdx < 0) {
                    currentIdx = sliderItem-1;
                    slider.style.transition = "transform 0s ease-out";
                    slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    currentIdx -= 1;
                    setTimeout(function () {
                        slider.style.transition = "transform 0.3s ease-out";
                        slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    }, 50)
                } else {
                    currentIdx -= 1;
                    slider.style.transition = "transform 0.3s ease-out";
                    slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                }
            }, 300);
        }
    }

    function handler_next() {
        if (!timer) {
            timer = setTimeout(function() {
                timer = null;
                if (currentIdx === sliderItem-2){
                    currentIdx += 1;
                    slider.style.transition = "transform 0.3s ease-out";
                    slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    currentIdx = -1;
                    setTimeout(function () {
                        slider.style.transition = "none";
                        slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    }, 300)
                } else if (currentIdx > sliderItem-2) {
                    currentIdx = -1;
                    slider.style.transition = "none";
                    slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    currentIdx += 1;
                    setTimeout(function () {
                        slider.style.transition = "transform 0.3s ease-out";
                        slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    }, 50)
                } else {
                    currentIdx += 1;
                    slider.style.transition = "transform 0.3s ease-out";
                    slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                }
            }, 300);
        }
    }
}

if (!dt.matches && !mobile.matches) {
    const sliderItemWidth_web = 385;
    
    document.getElementsByClassName("portfolio__boxes")[0].style.width = sliderItemWidth_web * (sliderItem+2) + 'px';
    /*document.getElementsByClassName("portfolio__boxes")[0].style.left = 'calc(-' + sliderItemWidth_web + 'px + calc(calc(100vw - ' + sliderItemWidth_web + 'px)/2)';*/

    drag_scroll(slide);

    function drag_scroll(p1){
        p1.addEventListener("touchstart", e => {
            isMouseDown = true;
            startx = e.touches[0].pageX;
        });

        p1.addEventListener("touchend", e => {
            if (!isMouseDown) return;

            e.preventDefault();
            x = e.changedTouches[0].pageX;
            
            isMouseDown = false;

            if (x < startx && currentIdx < sliderItem-1) {
                if (!timer) {
                    timer = setTimeout(function() {
                        timer = null;
                        currentIdx += 1;
                        slider.style.transition = "transform 0.3s ease-out";
                        slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    }, 300)
                }
            } else if (x > startx && currentIdx > 0) {
                if (!timer ) {
                    timer = setTimeout(function() {
                        timer = null;
                        currentIdx -= 1;
                        slider.style.transition = "transform 0.3s ease-out";
                        slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    }, 300);
                }
            } else {
                box.forEach(element => {
                    element.addEventListener("touchend", () => {
                        element.children[0].classList.toggle("portfolio__card--flipped");
                        element.children[1].classList.toggle("portfolio__card--flipped");
                    })
                });
            }
        });
    }
}

if (mobile.matches) {
    const sliderItemWidth_web = 304;
    
    document.getElementsByClassName("portfolio__boxes")[0].style.width = sliderItemWidth_web * sliderItem + 'px';
    /*document.getElementsByClassName("portfolio__boxes")[0].style.left = 'calc(-' + sliderItemWidth_web + 'px + calc(calc(100vw - ' + sliderItemWidth_web + 'px)/2)';*/

    drag_scroll(slide);

    function drag_scroll(p1){
        p1.addEventListener("touchstart", e => {
            isMouseDown = true;
            startx = e.touches[0].pageX;
        });

        p1.addEventListener("touchend", e => {
            if (!isMouseDown) return;

            e.preventDefault();
            x = e.changedTouches[0].pageX;
            
            isMouseDown = false;

            if (x-startx < -5 && currentIdx < sliderItem-1) {
                if (!timer) {
                    timer = setTimeout(function() {
                        timer = null;
                        currentIdx += 1;
                        slider.style.transition = "transform 0.3s ease-out";
                        slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    }, 300)
                }
            } else if (x-startx > 5 && currentIdx > 0) {
                if (!timer ) {
                    timer = setTimeout(function() {
                        timer = null;
                        currentIdx -= 1;
                        slider.style.transition = "transform 0.3s ease-out";
                        slider.style.transform = "translateX(" + -sliderItemWidth_web * currentIdx + "px)";
                    }, 300);
                }
            } else {
                box.forEach(element => {
                    element.addEventListener("touchend", () => {
                        element.children[0].classList.toggle("portfolio__card--flipped");
                        element.children[1].classList.toggle("portfolio__card--flipped");
                    })
                });
            }
        });
    }
}

function makeSliderDesktop() {
    for (var i = 0; i < 1; i++) {
        const cloneSlideNext = sliderContents[i].cloneNode(true);
        const cloneSlidePrev = sliderContents[sliderItem-i-1].cloneNode(true);
        slider.append(cloneSlideNext);
        slider.insertBefore(cloneSlidePrev, slider.firstElementChild);
    }
}