<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class LecturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = File::get(path:'database/lecturers.json');
        $lecturers    =   collect(json_decode($json));
        $lecturers->each(function($lecturer){
            Lecturer::create([
                'name'=>$lecturer->name,
                'email'=>$lecturer->email,
                'age'=>$lecturer->age,
                'city'=>$lecturer->city,
            ]);
        });
    }
}
