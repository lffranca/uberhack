<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ModalSeeder::class);

         \App\Models\User::create([
             'name' => 'João da Silva',
             'email' => 'joao@gmail.com',
             'password' => bcrypt('123456'),
             'cpf'=> '12345678912',
         ]);
    }
}
