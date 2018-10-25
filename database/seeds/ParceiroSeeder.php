<?php

use Illuminate\Database\Seeder;

class ParceiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Parceiro::class, 500)->create();
    }
}
