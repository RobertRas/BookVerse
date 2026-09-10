<?php
    require_once __DIR__ . "/template/_cabecalho.php"
?>


    <main class="main-detalhe">
        <form action="" method="post">
            <img src="imagens/logo_senac.png" alt="" class="logo">
            <!-- <div class="form-items">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome">
            </div> -->
            <div class="form-items">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-items">
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha">
                <img id="olhos" src="../BookVerse/imagens/fechado.png" alt="">
            </div>
            <!-- <div class="form-items">
                <label for="foto">foto de perfil: </label>
                <input type="file" name="foto" id="foto">
            </div> -->
            <button type="submit">login</button>
        </form>
    </main>
<?php
    require_once __DIR__ . "/template/_rodape.php"
?>

    <script src="../BookVerse/js/engine.js"></script>
    
</body>
</html>