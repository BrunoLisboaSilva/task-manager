<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;

use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Log::info('Rodando DatabaseSeeder...');

        // Limpa as tabelas para garantir um ambiente limpo
        DB::table('tasks')->truncate();
        DB::table('users')->truncate();

        // Cria alguns usuários
        $users = User::factory()->count(3)->create();

        // Cria algumas tarefas
        foreach ($users as $user) {
            Task::factory()->count(3)->create([
                'created_by' => $user->id,
            ]);
        }

        Log::info('Seed finalizado!');
    }
}
