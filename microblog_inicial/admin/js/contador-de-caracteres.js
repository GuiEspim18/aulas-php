const spanMaximo = document.querySelector("#maximo");
const textResumo = document.querySelector("#resumo");
let quantidadeAtual = textResumo.value.length;
spanMaximo.textContent = quantidadeAtual;
console.log(quantidadeAtual);

textResumo.addEventListener("input", function(){
    let quantidadeDigitada = textResumo.value.length;
    spanMaximo.textContent = quantidadeDigitada;

    if(quantidadeDigitada == 300 || quantidadeDigitada == 0){
      spanMaximo.classList.remove("badge-success");
      spanMaximo.classList.add("badge-danger");
    } else {
      spanMaximo.classList.remove("badge-danger");
      spanMaximo.classList.add("badge-success");
    }
});


