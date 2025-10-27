<style>
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: block;
}

.form-control {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 0.375rem;
    font-size: 1rem;
}

.form-control:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 0.375rem;
    cursor: pointer;
    font-size: 1rem;
    transition: all 0.3s;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.loading {
    opacity: 0.6;
    pointer-events: none;
}
</style>


<section>
    <p class="mb-5 small">Sessão destinada para <strong>Plataformas digitais</strong></p>

    <!-- Content -->
    <div class="card">
        <div class="card-body">
            <form id="plataformasForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="youtube" class="form-label">YouTube</label>
                            <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Link do YouTube">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="spotify" class="form-label">Spotify</label>
                            <input type="text" class="form-control" id="spotify" name="spotify" placeholder="Link do Spotify">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-save"></i> Salvar Plataformas
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>


<script>
$(document).ready(function() {
    // Carrega os dados ao inicializar
    loadPlataformas();

    // Submissão do formulário
    $('#plataformasForm').on('submit', function(e) {
        e.preventDefault();
        updatePlataformas();
    });

    function loadPlataformas() {
        $.ajax({
            url: '<?= $base_url; ?>modulos-admin/contents/plataformas/php/get.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Response:', response); // Debug
                if (response.success) {
                    $('#youtube').val(response.data.youtube || '');
                    $('#spotify').val(response.data.spotify || '');
                } else {
                    alert(response.message || 'Erro ao carregar dados');
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', xhr.responseText); // Debug
                alert('Erro na comunicação com o servidor: ' + error);
            }
        });
    }

    function updatePlataformas() {
        const form = $('#plataformasForm');
        const submitBtn = $('#submitBtn');
        
        // Adiciona loading
        form.addClass('loading');
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Salvando...');

        $.ajax({
            url: '<?= $base_url; ?>modulos-admin/contents/plataformas/php/update.php',
            type: 'POST',
            data: form.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                } else {
                    alert(response.message || 'Erro ao salvar dados');
                }
            },
            error: function() {
                alert('Erro na comunicação com o servidor');
            },
            complete: function() {
                // Remove loading
                form.removeClass('loading');
                submitBtn.prop('disabled', false).html('<i class="fas fa-save"></i> Salvar Plataformas');
            }
        });
    }
});
</script>