<?php

namespace Database\Seeders;

use App\Models\TypeWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_works = [
            [
                'name' => 'Construcción'
            ],
            [
                'name' => 'Estudios'
            ],
            [
                'name' => 'Supervisión'
            ],
        ];

        foreach ($type_works as $type_work) {
            TypeWork::insert($type_work);
        }
    }
}
