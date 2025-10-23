<style>
    #logo-header{
        width: 120px;
    }

    #menu-mobile{
        height: 0vh;
        display: none;
    }


    @media(min-width:1500px) {
        #logo-header{
            width: 110px;
        }
    }
    
    @media(max-width:992px) {
        #logo-header{
            width: 100px;
        }

        #menu-mobile{
            width: 100%;
            height: 0vh;
            display: block;
            overflow: hidden;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10 !important;
        }
    }
</style>


<!-- menu mobile -->
<div id="menu-mobile" class="fundos">
    <div class="text-center mt-4 mb-5">
        <img onclick="menu()" src='<?= $base_url ?>assets/imagens/site/close.png' style="width: 30px;">
    </div>

    <div class="text-center mb-5">
        <a href="<?= $base_url; ?>index.php"><img src='<?= $base_url ?>assets/imagens/site/logo-header.png' id="logo-header"></a>
    </div>

    <nav class="d-flex flex-column justify-content-center align-items-center">
        <a href="<?= $base_url; ?>index.php" class="<?= \Core\RoutesSite::isActive('index'); ?> mb-4 fs-1 font-bebas">INÍCIO</a>
        <a href="<?= $base_url; ?>#banda" class="<?= \Core\RoutesSite::isActive('#banda'); ?> mb-4 fs-1 font-bebas">A BANDA</a>
        <a href="<?= $base_url; ?>projetos-shows.php" class="<?= \Core\RoutesSite::isActive('projetos-shows'); ?> mb-4 fs-1 font-bebas">PROJETOS E SHOWS</a>
        <a href="<?= $base_url; ?>agenda.php" class="<?= \Core\RoutesSite::isActive('agenda'); ?> mb-4 fs-1 font-bebas">AGENDA</a>
        <a href="<?= $base_url; ?>galeria.php" class="<?= \Core\RoutesSite::isActive('galeria'); ?> mb-4 fs-1 font-bebas">GALERIA</a>
        <a href="<?= $base_url; ?>#contato" class="<?= \Core\RoutesSite::isActive('#contato'); ?> mb-4 fs-1 font-bebas">CONTATO</a>
        <a href="<?= $contatos['instagram']; ?>"><img src='<?= $base_url ?>assets/imagens/site/insta-header.png' style="width: 45px;"></a>
    </nav>
</div>


<section class="w-100 py-3 fundos">
    <div class="container mx-auto">
        <nav class="d-none d-lg-flex justify-content-between align-items-center">
            <div class="d-flex">
                <a href="<?= $base_url; ?>index.php" class="<?= \Core\RoutesSite::isActive('index'); ?> mx-4 fs-5 font-bebas">INÍCIO</a>
                <a href="<?= $base_url; ?>#banda" class="<?= \Core\RoutesSite::isActive('#banda'); ?> mx-4 fs-5 font-bebas">A BANDA</a>
                <a href="<?= $base_url; ?>projetos-shows.php" class="<?= \Core\RoutesSite::isActive('projetos-shows'); ?> mx-4 fs-5 font-bebas">PROJETOS E SHOWS</a>
            </div>

            <a href="<?= $base_url; ?>index.php"><img src='<?= $base_url ?>assets/imagens/site/logo-header.png' id="logo-header"></a>

            <div class="d-flex">
                <a href="<?= $base_url; ?>agenda.php" class="<?= \Core\RoutesSite::isActive('agenda'); ?> mx-4 fs-5 font-bebas">AGENDA</a>
                <a href="<?= $base_url; ?>galeria.php" class="<?= \Core\RoutesSite::isActive('galeria'); ?> mx-4 fs-5 font-bebas">GALERIA</a>
                <a href="<?= $base_url; ?>#contato" class="<?= \Core\RoutesSite::isActive('#contato'); ?> mx-4 fs-5 font-bebas">CONTATO</a>
                <a href="<?= $contatos['instagram']; ?>"><img src='<?= $base_url ?>assets/imagens/site/insta-header.png' style="width: 25px;"></a>
            </div>
        </nav>

        <nav class="px-3 d-flex d-lg-none justify-content-between align-items-center">
            <a href="<?= $base_url; ?>index.php"><img src='<?= $base_url ?>assets/imagens/site/logo-header.png' id="logo-header"></a>

            <button onclick="menu()" style="border: none; background-color: transparent;"><img src='<?= $base_url ?>assets/imagens/site/toggler.png' style="width: 35px;"></button>
        </nav>
    </div>
</section>

<script>
    var openMenu = false
    function menu(){
        if(openMenu){
            document.querySelector('#menu-mobile').style.cssText = 'height: 0vh; transition: height 0.3s ease-out;'
            openMenu = false
        } else {
            document.querySelector('#menu-mobile').style.cssText = 'height: 100vh; transition: height 0.3s ease-out;'
            openMenu = true
        }
    }
</script>