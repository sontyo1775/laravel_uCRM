<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
// 20250316 add ダミーデーター No41
use Inertia\Inertia;

use function Laravel\Prompts\select;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 20250316 add No43 条件を絞ってItemTBLから取得
        $items = Item::select('id','name','price','is_selling')->get();

        // return Inertia::render('Items/Index');
        return Inertia::render('Items/Index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Items/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        Item::create([
            'name' => $request->name,
            'memo' => $request->memo,
            'price' => $request->price,
        ]);

        // itemsで作られたコントローラーの index
        return to_route('items.index')
        ->with([
            'message' => '登録しました。',
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        // dd($item);
        return inertia::render('Items/Show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return inertia::render('Items/Edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        // dd($request->name);
        // $item TBL内容、　$request POST内容
        $item->name = $request->name;
        $item->memo = $request->memo;
        $item->price = $request->price;
        $item->is_selling = $request->is_selling;
        $item->save();

        return to_route('items.index')
        ->with([
            'message' => '更新しました。',
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return to_route('items.index')
        ->with([
            'message' => '削除しました。',
            'status' => 'danger',
        ]);
    }
}
