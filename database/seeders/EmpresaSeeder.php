<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    public function run(): void
    {
        $empresas = [
            ['nombre' => 'Luz del Sur',    'ruc' => '20100012345', 'telefono' => '017111234'],
            ['nombre' => 'Sedapal',        'ruc' => '20123456789', 'telefono' => '017151515'],
            ['nombre' => 'Claro',          'ruc' => '20441122334', 'telefono' => '080000123'],
            ['nombre' => 'Movistar',       'ruc' => '20156789123', 'telefono' => '080011123'],
            ['nombre' => 'Entel',          'ruc' => '20555566677', 'telefono' => '080050505'],
            ['nombre' => 'Netflix',        'ruc' => '00000000001', 'telefono' => null],
            ['nombre' => 'Spotify',        'ruc' => '00000000002', 'telefono' => null],
            ['nombre' => 'Amazon Prime',   'ruc' => '00000000003', 'telefono' => null],
            ['nombre' => 'Visa',           'ruc' => '00000000004', 'telefono' => null],
            ['nombre' => 'Mastercard',     'ruc' => '00000000005', 'telefono' => null],
            ['nombre' => 'BBVA',           'ruc' => '20100099991', 'telefono' => null],
            ['nombre' => 'BCP',            'ruc' => '20100047218', 'telefono' => null],
            ['nombre' => 'Interbank',      'ruc' => '20100053417', 'telefono' => null],
            ['nombre' => 'Caja Arequipa',  'ruc' => '20131313131', 'telefono' => null],
        ];

        foreach ($empresas as $e) {
            Empresa::firstOrCreate(['ruc' => $e['ruc']], $e);
        }
    }
}
