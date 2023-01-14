<?php

namespace Database\Seeders;

use App\Models\Associate_consultant;
use App\Models\Construction;
use App\Models\Service;
use App\Models\Study;
use App\Models\Supervision;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = [
            //study
            [
                'id' => 1,
                'name' => 'ESTUDIO A DISEÑO FINAL CAMINO CHACAPATA - CRUZ PATA',
                'city_id' => '30050',
                'user_id' => '3',
                'type_work_id' => '2',
                'name_contractor' => 'GOBIERNO AUTÓNOMO MUNICIPAL DE SANTIAGO DE HUATA',
                'address_contractor' => 'PLAZA PRINCIPAL SANTIAGO DE HUATA, PROVINCIA OMASUYOS,
                DEPARTAMENTO DE LA PAZ',
                'work_duration' => '3',
                'start_date' => '2021-06-01',
                'completion_date' => '2021-08-31',
                'value_approximate_services' => '140000',
                'description' => 'ESTUDIO A DISEÑO FINAL CAMINO CHACAPATA – CRUZ PATA',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //construction
            [
                'id' => 2,
                'name' => 'CONSTRUCCION BARRERA TRANSVERSAL RIO ACHOCALLA ENTRE CALLE 2 Y 3 ZONA MALLASA',
                'city_id' => '30000',
                'user_id' => '2',
                'type_work_id' => '1',
                'name_contractor' => 'GOBIERNO AUTÓNOMO MUNICIPAL DE LA PAZ',
                'address_contractor' => 'CALLE MERCADO N° 1298, EDIF. PALACIO CONSISTORIAL, ZONA CENTRO',
                'work_duration' => '3',
                'start_date' => '2021-09-01',
                'completion_date' => '2021-10-15',
                'value_approximate_services' => '189137',
                'description' => 'CONSTRUCCION BARRERA TRANSVERSAL RIO ACHOCALLA ENTRE CALLE 2 Y 3 ZONA MALLASA',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //supervision
            [
                'id' => 3,
                'name' => 'SUPERVISIÓN DEL PROYECTO MEJ. Y CONST. CARRET. CALAMARCA TOPOHOCO - V. PUCHUNI - HITO 15 (TRAMO I)',
                'city_id' => '30000',
                'user_id' => '4',
                'type_work_id' => '3',
                'name_contractor' => 'EMPRESA LOPEZ MIRANDA & ASOCIADOS S.R.L.',
                'address_contractor' => 'AV. ARCE N° 2355 - EDIFICIO COBIJA MEZANINE 2 - OF. 202',
                'work_duration' => '2',
                'start_date' => '2021-03-01',
                'completion_date' => '2021-04-30',
                'value_approximate_services' => '725000',
                'description' => 'SUPERVISIÓN DEL PROYECTO MEJ. Y CONST. CARRET. CALAMARCA TOPOHOCO - V. PUCHUNI - HITO 15 (TRAMO I)',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        foreach ($works as $work) {
            Work::insert($work);
        }

        $services = Service::all();
        $associate_consultants = Associate_consultant::all();

        /* Work::find(1)->each(function ($work) use ($services){
            $work->services()->attach(
                $services->only([15, 16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46, 47])->pluck('id')->toArray()
            );
        }); */
        Work::find(1)->services()->attach(
            $services->only([15, 16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46, 47])->pluck('id')->toArray()
        );
        Work::find(1)->associate_consultants()->attach(
            $associate_consultants->only([1,2])->pluck('id')->toArray()
        );
        $study = Work::find(1);
        if ($study->type_work_id === 2) {
            Study::create([
                'work_id'=> $study->id,
                'name' => $study->name
            ]);
        }

        Work::find(2)->services()->attach(
            $services->only([1,2,3,4,5,6,7,8,9,10,11,12,13,14])->pluck('id')->toArray()
        );
        Work::find(2)->associate_consultants()->attach(
            $associate_consultants->only([2])->pluck('id')->toArray()
        );
        $construction = Work::find(2);
        if ($construction->type_work_id === 1) {
            Construction::create([
                'work_id'=> $construction->id,
                'name' => $construction->name
            ]);
        }

        Work::find(3)->services()->attach(
            $services->only([48,49,50,51,52,53,54,55,56,57,58])->pluck('id')->toArray()
        );

        $supervision = Work::find(3);
        if ($supervision->type_work_id === 3) {
            Supervision::create([
                'work_id'=> $supervision->id,
                'name' => $supervision->name
            ]);
        }
    }
}
