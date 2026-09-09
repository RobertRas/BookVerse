const senhaInput = document.getElementById("senha");
const alternaOlho = document.getElementById("olhos");
const btnMenu = document.getElementById("btn-menu");
const menu = document.getElementById("menu_global");


if(alternaOlho){
    alternaOlho.addEventListener("click", () => {
    if(senhaInput.type ==="password"){
        senhaInput.type="text";
        alternaOlho.src="../BookVerse/imagens/aberto.png";

    } else{
        senhaInput.type="password";
        alternaOlho.src="../BookVerse/imagens/fechado.png";

    }
})
}

if(btnMenu){
    btnMenu.addEventListener("click", ()=>{
    menu.classList.toggle("aparecer");
})
}
