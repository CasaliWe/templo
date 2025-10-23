<style>
    .banner-slider-container {
        width: 100%;
        overflow: hidden;
    }
    
    .banner-swiper {
        width: 100%;
        height: auto;
    }
    
    .banner-swiper .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .banner-swiper .swiper-slide img {
        width: 100%;
        height: auto;
        display: block;
    }
    
    /* Customização das setas */
    .banner-next,
    .banner-prev {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        cursor: pointer;
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .banner-next {
        right: 20px;
    }
    
    .banner-prev {
        left: 20px;
    }
    
    .banner-next img,
    .banner-prev img {
        width: 50px;
        height: 50px;
    }
    
    /* Responsivo para mobile */
    @media (max-width: 768px) {
        .banner-next,
        .banner-prev {
            width: 60px;
            height: 60px;
        }
        
        .banner-next {
            right: 15px;
        }
        
        .banner-prev {
            left: 15px;
        }
        
        .banner-next img,
        .banner-prev img {
            width: 35px;
            height: 35px;
        }
    }
    
    /* Ocultar setas padrão do Swiper */
    .swiper-button-next::after,
    .swiper-button-prev::after {
        display: none;
    }
</style>

<section>
    <!-- Banner Slider -->
    <div class="banner-slider-container position-relative">
        <div class="swiper banner-swiper">
            <div class="swiper-wrapper">
                <?php if (count($bannersIniciais) > 0): ?>
                    <?php foreach ($bannersIniciais as $bannerInicial): ?>
                        <div class="swiper-slide">
                            <img src='<?= $base_url ?>admin/assets/imagens/arquivos/banners/<?= $bannerInicial['banner_desktop']; ?>' class="w-100 d-none d-lg-block">
                            <img src='<?= $base_url ?>admin/assets/imagens/arquivos/banners/<?= $bannerInicial['banner_mobile']; ?>' class="w-100 d-lg-none">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Banner padrão caso não haja banners cadastrados -->
                    <div class="swiper-slide">
                        <img src='<?= $base_url ?>assets/imagens/site/banner-inicial-desktop.png' class="w-100 d-none d-lg-block">
                        <img src='<?= $base_url ?>assets/imagens/site/banner-inicial-mobile.png' class="w-100 d-lg-none">
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Setas de navegação -->
            <?php if (count($bannersIniciais) > 1): ?>
                <div class="swiper-button-next banner-next">
                    <img src='<?= $base_url ?>assets/imagens/site/arrow-right.png' alt="Próximo">
                </div>
                <div class="swiper-button-prev banner-prev">
                    <img src='<?= $base_url ?>assets/imagens/site/arrow-left.png' alt="Anterior">
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bannerSwiper = new Swiper('.banner-swiper', {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.banner-next',
                    prevEl: '.banner-prev',
                },
                speed: 800,
                effect: 'slide',
                // Desabilitar indicadores
                pagination: false,
            });
        });
    </script>
</section>