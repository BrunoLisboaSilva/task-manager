@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <h4 class="mb-0 fw-bold">
                <i class="bi bi-plus-circle"></i> Criar Nova Tarefa
            </h4>
        </div>

        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ops!</strong> Há alguns problemas com os dados inseridos:<br><br>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tasks.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Título</label>
                    <input type="text" name="title" class="form-control form-control-lg" id="title" placeholder="Ex: Verificar rotas do projeto..." required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Descrição</label>
                    <textarea name="description" class="form-control" id="description" rows="4" placeholder="Descreva brevemente a tarefa..."></textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label fw-semibold">Status</label>
                    <select name="status" id="status" class="form-select form-select-lg">
                        <option value="pendente">Pendente</option>
                        <option value="em andamento">Em andamento</option>
                        <option value="concluída">Concluída</option>
                    </select>
                </div>

                <input type="hidden" name="created_by" value="1">

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                    <button type="submit" class="btn btn-primary px-5">
                        <i class="bi bi-check-lg"></i> Salvar Tarefa
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
