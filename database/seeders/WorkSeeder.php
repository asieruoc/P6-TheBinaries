<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $work1 = Work::create([
            'id_class' => '1',
            'id_student' => '2',
            'name' => 'Treball de recerca',
            'mark' => '10',

        ]);

        $work2 = Work::create([
            'id_class' => '3',
            'id_student' => '2',
            'name' => 'Trabajo de recuperación',
            'mark' => '5',

        ]);
    }
}
