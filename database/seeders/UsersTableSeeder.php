<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@mail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('admin123'),
            ],
        ];
        
        try {
            foreach ($data as $key => $value) {
                $check = User::where('email', '=', $value['email'])->first();
                if ($check == null) {
                    User::firstOrCreate($value);
                }
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
