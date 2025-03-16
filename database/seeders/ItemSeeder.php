<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// add 20250316 ダミーテータ作成
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add 20250316 ダミーテータ作成
        DB::table('items')->insert([
            [
                'name' => 'カット',
                'memo' => 'カットの詳細',
                'price' => 6000,
            ],
            [
                'name' => 'カラー',
                'memo' => 'カットの詳細',
                'price' => 8000,
            ],            [
                'name' => 'パーマ（カット込み）',
                'memo' => 'カットの詳細',
                'price' => 13000,
            ],

        ]);
    }
}
