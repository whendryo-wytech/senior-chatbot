<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition(): array
    {
        $language = [
            'PT_BR',
            'EN_US',
            'ES_ES',
            'CR_HA'
        ];

        return [
            'hcm_id' => random_int(3000, 9999),
            'name' => Str::upper(fake()->name()),
            'cpf' => random_int(11111111111, 99999999999),
            'birthdate' => Carbon::parse(
                random_int(Carbon::parse('1960-01-01')->unix(), Carbon::parse('2009-01-01')->unix())
            )->toDateTimeString(),
            'language' => $language[random_int(0, 3)]
        ];
    }
}
