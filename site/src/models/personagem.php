<?php
// // Recebe a variável enviada via POST
// $dados = json_decode(file_get_contents("php://input"), true);

// if (isset($dados['id'])) {

//     $id = $dados['id'];
//     $req = $dados['requisicao'];

//     if ($dados['requisicao'] == "buscar-personagem-por-id") {
//         $resposta = "Recebi o id: $id";

//         session_start();
//         $_SESSION['idPersonagem'] = $id;
//         echo json_encode(array("mensagem" => $resposta));
//     }
// };

function gerarSelectCatPersonagem()
{
    require __DIR__ . "/../database/config.php";
    if ($connected) {
        $query = "SELECT nome, idCategoria FROM categoria;";

        $select = $conn->query($query);

        if ($select->rowCount() > 0) {
            echo "<option value=\"geral\">Geral</option>";
            while ($linha = $select->fetch()) {
                $categoria = $linha['nome'];
                $idCat = $linha['idCategoria'];
                echo "<option value=\"$idCat\">$categoria</option>";
            }
        }
    }
}

function buscarDadosPersonagem($id)
{
    require __DIR__ . "/../database/config.php";
    if ($connected) {
        $query = "SELECT 
        idCategoria,
        categoria.nome 
        FROM categoria 
        JOIN personagem 
        ON fkCategoria = idCategoria 
        WHERE idPersonagem = $id;";

        $select = $conn->query($query);

        if ($select->rowCount() > 0) {
            $linha = $select->fetch();
            $idCat = $linha['idCategoria'];
            $nomeCat = $linha['nome'];

            $query = "SELECT 
           p.nome nome,
           p.sobrenome snome,
           (SELECT count(fkPersonagem) FROM voto WHERE fkPersonagem = $id) votosTotaisDoPersonagem,
           (SELECT count(fkPersonagem) FROM voto) votosTotais,
           (SELECT count(fkPersonagem) FROM voto JOIN personagem ON fkPersonagem = idPersonagem WHERE fkCategoria = $idCat) votosCategoria,
           (SELECT count(fkPersonagem) FROM voto JOIN personagem ON fkPersonagem = idPersonagem WHERE fkCategoria = $idCat AND fkPersonagem = $id) votosTotaisDoPersonagemNaCategoria,
           p.idade idade,
           p.genero genero,
           p.cor cor,
           p.descricao descricao,
           p.imagem imagemPerso,
           o.imagem imagemObra
           FROM personagem p
           JOIN obra o
           ON p.fkObra = o.idObra WHERE p.idPersonagem = $id;
           ";

            $select = $conn->query($query);

            if ($select->rowCount() > 0) {
                $linha = $select->fetch();
                $nome = strtoupper($linha['nome']);
                $snome = strtoupper($linha['snome']);
                $votosTotaisDoPersonagem = $linha['votosTotaisDoPersonagem'];
                $votosTotais = $linha['votosTotais'];
                $votosCategoria = $linha['votosCategoria'];
                $votosTotaisDoPersonagemNaCategoria = $linha['votosTotaisDoPersonagemNaCategoria'];
                $idade = $linha['idade'];
                $genero = $linha['genero'];
                $cor = $linha['cor'];
                $imagemP = $linha['imagemPerso'];
                $imagemO = $linha['imagemObra'];
                $descricao = $linha['descricao'];

                //calculos

                $prctVotosTotais = round($votosTotaisDoPersonagem * 100 / $votosTotais, 1);
                $prctVotosCat = round($votosTotaisDoPersonagemNaCategoria * 100 / $votosCategoria, 1);

                $genero = ($genero == 'm' ? './assets/img/masculino.png' : './assets/img/feminino.png');

                echo "
            <div class=\"container\">
            <div class=\"cabecalho\">
                <div class=\"ft_nome\">
                    <img class=\"ft_personagem\" src=\"$imagemP\" alt=\"imagem de $nome $snome\">
                    <h1 class=\"nomepersonagem\" style=\"color: $cor\">$nome $snome</h1>
                </div>
                <div class=\"iconObra\">
                    <img style=\"height: 80%; width:auto; border-left: solid 4px #fff; padding-left: 10%\" src=\"$imagemO\" alt=\"\">
                </div>
            </div>
            <div class=\"conteudo\">
                <div style=\"border: solid 2px $cor\" class=\"dados\">
                    <h2>Idade: $idade</h2>
                    <h2>Gênero: <img style=\"height: 100%; width: auto;\" src=\"$genero\" alt=\"\"></h2>
                    <div class=\"analytics\">
                        <div class=\"prct\">
                            <h2>Vitórias na categoria \"$nomeCat\"</h2>
                            <div class=\"barraVazia\">
                                <div class=\"barraPreenc\" style=\"background-color: $cor; width: $prctVotosCat%;\">
                                    <h3 style=\"color: #fff; margin-left: 10px\">$prctVotosCat%</h3>
                                </div>
                            </div>
                        </div>
                        <div class=\"prct\">
                            <h2>Vitórias no geral</h2>
                            <div class=\"barraVazia\">
                                <div class=\"barraPreenc\" style=\"background-color: lime; width: $prctVotosTotais%;\">
                                    <h3 style=\"color: #fff; margin-left: 10px\">$prctVotosTotais%</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"desc\">
                    <h1>DESCRIÇÃO</h1>
                    <h2>$descricao</h2>
                </div>
            </div>
        </div>";
            }
        }
    }
}

function criarVetorParaOJogo($gObra, $catPersonagem, $gPersonagem, $qtdRodadas)
{
    require __DIR__ . "/../database/config.php";

    if ($connected) {
        $query = "SELECT 
        o.imagem imagemObra,
        p.nome nome,
        p.sobrenome snome,
        p.idPersonagem idPersonagem,
        p.cor cor,
        p.imagem imagemPerso
        FROM personagem p
        JOIN obra o
        ON p.fkObra = o.idObra
        ";

        $wheres = array();
        $wheres["genero obra"] = $gObra;
        $wheres["categoria personagem"] = $catPersonagem;
        $wheres["genero personagem"] = $gPersonagem;

        $primeiro = true;
        foreach ($wheres as $key => $value) {
            if ($value != "geral") {
                if ($primeiro == true) {
                    $primeiro = false;
                    $query = $query . "WHERE";
                } else {
                    $query = $query . "AND";
                }

                // $query = ($key == "genero obra" ? $query . " o.generoObra = '$value' " : $key == "categoria personagem" ? $query . " p.fkCategoria = $value " : $query . " p.genero ='$value'");
                if ($key == "genero obra") {
                    $query = $query . " o.generoObra = '$value' ";
                } else if ($key == "categoria personagem") {
                    $query = $query . " p.fkCategoria = $value ";
                } else {
                    $query = $query . " p.genero ='$value' ";
                }
            }
        }

        $query = $query . "ORDER BY RAND() ";

        if ($qtdRodadas != "max") {
            $limit = "LIMIT " . $qtdRodadas + 1;
            $query = $query . $limit;
        }

        $query = $query . ';';

        // DESCOMENTE PARA MOSTRAR A QUERY NA PAGINA
        // echo $query;

        $select = $conn->query($query);

        if ($select->rowCount() > 0) {
            $array_js = "[";
            $i = 1;
            while ($linha = $select->fetch()) {

                $imgO = $linha['imagemObra'];
                $nome = $linha['nome'];
                $snome = $linha['snome'];
                $idPersonagem = $linha['idPersonagem'];
                $cor = $linha['cor'];
                $imgP = $linha['imagemPerso'];
                if ($i < $select->rowCount()) {
                    $array_js = $array_js . "{
                        idPersonagem: $idPersonagem,
                        nome: '$nome',
                        snome: '$snome',
                        cor: '$cor',
                        imgP: '$imgP',
                        imgO: '$imgO'
                    },";
                } else {
                    $array_js = $array_js . "{
                        idPersonagem: $idPersonagem,
                        nome: '$nome',
                        snome: '$snome',
                        cor: '$cor',
                        imgP: '$imgP',
                        imgO: '$imgO'
                    } ]";
                }
                $i += 1;
            }

            //Depois tenho q fazer isso via fetch
            echo "<script>
                const v = $array_js;
                receberVetor(v);
            </script>";
        }
    }
}
