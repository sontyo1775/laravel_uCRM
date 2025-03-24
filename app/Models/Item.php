<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;

    // add 20250316 Userモデルから引用(DB保存用)
    protected $fillable = [
        'name',
        'memo',
        'price',
        'is_selling',
    ];
    // 多対多 （商品と顧客）
    public function purchases(){
        return $this->belongsToMany(Purchase::class)->withPivot('quantity');
    }
}
