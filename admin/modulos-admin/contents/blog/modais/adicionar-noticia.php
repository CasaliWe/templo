<?php
// Modal para adicionar uma nova notícia ao blog
?>
<div class="modal fade" id="modalAdicionarNoticia" tabindex="-1" aria-labelledby="modalAdicionarNoticiaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalAdicionarNoticiaLabel">Adicionar Nova Notícia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="loading()" action="<?= $base_url ?>modulos-admin/contents/blog/php/adicionar-noticia.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="mb-3 d-none">
                <label for="tag-noticia" class="form-label">Tag*</label>
                <input type="text" class="form-control" id="tag-noticia" name="tag">
                <small class="text-muted">Ex: Agricultura, Tecnologia, Novidade, etc.</small>
            </div>
            
            <div class="mb-3">
                <label for="titulo-noticia" class="form-label">Título*</label>
                <input type="text" class="form-control" id="titulo-noticia" name="titulo" required>
            </div>
            
            <div class="mb-3">
                <label for="mini-descricao-noticia" class="form-label">Mini Descrição* (Máx. 15 palavras)</label>
                <textarea class="form-control" id="mini-descricao-noticia" name="mini_descricao" rows="2" required></textarea>
                <small class="text-muted">Uma breve descrição com até 15 palavras.</small>
            </div>
            
            <div class="mb-3">
                <label for="capa-noticia" class="form-label">Imagem de Capa* (PNG ou JPG recomendado)</label>
                <input type="file" class="form-control" id="capa-noticia" name="capa" accept="image/*" required>
            </div>
            
            <div class="mb-3">
                <label for="conteudo-noticia" class="form-label">Conteúdo da Notícia*</label>
                <textarea class="form-control summernote" id="conteudo-noticia" name="conteudo" rows="10" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
// Validação para mini descrição (máximo 15 palavras)
$(document).ready(function() {
    // Evento para validar mini descrição quando o modal for aberto
    $('#modalAdicionarNoticia').on('shown.bs.modal', function () {
        $('#mini-descricao-noticia').on('input', function() {
            const textoDigitado = $(this).val();
            const palavras = textoDigitado.trim().split(/\s+/);
            const numPalavras = palavras.length;
            
            if (numPalavras > 15) {
                const textoLimitado = palavras.slice(0, 15).join(' ');
                $(this).val(textoLimitado);
                alert('A mini descrição deve ter no máximo 15 palavras.');
            }
        });
    });

    // Remover event listeners quando o modal for fechado
    $('#modalAdicionarNoticia').on('hidden.bs.modal', function () {
        $('#mini-descricao-noticia').off('input');
        if ($('#conteudo-noticia').next('.note-editor').length) {
            $('#conteudo-noticia').summernote('destroy');
        }
    });
});
</script>