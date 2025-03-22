<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// Customer クラスを読み込み
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 1~ カスタムTBLのレコード文をランダムに使用する（リレーションのためのダミーデーター）
            'customer_id' => rand(1, Customer::count()),
            'status' => $this->faker->boolean,
        ];
    }
}
