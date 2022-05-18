const toDoForm = document.querySelector("#todo-form");
const toDoInput = toDoForm.querySelector("input");
const toDoList = document.querySelector("#todo-list");
const toDo = document.querySelector("#todo");
const toDoBtn = document.querySelector("#todolist-Btn");
const main = document.querySelector("#main");

const TODOS_KEY = "todos";

let toDos = [];

function saveToDos() {
    localStorage.setItem(TODOS_KEY, JSON.stringify(toDos));
}

function deleteToDo(event) {
    const li = event.target.parentElement;
    li.remove();
    toDos = toDos.filter(todo => todo.id !== parseInt(li.id));
    saveToDos();
}

function paintToDo(newTodo) {
    const li = document.createElement("li");
    li.id = newTodo.id;
    const span = document.createElement("span");
    span.innerText = newTodo.text;
    const button = document.createElement("button");
    button.innerText = "❌";
    button.addEventListener("click", deleteToDo);
    li.appendChild(span);
    li.appendChild(button);
    toDoList.appendChild(li);
}

function handleToDoSubmit(event) {
    event.preventDefault();
    const newTodo = toDoInput.value;
    toDoInput.value = "";
    const newTodoObj = {
        text:newTodo,
        id:Date.now(),
    }
    toDos.push(newTodoObj);
    paintToDo(newTodoObj);
    saveToDos();
}

function handleToDoBtn() {
    toDo.classList.toggle("todoOpen");
    main.classList.toggle("widthChange");
}

toDoForm.addEventListener("submit", handleToDoSubmit);
toDoBtn.addEventListener("click", handleToDoBtn);

const savedToDos = localStorage.getItem(TODOS_KEY);
if (savedToDos) {
    const parseToDos = JSON.parse(savedToDos);
    toDos = parseToDos;
    parseToDos.forEach(item => paintToDo(item));
}