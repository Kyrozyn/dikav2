<?php

namespace Database\Factories;

use App\Models\pengiriman;
use Illuminate\Database\Eloquent\Factories\Factory;

class pengirimanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = pengiriman::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no_resi' => $this->faker->ean8,
            'nama_pengirim' => $this->faker->name,
            'nama_penerima' => $this->faker->name,
            'alamat' => $this->faker->address,
            'no_telp_pengirim' => $this->faker->e164PhoneNumber,
            'no_telp_penerima' => $this->faker->e164PhoneNumber,
            'tgl_masuk' => $this->faker->date(),
            'deskripsi' => $this->faker->sentence(2),
            'berat' => $this->faker->numberBetween(1,20),
            'lebar' => $this->faker->numberBetween(1,20),
            'panjang' => $this->faker->numberBetween(1,20),
            'tinggi' => $this->faker->numberBetween(1,20),
            'harga' => $this->faker->numberBetween(50000,150000),
            'status' => $this->faker->randomElement(['Dikirim','Terkirim','Pending']),
        ];
    }
}
