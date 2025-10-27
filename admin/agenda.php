<?php
    require 'config/config.php';

   //verifica auth;
   include_once './helpers/verifica-auth.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- HEADER -->
    <?php include_once 'modulos-admin/header/index.php'; ?>
    <!-- HEADER -->

</head>
<body>

    <!-- LOADING -->
    <?php include_once 'modulos-admin/loading/index.php'; ?>
    <!-- LOADING -->

    <!-- NAVEGAÇÃO -->
    <?php include_once 'modulos-admin/navegacao/index.php'; ?>
    <!-- NAVEGAÇÃO -->

    <!-- CONTENT -->
    <main id="content-pagina">
        <h5 id="titulo-content-pagina" class="fw-semibold"><?= \Core\RoutesAdmin::getPageTitle(); ?></h5>

        <!-- módulo content página -->
        <?php include_once 'modulos-admin/contents/agenda/index.php';?>
        <!-- módulo content página -->
    </main>
    <!-- CONTENT -->

    <!-- MODAL AVISOS -->
     <?php include_once "modulos-admin/modal-aviso/index.php"; ?>
    <!-- MODAL AVISOS -->

    <!-- MODAL AGENDA -->
    <div class="modal fade" id="agendaModal" tabindex="-1" aria-labelledby="agendaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agendaModalLabel">Nova Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="agendaForm">
                    <div class="modal-body">
                        <input type="hidden" id="agendaId" name="id" value="">
                        <input type="hidden" id="action" name="action" value="create">
                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="titulo" class="form-label">Título *</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="data" class="form-label">Data *</label>
                                <input type="date" class="form-control" id="data" name="data">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="hora" class="form-label">Hora</label>
                                <input type="text" class="form-control" id="hora" name="hora" placeholder="Ex: 19:00 às 22:00">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="local_1" class="form-label">Local *</label>
                                <input type="text" class="form-control" id="local_1" name="local_1" placeholder="Ex: Parque Linear Av. Brasil">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="local_2" class="form-label">Detalhes do Local</label>
                                <input type="text" class="form-control" id="local_2" name="local_2" placeholder="Ex: Canteiro 10 Boqueirão">
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="programacao" class="form-label">Programação</label>
                                <textarea class="form-control" id="programacao" name="programacao" rows="5" placeholder="Digite os itens da programação separados por ; (ponto e vírgula)&#10;Ex: Abertura;Apresentação da banda;Intervalo;Show principal;Encerramento"></textarea>
                                <div class="form-text mb-2">
                                    <i class="fas fa-info-circle"></i> Use <strong>;</strong> (ponto e vírgula) para separar os itens da programação. Cada item aparecerá em uma linha separada.
                                </div>
                                <div id="preview-programacao" style="display: none;">
                                    <strong>Preview:</strong>
                                    <div id="preview-content" class="mt-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
                        <button type="button" class="btn btn-danger" id="btnDeletar" onclick="confirmarDelete()" style="display: none;">
                            <i class="fas fa-trash"></i> Deletar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL AGENDA -->

    <!-- SWIPER JS -->
    <script src="<?php echo $base_url ?>assets/utils/swiper/swiper.js"></script>

    <!--BOOTSTRAP JS-->
    <script src="<?= $base_url; ?>assets/utils/bootstrap/bootstrap.js"></script>

    <!-- SCRIPT AGENDA -->
    <script>
    function abrirModal() {
        document.getElementById('agendaModalLabel').textContent = 'Nova Agenda';
        document.getElementById('agendaForm').reset();
        document.getElementById('agendaId').value = '';
        document.getElementById('action').value = 'create';
        document.getElementById('btnDeletar').style.display = 'none';
        document.getElementById('btnSalvar').textContent = 'Salvar';
        document.getElementById('preview-programacao').style.display = 'none';
    }

    function updatePreview() {
        const programacao = document.getElementById('programacao').value;
        const previewDiv = document.getElementById('preview-programacao');
        const previewContent = document.getElementById('preview-content');
        
        if (programacao.trim() && programacao.includes(';')) {
            const items = programacao.split(';');
            let html = '';
            items.forEach(item => {
                if (item.trim()) {
                    html += `<div class="programacao-item">${item.trim()}</div>`;
                }
            });
            previewContent.innerHTML = html;
            previewDiv.style.display = 'block';
        } else {
            previewDiv.style.display = 'none';
        }
    }

    function editarAgenda(id) {
        fetch('./modulos-admin/contents/agenda/php/agenda-crud.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=get&id=' + id
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const agenda = data.data;
                document.getElementById('agendaModalLabel').textContent = 'Editar Agenda';
                document.getElementById('agendaId').value = agenda.id;
                document.getElementById('action').value = 'update';
                document.getElementById('titulo').value = agenda.titulo;
                document.getElementById('data').value = agenda.data;
                document.getElementById('hora').value = agenda.hora;
                document.getElementById('local_1').value = agenda.local_1;
                document.getElementById('local_2').value = agenda.local_2;
                document.getElementById('programacao').value = agenda.programacao;
                document.getElementById('btnDeletar').style.display = 'inline-block';
                document.getElementById('btnSalvar').textContent = 'Atualizar';
                
                updatePreview();
                
                const modal = new bootstrap.Modal(document.getElementById('agendaModal'));
                modal.show();
            } else {
                alert('Erro ao carregar dados da agenda');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao carregar dados da agenda');
        });
    }

    function deletarAgenda(id) {
        if (confirm('Tem certeza que deseja deletar esta agenda?')) {
            fetch('./modulos-admin/contents/agenda/php/agenda-crud.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=delete&id=' + id
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao deletar agenda');
            });
        }
    }

    function toggleRealizado(id, valor) {
        fetch('./modulos-admin/contents/agenda/php/agenda-crud.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=toggle_realizado&id=' + encodeURIComponent(id) + '&valor=' + encodeURIComponent(valor)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Simples e objetivo: recarrega para refletir mudanças
                location.reload();
            } else {
                alert(data.message || 'Não foi possível atualizar o status.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao atualizar status de realizado');
        });
    }

    function confirmarDelete() {
        const id = document.getElementById('agendaId').value;
        if (confirm('Tem certeza que deseja deletar esta agenda?')) {
            deletarAgenda(id);
            const modal = bootstrap.Modal.getInstance(document.getElementById('agendaModal'));
            modal.hide();
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Event listener para o formulário
        document.getElementById('agendaForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('./modulos-admin/contents/agenda/php/agenda-crud.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao salvar agenda');
            });
        });

        // Event listener para preview da programação
        document.getElementById('programacao').addEventListener('input', updatePreview);
    });
    </script>

</body>
</html>