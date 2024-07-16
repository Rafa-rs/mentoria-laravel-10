<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome' => 'Company xyz',
            'email' => 'company@gmail.com',
            'endereco' => 'Amauri Junior',
            'logradouro' => 'rua',
            'cep' => '94170280',
            'bairro' => 'Nova Villa',
        ]);

        Cliente::create([
            'nome' => 'Company kgb',
            'email' => 'company_kgb@gmail.com',
            'endereco' => 'Amauri Vhihher',
            'logradouro' => 'rua',
            'cep' => '94170250',
            'bairro' => 'Nova Rota',
        ]);
    }
}
