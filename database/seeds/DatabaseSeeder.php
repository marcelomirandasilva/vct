<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //$this->call(UserSeeder::class);
        //$this->call(BancoSeeder::class);
        //$this->call(ParceiroSeeder::class);
        //$this->call(ClienteSeeder::class);
        $this->call(ProdutoSeeder::class);
    }
}
