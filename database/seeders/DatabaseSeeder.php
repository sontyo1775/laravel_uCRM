<?php

namespace Database\Seeders;

use App\Models\User;
// add 20250319 ダミーデータ1000件挿入
use App\Models\Customer;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
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
        // Purchase::factory(100)->create();


        // add 20250316 ItemSeeder No41
        $this->call([
            UserSeeder::class,
            // add 20250316 ItemSeeder No42 ダミーデータ
            ItemSeeder::class,
            // add 20250321 No68 顧客情報ダミーデータ
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // 中間TBLのため編集
        // Item モデルの全レコード取得
        $items = \App\Models\Item::all();
        // PurchaseTBLのレコードを100件作成
        Purchase::factory(100)->create()
        ->each(function(Purchase $purchase) use ($items){
            $purchase->items()->attach(
                $items->random(rand(1,3))->pluck('id')->toArray(),
                ['quantity' => rand(1,5)]
            );
        });
    }
}
