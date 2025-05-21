<?php

namespace App\Http\Controllers\application;

use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Models\PcList;
use App\Models\Review;
use Illuminate\Contracts\View\View as View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function showDetailView(string $part_id):View
    {
        $part = Part::with(['category','maker'])->findOrFail($part_id);
        $reviews = Review::with(['user'])->where('part_id',$part_id)->get();
        $rating = Review::where('part_id',$part_id)->avg('rating') ?? 0;
        // 小数第一位まで
        $rating = round($rating,1);

        $pcLists = collect();

        // pclistのid取得 ログイン済みのみ
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $pcLists = PcList::where('user_id',$user_id)->get();
        }
        return view('app/detail',compact(['part','reviews','rating','pcLists']));
    }
}
