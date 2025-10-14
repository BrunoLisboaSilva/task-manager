<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class WebTaskController extends Controller
{
   public function index(Request $request)
{
    $status = $request->get('status');
    $search = $request->get('search');

    $tasks = Task::query()
        ->when($status, function ($query, $status) {
            return $query->where('status', $status);
        })
        ->when($search, function ($query, $search) {
            return $query->where(function ($subQuery) use ($search) {
                $subQuery->where('title', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%");
            });
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->appends(['status' => $status, 'search' => $search]);

    return view('tasks.index', compact('tasks', 'status', 'search'));
}




    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pendente,em andamento,concluída',
            'created_by' => 'required|integer'
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarefa removida!');
    }
}
