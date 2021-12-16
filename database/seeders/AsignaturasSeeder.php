<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asignatura;

class AsignaturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Asignatura1=Asignatura::create([
            'id_teacher' => 1,
		    'id_course' => 1,
		    'id_shedule' => 1,
		    'name' => 'matematicas',
		    'color' => 'rojo',
            ]);

            $Asignatura2=Asignatura::create([
                'id_teacher' => 3,
                'id_course' => 2,
                'id_shedule' => 2,
                'name' => 'Programacion',
                'color' => 'verde',
                ]);

                $Asignatura3=Asignatura::create([
                    'id_teacher' => 3,
                    'id_course' => 1,
                    'id_shedule' => 2,
                    'name' => 'Manualidades',
                    'color' => 'verde',
                    ]);

    }
}
