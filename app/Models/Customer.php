<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    // 20250321 add 検索機能追加 No63
    public function scopeSearchCustomers($query, $input = null)
    {
        if(!empty($input)){
            if(Customer::where('kana', 'like', $input . '%' )
            ->orWhere('tel', 'like', $input . '%')->exists());

            return $query->where('kana', 'like', $input . '%' )
            ->orWhere('tel', 'like', $input . '%');

        }
    }
}
