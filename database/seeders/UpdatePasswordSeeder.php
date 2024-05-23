<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = DB::table('user')->get();
    
        foreach ($users as $user) {
            DB::table('user')
                ->where('ID_user', $user->ID_user)
                ->update(['password' => Hash::make($user->password)]);
        }
    }
}
