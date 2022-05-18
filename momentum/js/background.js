const img = ["0", "1", "2"];
const chosenImg = img[Math.floor(Math.random() * img.length)];

const wrap = document.getElementById("wrap");

wrap.classList.add("background"+chosenImg);