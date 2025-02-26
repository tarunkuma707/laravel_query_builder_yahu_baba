<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker\Core\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as FacadesFile;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = FacadesFile::get(path:'database/students.json');
        $students    =   collect(json_decode($json));
        $students->each(function($student){
            Student::create([
                'name'=>$student->name,
                'age'=>$student->age,
                'city'=>$student->city,
            ]);
        });
    }
}
