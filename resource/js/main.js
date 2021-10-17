// Funções utilizadas no alerta e no modal
function confirmacaoModal($id)
{
    var modal = document.querySelector(".modal")
    var botao = document.querySelector("#botaoExclusao")
    modal.classList.add('active')
    botao.setAttribute("href", "index.php?id=" + $id)
}

function fechaAlerta() 
{
    var alerta = document.querySelector(".alerta");
    alerta.style.display = "none";
    console.log(alerta);
}

// Macara do campo Codigo
$(document).ready(function()
{
    $('.codigo').mask('S999999SSS');
});
