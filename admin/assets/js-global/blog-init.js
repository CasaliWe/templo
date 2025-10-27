// Inicializa o Summernote no modal de adicionar notícia
$(document).ready(function() {
    // Forçar inicialização do Summernote no modal
    setTimeout(function() {
        if ($('#conteudo-noticia').length && !$('#conteudo-noticia').next('.note-editor').length) {
            $('#conteudo-noticia').summernote({
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
                    }
                }
            });
        }
    }, 500);
});

// Função para fazer upload de imagens do Summernote
function uploadSummernoteImage(file, editor) {
    const formData = new FormData();
    formData.append('file', file);
    
    // Obter a URL base do site
    let baseUrl = '';
    if (typeof BASE_URL !== 'undefined') {
        baseUrl = BASE_URL;
    } else {
        // Tentar obter a URL base da metatag se a variável global não estiver disponível
        const metaUrl = document.querySelector('meta[property="og:url"]');
        if (metaUrl) {
            baseUrl = metaUrl.getAttribute('content');
        } else {
            // Fallback para o host atual
            baseUrl = window.location.protocol + '//' + window.location.host + '/';
        }
    }
    
    $.ajax({
        url: baseUrl + 'modulos-admin/contents/blog/php/upload-summernote.php',
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