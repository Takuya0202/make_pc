<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Models\Review;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // 全レビュー表示
    public function showReviewsView():View
    {
        $reviews = Review::with(['part','user'])
                ->orderBy('created_at' , 'desc')
                ->get();

        return view('admin/reviews/index',compact('reviews'));
    }

    // 特定のパーツのレビュー表示
    public function showPartReviewView(string $part_id):View
    {
        $reviews = Review::with(['part','user'])
                ->where('part_id',$part_id)
                ->get();

        // パーツのレビュー数
        $totalReviews = Review::where('part_id',$part_id)
                    ->count();

        // パーツも取得
        $part = Part::findOrFail($part_id);

        return view('admin/reviews/part',compact(
            'reviews',
            'totalReviews',
            'part'
        ));
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

    // レビュー削除の確認表示
    public function showDeleteView(string $review_id):View
    {
        $review = Review::with(['part','user'])
                ->findOrFail($review_id);

        return view('admin/reviews/delete',compact('review'));
    }

    // レビュー削除
    public function delete(string $review_id):RedirectResponse
    {
        $review = Review::findOrFail($review_id);
        $review->delete();

        return redirect()->route('admin.reviews.index');
    }

    // レビューの検索
    public function search(Request $request):View
    {
        $sort = $request->input('sort');
        $query = Review::query();

        // ソート、新しい順
        if ($sort == 'created_desc') {
            $query->orderBy('created_at' , 'desc');
        } // レビューの高い順
        elseif ($sort == 'rating_desc') {
            $query->orderBy('rating' , 'desc');
        } // レビューの低い順
        else{
            $query->orderBy('rating' , 'asc');
        }

        // 取得
        $reviews = $query->get();

        return view('admin/reviews/index',compact('reviews'));
    }
}
