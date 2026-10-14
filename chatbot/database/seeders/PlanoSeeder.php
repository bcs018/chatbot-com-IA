<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plano;

class PlanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planos = [
            [
                'nome' => 'Free',
                'preco' => 0,
                'tokens_mensais' => 10000
            ],
            [
                'nome' => 'Max',
                'preco' => 49.90,
                'tokens_mensais' => 500000
            ],
            [
                'nome' => 'Golden',
                'preco' => 99.90,
                'tokens_mensais' => 2000000
            ],
        ];

        foreach ($planos as $plano)
        {
            Plano::updateOrCreate(
                ['nome' => $plano['nome']],
                $plano
            );   
        }
    }
}
