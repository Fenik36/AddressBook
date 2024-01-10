<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacts>
 */
class ContactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'FirstName' => $this->faker->firstName(),
            'MiddleName' => $this->faker->firstName(),
            'LastName' => $this->faker->lastName(),
            'PhoneNumbers' => $this->faker->phoneNumber(),            
            'tags' => 'laravel, api, backend',
            'company' => $this->faker->company(),
            'email' => $this->faker->safeEmail(),
            'location' => $this->faker->city(),
            'comment' => $this->faker->paragraph(5),
        ];
    }
}
