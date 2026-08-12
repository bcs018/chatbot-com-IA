<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /**
         * Cria a empresa e usuario ja fazendo o relacionamento
         */
        $empresa = Empresa::factory()
            ->has(User::factory()->state([
                'password' => Hash::make('12345'),
                'admin' => true
            ]))
            ->create();
    }
}
