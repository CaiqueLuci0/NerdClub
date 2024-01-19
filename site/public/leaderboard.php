
    <section id="ranking">
        <div class="titulo">
            <h1>OS MAIS VOTADOS</h1>
            <img height="110px" src="assets/img/fogo.png" alt="emoji de fogo">
        </div>
        <div class="tabela">
            <?php 
                include("../src/models/voto.php");
                $dbpath = "../src/database/config.php";
                criartabela($dbpath);
            ?>
        </div>
    </section>
