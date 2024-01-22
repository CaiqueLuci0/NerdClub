function buscarPersonagemPorId(id){
         
    console.log(id.id)
    // Configuração do objeto de opções para a requisição fetch
        var options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
             id: id.id,
             requisicao: "buscar-personagem-por-id"
            }),
    };
    
    // Realiza a requisição fetch para o arquivo PHP
    fetch('http://localhost/NerdClub/site/src/models/personagem.php', options)
        .then(response => response.json())
        .then(data => {
            console.log(data.mensagem); // Exibe a resposta do PHP no console
            setTimeout(2000,  window.location.href = "http://localhost/NerdClub/site/public/perfil.php");
        })
        .catch(error => console.error('Erro:', error));

        
}


