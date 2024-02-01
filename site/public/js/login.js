function login() {
    const email = (document.getElementById('input_email')).value;
    const senha = document.getElementById('input_senha').value;

    if (email == '' || senha == '') {
        mostrarMensagem('Os campos não podem estar vazios.');
    } else {
        fetch('http://localhost/NerdClub/site/src/models/usuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                email: email,
                senha: senha,
                requisicao: 'login'
            })
        }).then(function (res) {

            res.json().then(
                json => {
                    if (json.mensagem != undefined) {
                        mostrarMensagem(json.mensagem);
                    } else {
                        sessionStorage.IDUSUARIO = json.idUsuario;
                        sessionStorage.NOMEUSUARIO = json.nome;
                    }
                }
            )

        })
    }
}