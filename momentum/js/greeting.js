const loginForm = document.querySelector("#login-form");
const loginInput = document.querySelector("#login-form input");
const greeting = document.querySelector("#greeting");
const todoBtn = document.querySelector("#todolist-Btn");
const weather = document.querySelector("#weather");

const HIDDEN_CLASSNAME = "hidden"
const USERNAME_KEY = "username"

function onLoginSubmit(event) {
    event.preventDefault();
    loginForm.classList.add(HIDDEN_CLASSNAME);
    const username = loginInput.value;
    localStorage.setItem(USERNAME_KEY, username);
    paintGretings(username);
}

function paintGretings(username) {
    greeting.innerText = `Hello, ${username}!`;
    greeting.classList.remove(HIDDEN_CLASSNAME);
    todoBtn.classList.remove(HIDDEN_CLASSNAME);
    weather.classList.remove(HIDDEN_CLASSNAME);
}

const savedUsername = localStorage.getItem(USERNAME_KEY);

if (savedUsername === null) {
    loginForm.classList.remove(HIDDEN_CLASSNAME);
    loginForm.addEventListener("submit", onLoginSubmit);
} else {
    paintGretings(savedUsername);
}