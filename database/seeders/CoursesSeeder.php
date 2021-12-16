<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Courses;


class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $Curso1=Courses::create([
                'name' => 'Desarrollo web',
                'description' => 'Desarrolla aplicaciones web facilmente',
                'date_start' => '2021-10-11',
                'date_end' => '2022-10-11',
                'active' => '1',
            ]);

            $Curso2=Courses::create([
                'name' => 'Desarrollo Aplicaciones web',
                'description' => 'Crea aplicaciones web facilmente',
                'date_start' => '2021-10-11',
                'date_end' => '2022-10-11',
                'active' => '1',
            ]);


    }
}


