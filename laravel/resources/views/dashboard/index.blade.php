@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 900px;">

<a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary px-4 mb-3">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                    

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">📊 Dashboard</h4>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-card-checklist"></i> Ver Tarefas
        </a>
    </div>

    {{-- Cards pequenos de porcentagem --}}
    <div class="row g-3">
        <div class="col-4">
            <div class="card shadow-sm border-0 text-center py-2 bg-warning-subtle">
                <h6 class="fw-bold text-warning mb-0">Pendentes</h6>
                <p class="fs-5 mb-0">{{ $porcentagens['pendente'] }}%</p>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow-sm border-0 text-center py-2 bg-info-subtle">
                <h6 class="fw-bold text-info mb-0">Em Andamento</h6>
                <p class="fs-5 mb-0">{{ $porcentagens['em_andamento'] }}%</p>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow-sm border-0 text-center py-2 bg-success-subtle">
                <h6 class="fw-bold text-success mb-0">Concluídas</h6>
                <p class="fs-5 mb-0">{{ $porcentagens['concluida'] }}%</p>
            </div>
        </div>
    </div>

    {{-- Gráfico pequeno --}}
    <div class="card shadow-sm border-0 mt-3">
        <div class="card-body py-3">
            <h6 class="fw-bold mb-2">Distribuição das Tarefas</h6>
            <div style="max-width: 350px; margin: auto;">
                <canvas id="taskChart" height="150"></canvas>
            </div>
        </div>
    </div>

    {{-- Últimas tarefas resumidas --}}
    <div class="card shadow-sm border-0 mt-3">
        <div class="card-body py-3">
            <h6 class="fw-bold mb-2">🕒 Últimas 5 tarefas</h6>
            <ul class="list-group list-group-flush small">
                @forelse ($recentes as $task)
                    <li class="list-group-item d-flex justify-content-between align-items-center px-2 py-2">
                        <span>{{ Str::limit($task->title, 25) }}</span>
                        <span class="badge bg-{{ 
                            $task->status === 'pendente' ? 'warning' : 
                            ($task->status === 'em andamento' ? 'info' : 'success') 
                        }}">
                            {{ ucfirst($task->status) }}
                        </span>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted small">Nenhuma tarefa encontrada</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('taskChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Pendentes', 'Em andamento', 'Concluídas'],
            datasets: [{
                data: [
                    {{ $porcentagens['pendente'] }},
                    {{ $porcentagens['em_andamento'] }},
                    {{ $porcentagens['concluida'] }}
                ],
                backgroundColor: ['#f0ad4e', '#5bc0de', '#5cb85c'],
                borderWidth: 0
            }]
        },
        options: {
            cutout: '70%',
            plugins: { legend: { display: false } }
        }
    });
</script>
@endsection
