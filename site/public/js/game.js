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
        // alert(`Acabou! o vencedor(a) é: ${personagens[0].nome}`);
        telaFinal();
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

function telaFinal() {
    colocacaoFinal.push(personagens[0]);

    const telaFinal_html = document.getElementById('section_telaFinal');

    let conteudo = '';
    let estilo = null;
    let cor = null;

    for (let i = colocacaoFinal.length - 1; i >= 0; i--) {

        // const estilo = (i == colocacaoFinal.length - 1 ? 'style="width: 90%; height: 300px;"' : i == colocacaoFinal.length - 2 ? 'style="width: 87%; height: 280px;"' : i == colocacaoFinal.length - 3 ? 'style="width: 83%; height: 260px;"' : null);

        // const cor = (i == colocacaoFinal.length - 1 ? 'style="background-color: #FFD700;"' : i == colocacaoFinal.length - 2 ? 'style="background-color: #8E99A2;"' : i == colocacaoFinal.length - 3 ? 'style="background-color: #CD7F32;"' : null);

        if (i == colocacaoFinal.length - 1) {
            estilo = 'style="width: 90%; height: 300px;"';
            cor = 'style="background-color: #FFD700;"';
        } else if (i == colocacaoFinal.length - 2) {
            estilo = 'style="width: 87%; height: 280px;"';
            cor = 'style="background-color: #8E99A2;"';
        } else if (i == colocacaoFinal.length - 3) {
            estilo = 'style="width: 83%; height: 260px;"';
            cor = 'style="background-color: #CD7F32;"';
        } else {
            estilo = null;
            cor = null;
        }

        const personagem = colocacaoFinal[i];

        conteudo += `
        <div ${estilo} class="cardPersonagem" onclick="window.location.href = 'http://localhost/NerdClub/site/public/perfil.php?personagem=${personagem.idPersonagem}'">
                <div ${cor} class=" posicao"><h1>#${colocacaoFinal.length - i}</h1></div>
                <img style="height: 100%; width: auto; border: solid 4px ${personagem.cor}" src="${personagem.imgP}" alt="imagem de ${personagem.nome} ${personagem.snome}"> 
            <div class="infoPersonagem">
                <h1 style="width: 70%; height: 50%; color:${personagem.cor}; display: flex; align-items: center; justify-content: center; font-size: 250%" class="nomePerso">${(personagem.nome).toUpperCase()} ${(personagem.snome).toUpperCase()}</h1>
                <img style="height: auto; width: 70%;" class="imgObra" src="${personagem.imgO}" alt="imagem da obra">
            </div>                   
        </div>
        `;
    }

    const cardRanking = document.getElementById('cardRanking');
    cardRanking.innerHTML = conteudo;
    telaFinal_html.style.width = '100%';
    telaFinal_html.style.height = '100vh';
    telaFinal_html.style.position = 'absolute';
    telaFinal_html.style.opacity = '1';

    console.log(personagens);
    cadastrarVoto(personagens[0].idPersonagem);
}

function cadastrarVoto(idPersonagem) {

    let cookies = document.cookie;
    cookies = cookies.split('; ');
    const cookies_json = {};
    cookies.forEach(cookie => {
        let array = cookie.split('=');
        console.log(array);
        cookies_json[`${array[0]}`] = array[1];
    });
    console.log(cookies_json);
    console.log(cookies_json['id'])

    fetch('http://localhost/NerdClub/site/src/models/voto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            idPerso: idPersonagem,
            idUser: cookies_json['id'],
            requisicao: 'inserir-novo-voto'
        })
    }).then(res => res.json())
        .then(json => {
            console.log(json)
        })
}