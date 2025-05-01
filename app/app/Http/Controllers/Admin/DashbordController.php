<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Models\Review;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function showDashbordView():View
    {
        // 直近パーツ3件
        $recentParts = Part::with(['maker','category'])
                    ->orderBy('updated_at','desc')
                    ->limit(3)
                    ->get();
        // 直近レビュー3件
        $recentReviews = Review::with(['part','user'])
                    ->orderBy('created_at','desc')
                    ->limit(3)
                    ->get();
        // 総ユーザー数、パーツ数、レビュー数
        $totalParts = Part::count();
        $totalUsers = User::count();
        $totalReviews = Review::count();

        return view('admin/home',compact(
            'recentParts',
            'recentReviews',
            'totalParts',
            'totalUsers',
            'totalReviews'));
    }
}
