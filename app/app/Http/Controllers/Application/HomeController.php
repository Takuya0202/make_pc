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
        $name = $request->input('name');
        $category = $request->input('category');
        $lowPrice = $request->input('lowPrice', 0);
        $highPrice = $request->input('highPrice', 300000);
        $sort = $request->input('sort');

        $query = Part::query()->with(['reviews','category']);

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

        // 並び替え　新着順
        if ($sort == 'created_desc') {
            $query->orderBy('created_at','desc');
        } //古い順
        elseif ($sort == 'created_asc') {
            $query->orderBy('created_at','asc');
        }
         //価格の高い順
        elseif ($sort == 'price_desc') {
            $query->orderBy('price','desc');
        } // 価格の安い順
        elseif ($sort == 'price_asc') {
            $query->orderBy('price','asc');
        } // レビューの高い順
        elseif ($sort == 'review_desc') {
            $query->withAvg('reviews','rating') // reviews_avg_ratingという名前で収納される
                ->orderBy('reviews_avg_rating','desc');
        } //レビューの低い順
        else{
            $query->withAvg('reviews','rating') // reviews_avg_ratingという名前で収納される
            ->orderBy('reviews_avg_rating','asc');
        }
        // 取得
        $searchedParts = $query->get();
        //　カテゴリ
        $categories = Category::all();

        return view('app/home',['parts' => $searchedParts,'categories' => $categories]);
    }
}
