<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
            \App\Models\User::factory(10)->create();
            \App\Models\User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        */
        $this->truncateTablas([
            'roles',
            'users',
            'countries',
            'states',
            'cities',
            'materials',
            'services',
            'associate_consultants',
            'type_works',
            'works',
        ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(MaterialsSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(AssociateConsultantsSeeder::class);
        $this->call(TypeWorkSeeder::class);
        $this->call(WorkSeeder::class);
    }

    protected function truncateTablas(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)-> truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
    }
}
