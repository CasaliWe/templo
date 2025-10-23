<div class="modal fade" id="modalBannerInicial" tabindex="-1" aria-labelledby="modalBannerInicial" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Adicionar Banner Inicial</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="loading()" action="modulos-admin/contents/banners/php/adicionar-banner-inicial.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="mb-4">
                <label for="desktop-banner-inicial">Desktop* (1920x1080 - Máx 2mb) - Será convertido para WebP</label>
                <input type="file" id="desktop-banner-inicial" name="desktop" required class="form-control" accept="image/jpeg,image/jpg,image/png,image/webp">
            </div>

            <div class="mb-4">
                <label for="mobile-banner-inicial">Mobile* (400x700 - Máx 2mb) - Será convertido para WebP</label>
                <input type="file" id="mobile-banner-inicial" name="mobile" required class="form-control" accept="image/jpeg,image/jpg,image/png,image/webp">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Adicionar</button>
          </div>
      </form>
    </div>
  </div>
</div>