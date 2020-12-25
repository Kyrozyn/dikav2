<?php

namespace Database\Factories;

use App\Models\kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class kendaraanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = kendaraan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_kendaraan' => $this->faker->name,
            'kapasitas' => $this->faker->numberBetween(500,2000),
            'lebar' => $this->faker->numberBetween(100,500),
            'panjang' => $this->faker->numberBetween(100,500),
            'tinggi' => $this->faker->numberBetween(100,500),
            'plat_kendaraan' => 'X '.$this->faker->firstName.' XXX',
            'status' => 'Tersedia',
        ];
    }
}
