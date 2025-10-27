<?php
use Models\Agenda;

$agendas = Agenda::orderBy('data', 'desc')->get();
?>

<style>
.agenda-item {
    border-left: 4px solid #007bff;
    transition: all 0.3s ease;
}

.agenda-item:hover {
    border-left-color: #0056b3;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.agenda-item.realizado {
    border-left-color: #28a745;
    background: #f6fffa;
}

.badge-realizado {
    background: #28a745;
}

.programacao-item {
    background: #f8f9fa;
    padding: 5px 10px;
    margin: 2px 0;
    border-radius: 4px;
    border-left: 2px solid #007bff;
}

#preview-programacao {
    background: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #dee2e6;
}

#preview-programacao .programacao-item {
    background: #e9ecef;
    font-size: 0.9em;
}
</style>

<section>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="mb-0 small">Sessão destinada para <strong>Agenda</strong></p>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#agendaModal" onclick="abrirModal()">
            <i class="fas fa-plus"></i> Nova Agenda
        </button>
    </div>

    <!-- Lista de Agendas -->
    <div class="accordion" id="accordionAgenda">
        <?php if($agendas->count() > 0): ?>
            <?php foreach($agendas as $index => $agenda): ?>
                <div class="accordion-item agenda-item <?= ($agenda->realizado ? 'realizado' : '') ?>">
                    <h2 class="accordion-header" id="heading<?= $agenda->id ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $agenda->id ?>" aria-expanded="false" aria-controls="collapse<?= $agenda->id ?>">
                            <div class="w-100 d-flex justify-content-between align-items-center me-3">
                                <div>
                                    <strong><?= $agenda->titulo ?></strong>
                                    <?php if($agenda->realizado): ?>
                                        <span class="badge badge-realizado ms-2"><i class="fas fa-check"></i> Realizado</span>
                                    <?php endif; ?>
                                    <small class="text-muted ms-2"><?= date('d/m/Y', strtotime($agenda->data)) ?></small>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted"><?= $agenda->hora ?></small>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapse<?= $agenda->id ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $agenda->id ?>" data-bs-parent="#accordionAgenda">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Local:</strong> <?= $agenda->local_1 ?></p>
                                    <?php if($agenda->local_2): ?>
                                        <p><strong>Detalhes:</strong> <?= $agenda->local_2 ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Hora:</strong> <?= $agenda->hora ?></p>
                                    <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($agenda->data)) ?></p>
                                </div>
                            </div>
                            
                            <?php if($agenda->programacao): ?>
                                <div class="mt-3">
                                    <strong>Programação:</strong>
                                    <div class="mt-2">
                                        <?php 
                                        // Separar por ; se existir, senão por \n (compatibilidade com dados antigos)
                                        $programacao = strpos($agenda->programacao, ';') !== false ? 
                                            explode(";", $agenda->programacao) : 
                                            explode("\n", $agenda->programacao);
                                        foreach($programacao as $item):
                                            if(trim($item)):
                                        ?>
                                            <div class="programacao-item"><?= trim($item) ?></div>
                                        <?php 
                                            endif;
                                        endforeach; 
                                        ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div class="mt-3 d-flex gap-2">
                                <button type="button" class="btn btn-sm <?= $agenda->realizado ? 'btn-outline-secondary' : 'btn-success' ?>" onclick="toggleRealizado(<?= $agenda->id ?>, <?= $agenda->realizado ? '0' : '1' ?>)">
                                    <?php if($agenda->realizado): ?>
                                        <i class="fas fa-undo"></i> Desmarcar realizado
                                    <?php else: ?>
                                        <i class="fas fa-check"></i> Marcar realizado
                                    <?php endif; ?>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm" onclick="editarAgenda(<?= $agenda->id ?>)">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deletarAgenda(<?= $agenda->id ?>)">
                                    <i class="fas fa-trash"></i> Deletar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> Nenhuma agenda cadastrada ainda.
            </div>
        <?php endif; ?>
</section>