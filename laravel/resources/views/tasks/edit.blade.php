@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-warning text-dark rounded-top-4">
            <h4 class="mb-0 fw-bold">
                <i class="bi bi-pencil-square"></i> Editar Tarefa
            </h4>
        </div>

        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ops!</strong> Corrija os erros abaixo:<br><br>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Título</label>
                    <input type="text" name="title" value="{{ $task->title }}" class="form-control form-control-lg" id="title" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Descrição</label>
                    <textarea name="description" class="form-control" id="description" rows="4">{{ $task->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label fw-semibold">Status</label>
                    <select name="status" id="status" class="form-select form-select-lg">
                        <option value="pendente" {{ $task->status === 'pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="em andamento" {{ $task->status === 'em andamento' ? 'selected' : '' }}>Em andamento</option>
                        <option value="concluída" {{ $task->status === 'concluída' ? 'selected' : '' }}>Concluída</option>
                    </select>
                </div>

                <input type="hidden" name="created_by" value="{{ $task->created_by }}">

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                    <button type="submit" class="btn btn-warning text-dark px-5">
                        <i class="bi bi-save"></i> Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        background: #f8f9fa !important;
    }
    .form-control, .form-select {
        border-radius: 10px;
    }
    .card {
        border-radius: 20px;
    }
</style>
@endsection
