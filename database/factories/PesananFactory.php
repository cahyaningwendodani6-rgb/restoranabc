<?php

namespace Database\Factories;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesanan>
 */
class PesananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pesanan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'telp' => '08' . $this->faker->numerify('#-####-####'),
            'email' => $this->faker->safeEmail(),
            'alamat' => $this->faker->address(),
            'pesanan' => $this->faker->randomElement($menu),
            'metode_pembayaran' => $this->faker->randomElement(['Cash', 'Transfer', 'QRIS']),
            'catatan' => $this->faker->sentence(),
            'total_harga' => $this->faker->randomFloat(2, 100, 1000),
            'created_at' => $this->faker->dateTimeBetween('-1 weeks', 'now'),
        ];
    }
}
