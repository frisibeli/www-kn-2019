

document.addEventListener("DOMContentLoaded", main)

function main() {
    let textInputElement = document.querySelector("#text-input")
    let buttonElement = document.querySelector("#add-button")
    let listElement = document.querySelector("#list")

    // Добавете eventListener към buttonElement, който при кликване да изпълнява 
    // функцията addListItem
    buttonElement.addEventListener("click", addListItem)


    // Довършете фукнцията, така че изпълнението й да добавя нов li елемент към listElement
    // текстът на listElement да е стойността, въведена в textInputElement
    // новият li елемент трябва да има CSS клас "styled"
    function addListItem(event) {
        let inputValue = textInputElement.value

        let newListItem = document.createElement("li")
        newListItem.innerText = inputValue
        newListItem.setAttribute("class", "styled")

        listElement.appendChild(newListItem)
        console.log(newListItem)
    }

    // Добавете eventListener към textInputElement, който при натискане на копче от клавиатурата да изпълнява 
    // функцията onKeyPress
    textInputElement.addEventListener('keypress', addListItemOnEnter)

    // addListItemOnEnter създава нов li елемент, добавя го към listElement само ако потребителят е натиснал Enter
    function addListItemOnEnter(event) {
        if (event.key == "Enter") {
            let inputValue = textInputElement.value

            let newListItem = document.createElement("li")
            newListItem.innerText = inputValue
            newListItem.setAttribute("class", "styled")

            listElement.appendChild(newListItem)

            textInputElement.value = ""
        }
    }
}

