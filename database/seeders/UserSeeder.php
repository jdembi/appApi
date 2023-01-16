<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('users')->insert(
          [
              'name' => 'Administrador',
              'email' => 'admin@admin.com',
              'nivel' => 'Administrador',
              'password' => Hash::make('123456789')
            ],
          [
              'name' => 'Gestor',
              'email' => 'gestor@gestor.com',
              'nivel' => 'Gestor',
              'password' => Hash::make('123456789')],
      );
    }
}
