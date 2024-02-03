// Selecione todos os elementos com a classe .excluir
const linkExcluir = document.querySelectorAll(".excluir");

// Quantidade de elementos com a classe .excluir
let quantidade = linkExcluir.length;

/* Loop/Laço executando script de acordo 
com a quantidade de links excluir capturados*/
for( let i = 0; i < quantidade; i++ ){
    linkExcluir[i].addEventListener("click", function(event){
        // Cancela/anula o recarregamento da página
        event.preventDefault();

        // Capturando o endereço do link de excluir
        var enderecoDoLink = this.href;
        
        // Caixa de diálogo para capturar a resposta do usuário
        // (OK/SIM -> true   -  Cancelar/NÃO -> false)
        var resposta = confirm("Tem certeza que deseja excluir?"); // bool

        /* Se a resposta for true */
        if( resposta ) {
            // Vá para a página de exclusão
            location.href = enderecoDoLink;
            // console.log("apagaria");
        } else {
            // Senão, continue onde está (não faça nada)
            // console.log("não apagaria");
            return false;
        } 
    });
};