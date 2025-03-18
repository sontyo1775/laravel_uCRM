<?php

namespace Database\Seeders;

use App\Models\User;
// add 20250319 ダミーデータ1000件挿入
use App\Models\Customer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // add 20250319 ダミーデータ1000件挿入
        Customer::factory(1000)->create();

        // add 20250316 ItemSeeder No41
        $this->call([
            UserSeeder::class,
            // add 20250316 ItemSeeder No42 ダミーデータ
            ItemSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
