function removerBotoesHeader(){
    const botoes = document.getElementsByClassName('botoes');
    botoes[0].innerHTML = '';
}

function mostrarMensagem(mensagem){
    const div_mssg = document.getElementById('div_mssg');

    div_mssg.style.opacity = 1;
    div_mssg.innerHTML = `<h2 style="color: red;">${mensagem}</h2>`;
    console.log('mensagem' + mensagem);

    setTimeout(()=>{
        div_mssg.style.opacity = 0;
    }, 10000)

}