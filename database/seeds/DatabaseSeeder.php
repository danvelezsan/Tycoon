<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'cedula' => 1,
            'nombre' => "Admin",
            'password' => bcrypt(12345678),
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
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1
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
        DB::table('pacientes')->insert([
            'cedula' => 2,
            'nombre' => "Paciento",
            'apellidos' => "App",
            'fecha_nacimiento' => Carbon::parse('2000-01-01'),
            'genero' => "Masculino",
        ]);
        DB::table('medico_generals')->insert([
            'cedula' => 3,
            'nombre' => "Dr Papitas",
            'apellidos' => "App",
            'fecha_nacimiento' => Carbon::parse('2000-01-01'),
            'genero' => "Masculino",
            'tarjeta_profesional' => "3",
            'universidad' => 'Universidad Pontificia Javeriana',
        ]);
        DB::table('medico_especialistas')->insert([
            'cedula' => 4,
            'nombre' => "Taladromuelas",
            'apellidos' => "App",
            'fecha_nacimiento' => Carbon::parse('2000-01-01'),
            'genero' => "Masculino",
            'tarjeta_profesional' => "3",
            'dirConsultorio' => 'calle 1',
            'especialidad' => 'Psiquiatria',
            'universidad' => 'Universidad de Antioquia',
        ]);
        DB::table('users')->insert([
            'cedula' => 2,
            'nombre' => "Paciento",
            'password' => bcrypt(12345678),
        ]);
        DB::table('users')->insert([
            'cedula' => 3,
            'nombre' => "Dr Papitas",
            'password' => bcrypt(12345678),
        ]);
        DB::table('users')->insert([
            'cedula' => 4,
            'nombre' => "Taladromuelas",
            'password' => bcrypt(12345678),
        ]);
        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 2
        ]);
        DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => 3
        ]);
        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 4
        ]);
    }
}
