<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Purchase extends Model
{
    /** @use HasFactory<\Database\Factories\PurchaseFactory> */
    use HasFactory;
     // 20250321 add No68 購入画面のダミー作成
    protected $fillable = [
        'customer_id',
        'status',
    ];

    // 単数
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
