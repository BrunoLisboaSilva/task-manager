<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    public function run($userId = 1): void
    {

        log::info('Rodando TaskSeeder...');
        DB::table('tasks')->insert([
            [
                'title' => 'Estudar Laravel',
                'description' => 'Aprender a criar APIs com Laravel e Eloquent.',
                'status' => 'pendente',
                'created_by' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gravar vídeo pro canal',
                'description' => 'Gravar o episódio sobre como criar um gerenciador de tarefas.',
                'status' => 'em andamento',
                'created_by' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Editar roteiro',
                'description' => 'Finalizar o roteiro do próximo vídeo de curiosidades.',
                'status' => 'concluída',
                'created_by' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
