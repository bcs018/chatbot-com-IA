<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Assinatura;
use App\Models\Empresa;
use App\Models\Plano;
use Illuminate\Support\Carbon;

class AssinaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planoFree = Plano::where('nome', 'Gratuito')->firstOrFail();

        Empresa::query()->each(function ($empresa) use ($planoFree) {
            Assinatura::firstOrCreate(
                ['empresa_id' => $empresa->id],
                [
                    'plano_id' => $planoFree->id,
                    'status' => 'trial',
                    'inicio_em' => now(),
                    'fim_em' => Carbon::now()->addDays(14),
                ]
            );
        });
    }
}
