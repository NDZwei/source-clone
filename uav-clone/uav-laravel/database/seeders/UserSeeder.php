<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Role;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('persons')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $role = Role::where('name', 'ROLE_ADMIN')->first();
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            $user = User::create([
                'email' => 'admin@gmail.com',
                'password' => '123456',
                'email_verified_at' => new DateTime(),
                'is_active' => true,
            ]);

            Person::create([
                'user_id' => $user->id,
                'administrative_unit_id' => null,
                'display_name' => 'Nguyen Duc',
                'birthdate' => '2001-09-20',
                'phone_number' => '0123456789',
                'address_detail' => 'Xuân Đỉnh, Bắc Từ Liêm, Hà Nội',
            ]);

            $user->roles()->detach();
            $user->roles()->attach($role);
        }
    }
}
