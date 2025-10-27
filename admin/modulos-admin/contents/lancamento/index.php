<p class="mb-5 small">Nesta sessão você pode atualizar o <strong>Lançamento SINGLE</strong> do seu site!</p>

<!-- PROJETOS -->
<section>
    <form action="<?= $base_url; ?>modulos-admin/contents/lancamento/php/add-lancamento.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" value="<?= $lancamento[0]['titulo']; ?>" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="youtube" class="form-label">Link do YouTube</label>
            <input type="text" class="form-control" value="<?= $lancamento[0]['youtube']; ?>" id="youtube" name="youtube">
        </div>
        <div class="mb-3">
            <label for="spotify" class="form-label">Link do Spotify</label>
            <input type="text" class="form-control" value="<?= $lancamento[0]['spotify']; ?>" id="spotify" name="spotify">
        </div>
        <div class="mb-3">
            <label for="deezer" class="form-label">Link do Deezer</label>
            <input type="text" class="form-control" value="<?= $lancamento[0]['deezer']; ?>" id="deezer" name="deezer">
        </div>
        <div class="mb-3">
            <label for="amazon" class="form-label">Link do Amazon</label>
            <input type="text" class="form-control" value="<?= $lancamento[0]['amazon']; ?>" id="amazon" name="amazon">
        </div>
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">
            <div style="width: 60px; height: 65px;" class="mt-2">
                <img class="w-100 h-100" style="object-fit: cover;" src='<?= $base_url ?>assets/imagens/arquivos/lancamento/<?= $lancamento[0]['imagem']; ?>'>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Lançamento</button>
    </form>
</section>