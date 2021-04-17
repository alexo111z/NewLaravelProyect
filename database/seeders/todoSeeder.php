<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\todo;

class todoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(todo::class)->times(10)->create();
        /*
        factory(todo::class)->create([
            'ejemp' => 2,
        ]);
        */
    }
}
