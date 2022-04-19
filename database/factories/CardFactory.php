<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{

    public function definition()
    {
        $status = [
            'rejected',
            'accepted',
            'not_checked'
        ];
        return [
            'card_number' => $this->faker->unique()->creditCardNumber(),
            'sheba_number' => $this->faker->unique()->creditCardNumber(),
            'status' => $status[rand(0,2)],
        ];
    }
}
