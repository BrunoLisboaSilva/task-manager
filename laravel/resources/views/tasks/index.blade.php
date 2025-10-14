@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">
            <i class="bi bi-list-check text-primary"></i> Minhas Tarefas
        </h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Nova Tarefa
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($tasks->isEmpty())
        <div class="alert alert-warning text-center py-4 shadow-sm">
            <i class="bi bi-exclamation-triangle"></i> Nenhuma tarefa encontrada.<br>
            <a href="{{ route('tasks.create') }}" class="fw-bold">Crie uma agora!</a>
        </div>
    @else
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th style="width: 35%">Título</th>
                            <th style="width: 25%">Status</th>
                            <th style="width: 25%">Criado em</th>
                            <th class="text-end" style="width: 15%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr class="task-row">
                                <td class="fw-semibold">
                                    <i class="bi bi-check2-square text-primary"></i> {{ $task->title }}
                                </td>
                                <td>
                                    @switch($task->status)
                                        @case('concluída')
                                            <span class="badge bg-success px-3 py-2">
                                                <i class="bi bi-check-circle-fill"></i> {{ ucfirst($task->status) }}
                                            </span>
                                            @break
                                        @case('em andamento')
                                            <span class="badge bg-warning text-dark px-3 py-2">
                                                <i class="bi bi-hourglass-split"></i> {{ ucfirst($task->status) }}
                                            </span>
                                            @break
                                        @default
                                            <span class="badge bg-secondary px-3 py-2">
                                                <i class="bi bi-hourglass"></i> {{ ucfirst($task->status) }}
                                            </span>
                                    @endswitch
                                </td>
                                <td>{{ $task->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button
                                        class="btn btn-sm btn-outline-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        data-task-id="{{ $task->id }}"
                                        data-task-title="{{ $task->title }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-danger text-white rounded-top-4">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-exclamation-triangle-fill"></i> Confirmar exclusão
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Tem certeza que deseja excluir esta tarefa?</p>
                <p class="fw-bold text-danger" id="taskToDeleteTitle"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancelar</button>
                <form id="deleteTaskForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4">
                        <i class="bi bi-trash-fill"></i> Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script do Modal -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('confirmDeleteModal');
    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const taskId = button.getAttribute('data-task-id');
        const taskTitle = button.getAttribute('data-task-title');
        const form = document.getElementById('deleteTaskForm');
        const titleSpan = document.getElementById('taskToDeleteTitle');

        form.action = `/tasks/${taskId}`;
        titleSpan.textContent = `"${taskTitle}"`;
    });
});
</script>

<style>
    body {
        background: #f8f9fa !important;
    }

    .table tbody tr:hover {
        background-color: #f3f6ff;
        transition: 0.3s;
    }

    .card {
        border-radius: 20px;
    }

    .badge {
        font-size: 0.9rem;
    }
</style>
@endsection
