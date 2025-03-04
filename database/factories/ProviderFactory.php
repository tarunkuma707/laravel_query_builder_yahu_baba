<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Provider;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProviderFactory extends Factory
{
    use HasFactory;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_name' =>  fake()->name(),
            'email'     =>  fake()->unique()->email(),
            'salary'    =>  fake()->randomNumber(4,true),
            'dob'       =>  fake()->date(),
            'password'  =>  Str::random(10),
        ];
    }
}
