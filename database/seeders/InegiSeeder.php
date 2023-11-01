<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inegi;
use Illuminate\Support\Facades\Http;

class InegiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inegi::truncate();

        $data = Http::get("https://gaia.inegi.org.mx/wscatgeo/mgee/")->json();

        dd($data);

        foreach ($data["datos"] as $key => $value) {

            Inegi::create([
                'cvegeo'    => $value['cvegeo'],
                'cve_agee'  => $value['cve_agee'],
                'nom_agee'  => $value['nom_agee'],
                'nom_abrev' => $value['nom_abrev'],
                'pob'       => $value['pob'],
                'pob_fem'   => $value['pob_fem'],
                'pob_mas'   => $value['pob_mas'],
                'viv'       => $value['viv']
            ]);

        }
    }
}
