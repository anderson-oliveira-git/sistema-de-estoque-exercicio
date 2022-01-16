// =============================== //
// | Autor   : Anderson Oliveira | //
// | Data    : 26/11/2021        | //
// =============================== //

let data_validade = document.querySelector(".validade"); 
let btn_atualizar = document.querySelector(".btn_atualizar");
let btn_editar    = document.querySelector(".editar");

// Criando a mascara para o campo data de validade //
data_validade.addEventListener('keyup', function() {

    // Se o tamanho da string for 2 ou 5 adiciona uma / //
    if (data_validade.value.length === 2 || data_validade.value.length === 5) {
        data_validade.value += "/";  
    }

});

btn_editar.addEventListener('click', function() {
    btn_atualizar.setAttribute("desabled", "enabled");
});