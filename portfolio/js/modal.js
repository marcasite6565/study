
const modal = document.querySelector(".modal");
const closebtn = document.querySelector(".modal__btn");
const ix = document.querySelector('.index');

modal.addEventListener("click", e => {
    const cTarget = e.target;
    if(cTarget.classList.contains("modal")) {
        modal.style.display = "none";
        ix.style.display = "block";
    };
});

closebtn.addEventListener("click", e =>{
    modal.style.display = "none";
    ix.style.display = "block";
});

window.addEventListener("keyup", e => {
    if(modal.style.display = "flex" && e.key === "Escape") {
        modal.style.display = "none";
        ix.style.display = "block";
    };
});