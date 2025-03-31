<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Customer;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// 20250331 add Async await 顧客情報取得 No82
Route::get('/searchCustomers', function (Request $request) {
    return Customer::searchCustomers($request->search)
            ->select('id', 'name', 'kana', 'tel')
            ->paginate(10);
})->middleware('auth:sanctum');
