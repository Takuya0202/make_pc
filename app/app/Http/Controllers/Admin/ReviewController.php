<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // 全レビュー表示
    public function showReviewsView():View
    {
        $reviews = Review::with(['part','user'])
                ->get();

        return view('admin/reviews/index',compact('reviews'));
    }

    // 特定のパーツのレビュー表示
    public function showPartReviewView(string $part_id):View
    {
        $reviews = Review::with(['part','user'])
                ->where('part_id',$part_id)
                ->get();

        return view('admin/reviews/part',compact('reviews'));
    }

    // 特定のユーザーのレビュー表示
    public function showUserReviewView(string $user_id):View
    {
        $reviews = Review::with(['part','user'])
                ->where('user_id',$user_id)
                ->get();
        // ユーザーのレビュー数
        $totalReviews = Review::where('user_id',$user_id)
                    ->count();
        // ユーザーも取得
        $user = User::findOrFail($user_id);

        return view('admin/reviews/user',compact(
            'reviews',
            'totalReviews',
            'user'
        ));
    }

    // レビューの詳細表示
    public function showReviewView(string $review_id):View
    {
        $review = Review::with(['part','user'])
                ->findOrFail($review_id);

        return view('admin/reviews/show',compact('review'));
    }
}
