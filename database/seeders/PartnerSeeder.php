<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as FacadesFile;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = FacadesFile::get(path:'database/partners.json');
        $partners    =   collect(json_decode($json));
        $partners->each(function($partner){
            Partner::create([
                'name'=>$partner->name,
                'age'=>$partner->age,
                'gender'=>$partner->gender,
            ]);
        });
    }
}
