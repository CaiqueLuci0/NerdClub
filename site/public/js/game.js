function receberVetor(vetor) {
    personagens = vetor;
    console.log(personagens);
    montarRound();
}

let rodada = 0;
const personagensUsados = [];
const colocacaoFinal = [];

function montarRound() {

    if (personagens.length == 1) {
        alert(`Acabou! o vencedor(a) é: ${personagens[0].nome}`)
    } else {

        const div_principal = document.getElementById('div_info');
        rodada += 1;
        div_principal.innerHTML = `
        <div class="roundCounter">
            <h1>ROUND ${rodada}</h1>
        </div>
        <div class="votacao" id="div_votacao"></div>`;


        let resultado = '';

        for (let personagensNaTela = 0; personagensNaTela < 2; personagensNaTela++) {

            const index = parseInt(Math.random() * personagens.length);
            const personagem = personagens[index];

            personagens.splice(index, 1);
            personagensUsados.push(personagem);

            if (personagensNaTela == 1) {
                resultado += `
                <div class="vs">
                    <img src="./assets/img/vs.png">
                </div>
                            `;
            }

            resultado += `
            <div class="personagem">
                <div class="containerPerso">
                    <h1 style="background-color: ${personagem.cor};" class="nmPerso">${(personagem.nome).toUpperCase()} ${(personagem.snome).toUpperCase()}</h1>
                    <img style="border: solid 10px ${personagem.cor}; border-top: none" class="imgPerso" src="${personagem.imgP}" alt="">
                    <img style="border: solid 5px ${personagem.cor};" class="logoObra" src="${personagem.imgO}" alt="">
                </div>
            </div>
            `;
        }

        const div_votacao = document.getElementById('div_votacao');
        div_votacao.innerHTML = resultado;

        const personagens_html = document.getElementsByClassName('personagem');

        personagens_html[0].onclick = function () { eliminarPersonagem(1, 0) };
        personagens_html[1].onclick = function () { eliminarPersonagem(0, 1) };
    }
}

function eliminarPersonagem(eliminado, selecionado) {
    colocacaoFinal.push(personagensUsados[eliminado]);
    personagens.push(personagensUsados[selecionado]);
    personagensUsados.splice(0, personagensUsados.length);
    // console.log(personagens);
    montarRound();
}