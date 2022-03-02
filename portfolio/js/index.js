const mql = window.matchMedia("screen and (max-width: 1279px)");
if (mql.matches) {
    const obtn = document.querySelector(".index__openBtn");
    const list = document.querySelector(".index__list");
    const listTxt = document.querySelectorAll(".index__text");

    obtn.addEventListener("click", e =>{
        if (!list.classList.contains('index__list--onHeight')){
            list.classList.toggle("index__list--onHeight");
            setTimeout(function () {list.classList.toggle("index__list--onWidth");}, 500)
        } else {
            list.classList.toggle("index__list--onWidth");
            setTimeout(function () {list.classList.toggle("index__list--onHeight");}, 500)}
    });

    window.addEventListener("scroll", () => {
        if (window.scrollY == 0) {
            list.style.backgroundColor = "rgba(0, 121, 217, 0.8)";
            list.style.borderRight = "solid 1px white";
        } else {
            list.style.backgroundColor = "rgba(0,0,0,0.8)";
            list.style.borderRight = "solid 1px #0079D9";
            /*listTxt.forEach(element =>{
                element.style.color = "black";
            })*/
        }
    });
}