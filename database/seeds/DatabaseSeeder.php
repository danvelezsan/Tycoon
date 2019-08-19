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
        DB::table('users')->insert([
            'cedula' => 2,
            'name' => "Admin",
            'password' => bcrypt(12345678),
        ]);
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);
        DB::table('roles')->insert([
            'id' => 1,
            'name' => "Administrador",
            'description' => "Administrador",
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => "MedicoGeneral",
            'description' => "MedicoGeneral",
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name' => "MedicoEspecialista",
            'description' => "MedicoEspecialista",
        ]);
        DB::table('roles')->insert([
            'id' => 4,
            'name' => "Paciente",
            'description' => "Paciente",
        ]);
        DB::table('especialidads')->insert([
            'codigo' => 1,
            'nombre' => "Cardiologia",
        ]);
        DB::table('especialidads')->insert([
            'codigo' => 2,
            'nombre' => "Neurologia",
        ]);
        DB::table('especialidads')->insert([
            'codigo' => 3,
            'nombre' => "Psiquiatria",
        ]);
        DB::table('especialidads')->insert([
            'codigo' => 4,
            'nombre' => "Nefrologia",
        ]);
        DB::table('especialidads')->insert([
            'codigo' => 5,
            'nombre' => "Urologia",
        ]);
        DB::table('especialidads')->insert([
            'codigo' => 6,
            'nombre' => "Dermatologia",
        ]);
        DB::table('especialidads')->insert([
            'codigo' => 7,
            'nombre' => "Alergologia",
        ]);
        DB::table('especialidads')->insert([
            'codigo' => 8,
            'nombre' => "Gastroeneterologia",
        ]);
        DB::table('especialidads')->insert([
            'codigo' => 9,
            'nombre' => "Neumologia",
        ]);
        DB::table('especialidads')->insert([
            'codigo' => 10,
            'nombre' => "Reumatologia",
        ]);
        DB::table('universidads')->insert([
            'codigo' => 1,
            'nombre' => "Universidad Pontificia Bolivariana",
        ]);
        DB::table('universidads')->insert([
            'codigo' => 2,
            'nombre' => "Universidad de los Andes",
        ]);
        DB::table('universidads')->insert([
            'codigo' => 3,
            'nombre' => "Universidad de Antioquia",
        ]);
        DB::table('universidads')->insert([
            'codigo' => 4,
            'nombre' => "Universidad CES",
        ]);
        DB::table('universidads')->insert([
            'codigo' => 5,
            'nombre' => "Universidad Pontificia Javeriana",
        ]);
        DB::table('universidads')->insert([
            'codigo' => 6,
            'nombre' => "Universidad Nacional de Colombia",
        ]);
        DB::table('universidads')->insert([
            'codigo' => 7,
            'nombre' => "Universidad Industrial de Santander",
        ]);
        DB::table('universidads')->insert([
            'codigo' => 8,
            'nombre' => "Corporacion Universitaria Remington",
        ]);
        DB::table('universidads')->insert([
            'codigo' => 9,
            'nombre' => "Universidad de la Sabana",
        ]);
        DB::table('universidads')->insert([
            'codigo' => 10,
            'nombre' => "Universidad del Norte",
        ]);
    }
}
