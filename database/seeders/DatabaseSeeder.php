<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Newuser;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Partner;
use App\Models\Contact;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        $this->call([
            NewuserSeeder::class
        ]);
        $this->call([
            CitiesSeeder::class
        ]);
        $this->call([
            LecturersSeeder::class
        ]);
        $this->call([
            SubscriberSeeder::class
        ]);
        $this->call([
            StudentSeeder::class
        ]);
        $this->call([
            PartnerSeeder::class
        ]);
        $this->call([
            ContactSeeder::class
        ]);
    }
}
