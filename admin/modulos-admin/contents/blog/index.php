<style>
    .blog-thumb-preview {
        width: 60px;
        height: 60px;
        object-fit: cover;
    }
    
    .imagem-preview {
        max-width: 80px;
        max-height: 80px;
        object-fit: cover;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 2px;
        margin-top: 5px;
    }
    
    .tag-badge {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        padding: 2px 8px;
        border-radius: 15px;
        font-size: 0.8em;
        display: inline-block;
        margin-right: 5px;
    }
    
    .btn-adicionar {
        margin-bottom: 15px;
    }
    
    .accordion-button:not(.collapsed) {
        background-color: rgba(13, 110, 253, 0.1);
    }
    
    .accordion-blog {
        margin-bottom: 10px;
    }
    
    .blog-actions {
        display: flex;
        justify-content: flex-end;
        gap: 5px;
        margin-top: 10px;
    }
    
    .accordion-body {
        padding: 1rem;
    }
    
    @media (max-width: 768px) {
        .blog-actions {
            justify-content: center;
            margin-top: 15px;
        }
    }
    
    /* Customizações para o summernote */
    .note-editor.note-frame {
        border: 1px solid #ced4da;
    }
    
    .note-editor.note-frame .note-editing-area .note-editable {
        min-height: 300px;
    }
</style>

<section>
    <p class="mb-3 small">Sessão destinada para gerenciamento do <strong>Projetos e Shows</strong></p>

    <!-- conteúdo blog -->
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary btn-adicionar" data-bs-toggle="modal" data-bs-target="#modalAdicionarNoticia">
                    <i class="bi bi-plus-circle"></i> Adicionar Nova Notícia
                </button>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="accordionBlog">
                    <?php
                        // Buscar todas as notícias
                        use Models\Blog;
                        
                        $noticias = Blog::orderBy('created_at', 'desc')->get();
                        
                        if (count($noticias) > 0):
                            foreach ($noticias as $index => $noticia):
                    ?>
                    <!-- Acordeão para cada notícia -->
                    <div class="accordion-item mb-3 accordion-blog">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNoticia<?= $noticia->id ?>" aria-expanded="false" aria-controls="collapseNoticia<?= $noticia->id ?>">
                                <div class="d-flex align-items-center w-100">
                                    <div>
                                        <?php if ($noticia->capa): ?>
                                            <img src="<?= $base_url ?>assets/imagens/arquivos/blog/<?= $noticia->capa ?>" class="blog-thumb-preview me-3" alt="Capa">
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <strong class="d-block"><?= $noticia->titulo ?></strong>
                                        <small class="text-muted">Criado: <?= date('d/m/Y H:i', strtotime($noticia->created_at)) ?> | Atualizado: <?= date('d/m/Y H:i', strtotime($noticia->updated_at)) ?></small>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseNoticia<?= $noticia->id ?>" class="accordion-collapse collapse" data-bs-parent="#accordionBlog">
                            <div class="accordion-body">
                                <!-- Formulário para edição da notícia -->
                                <form action="<?= $base_url ?>modulos-admin/contents/blog/php/atualizar-noticia.php" method="post" enctype="multipart/form-data" class="mb-4">
                                    <input type="hidden" name="id" value="<?= $noticia->id ?>">
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-4 d-none">
                                            <label for="tag-noticia-<?= $noticia->id ?>" class="form-label">Tag</label>
                                            <input type="text" class="form-control" id="tag-noticia-<?= $noticia->id ?>" name="tag" value="<?= $noticia->tag ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <label for="titulo-noticia-<?= $noticia->id ?>" class="form-label">Título</label>
                                            <input type="text" class="form-control" id="titulo-noticia-<?= $noticia->id ?>" name="titulo" value="<?= $noticia->titulo ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="mini-descricao-noticia-<?= $noticia->id ?>" class="form-label">Mini Descrição (Máx. 15 palavras)</label>
                                            <textarea class="form-control" id="mini-descricao-noticia-<?= $noticia->id ?>" name="mini_descricao" rows="2" required><?= $noticia->mini_descricao ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="capa-noticia-<?= $noticia->id ?>" class="form-label">Capa</label>
                                            <input type="file" class="form-control mb-2" id="capa-noticia-<?= $noticia->id ?>" name="capa" accept="image/*">
                                            <?php if ($noticia->capa): ?>
                                                <img src="<?= $base_url ?>assets/imagens/arquivos/blog/<?= $noticia->capa ?>" class="imagem-preview" alt="Capa">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Data de Publicação</label>
                                            <div class="form-control bg-light">Criado: <?= date('d/m/Y H:i', strtotime($noticia->created_at)) ?></div>
                                            <div class="form-control bg-light mt-1">Atualizado: <?= date('d/m/Y H:i', strtotime($noticia->updated_at)) ?></div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="conteudo-noticia-<?= $noticia->id ?>" class="form-label">Conteúdo da Notícia</label>
                                            <?php 
                                            // Converter URLs relativas para absolutas para exibição correta
                                            $conteudo = $noticia->conteudo;
                                            $conteudo = str_replace('src="/', 'src="' . $base_url, $conteudo);
                                            ?>
                                            <textarea class="form-control summernote" id="conteudo-noticia-<?= $noticia->id ?>" name="conteudo" rows="10" required><?= $conteudo ?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="blog-actions">
                                        <a href="<?= $base_url ?>modulos-admin/contents/blog/php/deletar-noticia.php?id=<?= $noticia->id ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta notícia?')">
                                            <i class="bi bi-trash"></i> Excluir
                                        </a>
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-save"></i> Salvar Alterações
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php 
                            endforeach;
                        else:
                    ?>
                    <div class="alert alert-info">
                        Nenhuma notícia cadastrada. Utilize o botão "Adicionar Nova Notícia" para começar.
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Inicializar Summernote em todos os elementos com a classe .summernote
    $(document).ready(function() {
        // Configuração global do Summernote
        $.extend($.summernote.options, {
            placeholder: 'Digite o conteúdo da notícia aqui...',
            height: 300,
            lang: 'pt-BR',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana'],
            fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36'],
            callbacks: {
                onImageUpload: function(files) {
                    // Upload da imagem para o servidor
                    for(let i = 0; i < files.length; i++) {
                        uploadSummernoteImage(files[i], this);
                    }
                },
                // Fixar URLs para imagens no conteúdo
                onMediaDelete: function(target) {
                    // Se necessário, implemente a exclusão da imagem no servidor
                    console.log('Imagem removida:', target[0].src);
                }
            }
        });
        
        // Inicializar Summernote nos acordeões quando abertos (sem botões de imagem e vídeo)
        $('#accordionBlog').on('shown.bs.collapse', function (e) {
            let targetId = $(e.target).attr('id');
            $(`#${targetId} .summernote`).each(function() {
                if (!$(this).hasClass('note-editor')) {
                    $(this).summernote({
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'italic', 'clear']],
                            ['fontname', ['fontname']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link']], // Removido 'picture' e 'video'
                            ['view', ['fullscreen', 'codeview', 'help']]
                        ]
                    });
                }
            });
            
            // Adicionar validação para mini descrição em cada acordeão
            $(`#${targetId} textarea[name="mini_descricao"]`).on('input', function() {
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
        
        // Remover event listeners quando o acordeão é fechado
        $('#accordionBlog').on('hidden.bs.collapse', function (e) {
            let targetId = $(e.target).attr('id');
            $(`#${targetId} textarea[name="mini_descricao"]`).off('input');
        });
    });

    // Função para fazer upload de imagens do Summernote
    function uploadSummernoteImage(file, editor) {
        const formData = new FormData();
        formData.append('file', file);
        
        $.ajax({
            url: '<?= $base_url ?>modulos-admin/contents/blog/php/upload-summernote.php',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                try {
                    const response = typeof data === 'string' ? JSON.parse(data) : data;
                    if (response.url) {
                        // Inserir a imagem no editor
                        $(editor).summernote('insertImage', response.url);
                    } else {
                        throw new Error('URL da imagem não encontrada na resposta');
                    }
                } catch (e) {
                    console.error('Erro ao processar resposta:', e);
                    alert('Erro ao processar upload da imagem. Por favor, tente novamente.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Erro ao fazer upload da imagem:', errorThrown);
                alert('Erro ao fazer upload da imagem. Por favor, tente novamente.');
            }
        });
    }
</script>