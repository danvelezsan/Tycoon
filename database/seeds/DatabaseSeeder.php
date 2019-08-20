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
            'cedulaUsuario' => 1
        ]);
        DB::table('roles')->insert([
            'name' => "Administrador",
            'description' => "Administrador",
        ]);
        DB::table('roles')->insert([
            'name' => "MedicoGeneral",
            'description' => "MedicoGeneral",
        ]);
        DB::table('roles')->insert([
            'name' => "MedicoEspecialista",
            'description' => "MedicoEspecialista",
        ]);
        DB::table('roles')->insert([
            'name' => "Paciente",
            'description' => "Paciente",
        ]);
        DB::table('especialidads')->insert([
            'nombre' => "Cardiologia",
        ]);
        DB::table('especialidads')->insert([
            'nombre' => "Neurologia",
        ]);
        DB::table('especialidads')->insert([
            'nombre' => "Psiquiatria",
        ]);
        DB::table('especialidads')->insert([
            'nombre' => "Nefrologia",
        ]);
        DB::table('especialidads')->insert([
            'nombre' => "Urologia",
        ]);
        DB::table('especialidads')->insert([
            'nombre' => "Dermatologia",
        ]);
        DB::table('especialidads')->insert([
            'nombre' => "Alergologia",
        ]);
        DB::table('especialidads')->insert([
            'nombre' => "Gastroeneterologia",
        ]);
        DB::table('especialidads')->insert([
            'nombre' => "Neumologia",
        ]);
        DB::table('especialidads')->insert([
            'nombre' => "Reumatologia",
        ]);
        DB::table('universidads')->insert([
            'nombre' => "Universidad Pontificia Bolivariana",
        ]);
        DB::table('universidads')->insert([
            'nombre' => "Universidad de los Andes",
        ]);
        DB::table('universidads')->insert([
            'nombre' => "Universidad de Antioquia",
        ]);
        DB::table('universidads')->insert([
            'nombre' => "Universidad CES",
        ]);
        DB::table('universidads')->insert([
            'nombre' => "Universidad Pontificia Javeriana",
        ]);
        DB::table('universidads')->insert([
            'nombre' => "Universidad Nacional de Colombia",
        ]);
        DB::table('universidads')->insert([
            'nombre' => "Universidad Industrial de Santander",
        ]);
        DB::table('universidads')->insert([
            'nombre' => "Corporacion Universitaria Remington",
        ]);
        DB::table('universidads')->insert([
            'nombre' => "Universidad de la Sabana",
        ]);
        DB::table('universidads')->insert([
            'nombre' => "Universidad del Norte",
        ]);
    }
}
