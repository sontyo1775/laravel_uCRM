<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;
class InertiaTestContller extends Controller
{
    public function index(){
        return Inertia::render(component: 'Inertia/index');
    }
    // 20250312 add No21 パラメーター、マイグレーション

    public function show($id){
        // dd($id);
        return Inertia::render( 'Inertia/Show',
        [
            'id' => $id
        ]);
    }
    public function store(Request $request){
        // モデルのインスタンス化
        $inertiaTest = new InertiaTest();
        // dd($request->all());
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;

        $inertiaTest->save();

        // save後 inertia.indexに飛ばす
        return to_route('inertia.index');
    }
    // 20250312 add No21 パラメーター、マイグレーション

}
