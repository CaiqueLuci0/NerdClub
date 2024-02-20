<?php
$dados = json_decode(file_get_contents("php://input"), true);

if(isset($dados['requisicao'])){
    $requisicao = $dados['requisicao'];
    if($requisicao == 'inserir-novo-voto'){
        $idPerso = $dados['idPerso'];
        $idUser = $dados['idUser'];

        $mensagem = "O id do personagem é: $idPerso; o id do usuario é: $idUser";
        echo json_encode(array("mensagem" => $mensagem));
        inserirNovoVoto($idPerso, $idUser);
    }
}

function inserirNovoVoto($idPerso, $idUser){

}


function criartabela(){
    require __DIR__ . "/../database/config.php";
    if ($connected) {
        $query = "SELECT 
            count(v.fkPersonagem) qtdVotos,
            p.idPersonagem idpersonagem,
            p.nome nomeperso,
            p.sobrenome sobrenome,
            p.cor cor,
            p.imagem imgperso,
            o.nome nomeobra,
            o.imagem imgobra
            FROM
            obra o
            JOIN personagem p 
            ON p.fkObra = o.idObra
            JOIN voto v
            ON v.fkPersonagem = p.idPersonagem GROUP BY V.fkPersonagem ORDER BY qtdVotos DESC;";

        $select = $conn->query($query);

        if ($select->rowCount() > 0) {
            $i = 1;
            while ($linha = $select->fetch()) {

                $nomep = strtoupper($linha['nomeperso']);
                $sobrenome = strtoupper($linha['sobrenome']);
                $cor = $linha['cor'];
                $imgp = $linha['imgperso'];
                $nomeo = $linha['nomeobra'];
                $imgo = $linha['imgobra'];
                $idperso = $linha['idpersonagem'];

                if($i == 1){
                    $corColocacao = "style=\"background-color: #FFD700;\"";
                } else if($i == 2){
                    $corColocacao = "style=\"background-color: #C0C0C0;\"";
                } else if($i == 3){
                    $corColocacao = "style=\"background-color: #CD7F32;\"";
                } else{
                    $corColocacao = null;
                }
                
                echo "
                    <div class=\"linha\">
                        <div $corColocacao class=\"posicao\">
                            <h1>$i</h1>
                        </div>
                        <div id=\"$idperso\" onclick=\"setTimeout(window.location.href = 'http://localhost/NerdClub/site/public/perfil.php?personagem=$idperso', 100)\" class=\"nomeperso\"><img class=\"icoperso\" src=\"$imgp\" alt=\"imagem de $nomep $sobrenome \"> 
                            <h1 style=\"color: $cor;\">
                                $nomep $sobrenome
                            </h1>
                        </div>
                        <div class=\"nomeobra\"> 
                            <img class=\"icoobra\" src=\"$imgo\" alt=\"Ícone da obra $nomeo\">
                        </div>
                    </div>";
                
                $i+= 1;
            }
        }
    }
}
