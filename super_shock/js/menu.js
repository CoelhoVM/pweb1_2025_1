
function mostraMenu(){
    const menuLateral = document.getElementById('menu-lateral');
    menuLateral.classList.toggle('ativa');

    const iconMenu = document.getElementById('img-menu');

    if(iconMenu.src.endsWith("img/icon-hamburger-menu.png")){
        iconMenu.src = "img/icon-close-menu.png";
    } else {
        iconMenu.src = "img/icon-hamburger-menu.png";
    }
}