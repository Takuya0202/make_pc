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
        // パーツ情報を取得。
        $parts = Part::with(['reviews',])->get();
        // カテゴリーを取得
        $categories = Category::all();
        return view('app.home',compact('parts','categories'));
    }

    public function search(Request $request) : View
    {
        //商品名検索
        $name = $request->name;
        $category = $request->category;
        $lowPrice = $request->lowPrice ?? 0;
        $highPrice = $request->highPrice ?? 300000;

        $query = Part::query();

        // 商品名に対しての検索
        if (!empty($name)){
            $query->where('name','like','%' . $name . '%');
        }
        // カテゴリ検索 allを除く
        if (!empty($category) && !($category == 'all')){
            $query->where('category_id',$category);
        }
        // 価格帯検索
        $query->whereBetween('price',[$lowPrice,$highPrice]);
        // 取得
        $searchedParts = $query->with(['reviews','category'])
                        ->orderBy('category_id','asc')
                        ->get();
        //　カテゴリ
        $categories = Category::all();

        return view('app/home',['parts' => $searchedParts,'categories' => $categories]);
    }
}
