<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');//desactiva el proceso de claves foraneas
      DB::table('users')->truncate();//vacía la tabla
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');//reactiva el proceso

      DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password'=> bcrypt('password'),
        'type'=> 'admin'
      ]);
    }
}
