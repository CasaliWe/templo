<style>
    #wpp-float{
        position: fixed;
        bottom: 3%;
        right: 3%;
        z-index: 8;
        width: 60px;
        height: 60px;
        overflow: hidden;
    }

    #wpp-float img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
    }
</style>


<div id="wpp-float">
    <a href="https://wa.me/<?= preg_replace("/[^0-9]/", "", $contatos['wpp']); ?>" target="_blank"><img src='<?= $base_url ?>assets/imagens/site/wpp-float.png'></a>
</div>