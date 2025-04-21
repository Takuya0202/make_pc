<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Part;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHomeView():View
    {
        // パーツ情報を取得。検索がなければ全権取得
        $parts = session('searchedParts') ?? Part::with(['reviews',])->get();
        // カテゴリーを取得
        $categories = Category::all();
        return view('app.home',compact('parts','categories'));
    }

    public function search(Request $request) : RedirectResponse
    {
        //商品名検索
        $name = $request->name;
        $category = $request->category;
        $lowPrice = $request->lowPrice ?? 0;
        $highPrice = $request->highPrice ?? 300000;

        // なんも入力がないならhomeにリダイレクトする
        if (!$request->hasAny(['name','category','lowPrice','highPrice'])) {
            return redirect()->route('app.home');
        }

        $query = Part::query();

        // 商品名に対しての検索
        if (!empty($name)){
            $query->where('name','like','%' . $name . '%');
        }
        // カテゴリ検索
        if (!empty($category)){
            $query->where('category_id',$category);
        }
        // 価格帯検索
        $query->whereBetween('price',[$lowPrice,$highPrice]);
        // 取得
        $searchedParts = $query->with(['reviews','category'])
                        ->orderBy('category_id','asc')
                        ->get();

        return redirect()->route('app.home')->with('searchedParts',$searchedParts);
    }
}
