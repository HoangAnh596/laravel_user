<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgPath = $this->faker->image(storage_path('app/public/uploads/users'), $width = 640, $height = 480, 'cats', false);
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'image' => "uploads/users/" . $imgPath,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            //'remember_token' => Str::random(10),
        ];
    }

}
