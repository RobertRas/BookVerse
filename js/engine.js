const senhaInput = document.getElementById("senha");
const alternaOlho = document.getElementById("olhos");

alternaOlho.addEventListener("click", () => {
    if(senhaInput.type ==="password"){
        senhaInput.type="text";
        alternaOlho.src="../BookVerse/imagens/aberto.png";

    } else{
        senhaInput.type="password";
        alternaOlho.src="../BookVerse/imagens/fechado.png";

    }
})