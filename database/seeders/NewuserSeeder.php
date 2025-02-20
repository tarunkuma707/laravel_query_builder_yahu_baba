<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Newuser;
use Illuminate\Support\Facades\File;

class NewuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = File::get(path:'database/newusers.json');
        $users    =   collect(json_decode($json));
        $users->each(function($user){
            Newuser::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'age'=>$user->age,
                'city'=>$user->city,
            ]);
        });
    }
}
