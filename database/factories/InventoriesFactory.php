<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_barang' => $this->faker->sentence,
            'merk_barang' => $this->faker->sentence,
            'qty' => 1,
            'kondisi' => $this->faker->sentence,
        ];
    }
}
