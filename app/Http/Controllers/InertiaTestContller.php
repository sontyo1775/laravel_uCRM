<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;
class InertiaTestContller extends Controller
{
    public function index(){
        // 202515 add TBL内容をリスト表示
        return Inertia::render('Inertia/index',[
            'blogs' => InertiaTest::all()
        // 202515 add TBL内容をリスト表示
        ]);
    }
    // 20250313 add No24 フォーム作成
    public function create(){
        return Inertia::render(component: 'Inertia/Create');
    }
    // 20250313 add No24 フォーム作成
    // 20250312 add No21 パラメーター、マイグレーション
    public function show($id){
        // dd($id);
        return Inertia::render( 'Inertia/Show',
        [
            'id' => $id,
            // id を取得
            'blog' => InertiaTest::findOrFail($id)
        ]);
    }
    public function store(Request $request){

        // add 20250314 No26 バリデーション追加
        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required']
        ]);
        // add 20250314 No26 バリデーション追加

        // モデルのインスタンス化
        $inertiaTest = new InertiaTest();
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        // save後 inertia.indexに飛ばす
        return to_route('inertia.index')
        // // 20250315 add No28 フラッシュメッセージ
        ->with(['message' => '登録しました。']);
        // // 20250315 add No28 フラッシュメッセージ

    }
    // 20250312 add No21 パラメーター、マイグレーション

    public function delete($id){

        $book = InertiaTest::findOrFail($id);
        $book->delete();

        return to_route('inertia.index')
        ->with(['message' => '削除しました。']);
    }


}
