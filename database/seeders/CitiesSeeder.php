<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cities;
use Illuminate\Support\Facades\File;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = File::get(path:'database/cities.json');
        $cities    =   collect(json_decode($json));
        $cities->each(function($city){
            Cities::create([
                'city_name'=>$city->city_name
            ]);
        });
    }
}
