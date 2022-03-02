const content = "\"Hello, Wolrd!\""
const text = document.querySelector(".welcome__hello")
let index = 0;

function typing(){
    if(index < content.length){
        text.textContent += content[index++]
    }
}

setInterval(typing, 100);