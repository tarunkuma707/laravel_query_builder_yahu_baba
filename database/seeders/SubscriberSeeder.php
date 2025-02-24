<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json           = File::get(path:'database/subscribers.json');
        $subscribers    =   collect(json_decode($json));
        $subscribers->each(function($subscriber){
            Subscriber::create([
                'name'=>$subscriber->name,
                'email'=>$subscriber->email,
                'age'=>$subscriber->age,
                'city'=>$subscriber->city,
            ]);
        });
    }
}
