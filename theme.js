var dark = () => {
    document.getElementById('divtheme').innerHTML = `<button id="theme" onclick='light()' class='button-dark ripple'></button>`
    document.cookie = "theme=dark"
    document.getElementById('container').setAttribute("class", "dark-container")
    document.body.setAttribute("style", "background-color:#222")
    document.getElementById('textarea').setAttribute("class", "textarea-dark")
    document.getElementById('button').setAttribute("class", "button-dark2")
    document.getElementById('anotherbutton').setAttribute("class", "button-dark2")
    document.getElementById('end').setAttribute("class", "button-dark2")
}
var light = () => {
    document.getElementById('divtheme').innerHTML = `<button id="theme" onclick='dark()' class='button-light ripple'></button>`
    document.cookie = "theme=light"
    document.getElementById('container').setAttribute("class", "container")
    document.body.setAttribute("style", "background-color:#fff")
    document.getElementById('textarea').setAttribute("class", "")
    document.getElementById('button').setAttribute("class", "")
    document.getElementById('anotherbutton').setAttribute("class", "")
    document.getElementById('end').setAttribute("class", "")
}
if(document.cookie == 'theme=dark'){
    dark();
}else{
    light();
}