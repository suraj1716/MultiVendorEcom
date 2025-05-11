<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\RolesEnum;
use App\Enums\VendorStatusEnum;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password'=>'Qwerty123'
        ])->assignRole(RolesEnum::User->value);

       $user= User::factory()->create([
            'name' => 'Vendor',
            'email' => 'vendor@gmail.com',
            'password'=>'Qwerty123'

       ]);
       $user->assignRole(RolesEnum::Vendor->value);
Vendor::factory()->create([
            'user_id'=>$user->id,
            'status'=>VendorStatusEnum::Approved,
            'store_name'=>'Vendor Store',
            'store_address'=>fake()->address(),

        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=>'Qwerty123'

        ])->assignRole(RolesEnum::Admin->value);
    }
}
