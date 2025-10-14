<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        // Contagem total
        $total = Task::count();

        // Contagem por status
        $pendentes = Task::where('status', 'pendente')->count();
        $andamento = Task::where('status', 'em andamento')->count();
        $concluidas = Task::where('status', 'concluída')->count();

        // Evita divisão por zero
        $porcentagens = $total > 0 ? [
            'pendente' => round(($pendentes / $total) * 100, 1),
            'em_andamento' => round(($andamento / $total) * 100, 1),
            'concluida' => round(($concluidas / $total) * 100, 1),
        ] : [
            'pendente' => 0,
            'em_andamento' => 0,
            'concluida' => 0,
        ];

        // Últimas 5 tarefas
        $recentes = Task::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard.index', compact('porcentagens', 'recentes', 'total'));
    }
}
