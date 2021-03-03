<?php

namespace Database\Seeders;

use App\Models\Contato;
use Illuminate\Database\Seeder;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new Contato();
        $model->fill([
            'nome' => 'felipe',
            'email' => 'felipe@gmail.com'
        ]);
        $model->save();
    }
}
