<style>
    #title-ouca{
        width: 380px;
    }

    #container-ouca-capa{
        width: 40%;
        height: 450px; 
        margin: 0 auto !important;
    }
    #container-ouca-capa img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .container-links-ouca{
        width: 40%;
    }

    .border-0{
        border: 2px solid #DB0000 !important;
    }

    @media(min-width:1500px) {
        #title-ouca{
            width: 410px;
        }

        .container-links-ouca{
            width: 40%;
        }

        #container-ouca-capa{
            width: 40%;
            height: 450px; 
            margin: 0 auto !important;
        }
    }
    
    @media(max-width:992px) {
        #title-ouca{
            width: 280px;
        }

        .container-links-ouca{
            width: 90%;
        }

        #container-ouca-capa{
            width: 90%;
            height: auto; 
            margin: 0 auto !important;
        }
    }
</style>


<section class="bg-white py-5">
    <div class="container mx-auto py-3">
        <div class="text-center mb-4">
            <img src='<?= $base_url ?>assets/imagens/site/title-ouca.png' id="title-ouca">
        </div>

        <div id="container-ouca-capa">
            <img src='<?= $base_url ?>assets/imagens/site/exemplo-1.png'>
        </div>

        <h6 class="px-4 px-lg-0 font-inter-2 text-center mt-4 mb-2">JÁ DISPONÍVEL EM TODAS AS PLATAFORMAS</h6>
        
        <div class="border-0 py-3 mx-auto px-5 container-links-ouca d-flex align-items-center justify-content-center">
            <a href="#" class="mx-3"><img style="width: 30px;" src='<?= $base_url ?>assets/imagens/site/ico-youtube.png'></a>
            <a href="#" class="mx-3"><img style="width: 30px;" src='<?= $base_url ?>assets/imagens/site/ico-spotify.png'></a>
            <a href="#" class="mx-3"><img style="width: 30px;" src='<?= $base_url ?>assets/imagens/site/ico-1.png'></a>
            <a href="#" class="mx-3"><img style="width: 30px;" src='<?= $base_url ?>assets/imagens/site/ico-2.png'></a>
        </div>
    </div>
</section>


<script>

</script>