
    <section id="ranking">
        <div class="titulo">
            <h1>OS MAIS VOTADOS</h1>
            <img height="110px" src="assets/img/fogo.png" alt="emoji de fogo">
        </div>
        <div class="tabela">
            <?php 
                include("../src/database/voto.php");
                criartabela();
            ?>
        </div>
    </section>
