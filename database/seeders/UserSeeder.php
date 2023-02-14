<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = ['daniel@gmail.com'];
        $role2 = ['constructor@gmail.com'];
        $role3 = ['estudios@gmail.com'];
        $role4 = ['supervisor@gmail.com'];
        $anybody = ['anybody@gmail.com'];
        $password = '123123123';
        foreach($role1 as $key => $value){
            User::create([
                'name' => 'Daniel Moya',
                'username' => 'Daniel',
                'email' => $value,
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'phone' => '75654321',
                'address' => 'La Paz, Bolivia',
                'is_active' => '1',
                'city_id' => 30001,
                'password' => Hash::make($password),
            ])->assignRole('Director General');//el nombre del rol
        }
        foreach($role2 as $key => $value){
            User::create([
                'name' => 'Brayan Moya',
                'username' => 'Brayan',
                'email' => $value,
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'phone' => '65498712',
                'address' => 'Cochabamba, Bolivia',
                'is_active' => '1',
                'city_id' => 30100,
                'password' => Hash::make($password),
            ])->assignRole('Construcción');//el nombre del rol
        }
        foreach($role3 as $key => $value){
            User::create([
                'name' => 'Jose Luis',
                'username' => 'Jose',
                'email' => $value,
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'phone' => '78945612',
                'address' => 'Chuquisaca, Bolivia',
                'is_active' => '1',
                'city_id' => 30150,
                'password' => Hash::make($password),
            ])->assignRole('Estudios');//el nombre del rol
        }
        foreach($role4 as $key => $value){
            User::create([
                'name' => 'Alberto González',
                'username' => 'Alberto',
                'email' => $value,
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'phone' => '74561328',
                'address' => 'Tarija, Bolivia',
                'is_active' => '1',
                'city_id' => 30200,
                'password' => Hash::make($password),
            ])->assignRole('Supervisión');//el nombre del rol
        }
        foreach($anybody as $key => $value){
            User::create([
                'name' => 'Miguel Ángel',
                'username' => 'Miguel',
                'email' => $value,
                // 'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'phone' => '71258963',
                'address' => 'Beni, Bolivia',
                'is_active' => '0',
                'city_id' => 30056,
                'password' => Hash::make($password),
            ])->assignRole('Estudios');
        }

        User::factory()->count(100)->create();
    }
}
