<?php

namespace App\Http\Controllers\application;

use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Models\Review;
use Illuminate\Contracts\View\View as View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function showDetailView(string $id):View
    {
        $part = Part::with(['category','maker'])->findOrFail($id);
        $reviews = Review::with(['user'])->where('part_id',$id)->get();
        $rating = Review::where('part_id',$id)->avg('rating');
        // 小数第一位まで
        $rating = round($rating,1);

        return view('app/detail',compact(['part','reviews','rating',]));
    }

}
