<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\ReviewRequest;
use App\Models\Part;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function showReviewView(string $id):View
    {
        $part = Part::findOrFail($id);

        return view('app/review',compact('part'));
    }

    public function review(string $id,ReviewRequest $request):RedirectResponse
    {
        $review = Review::create([
            'body' => $request->body,
            'rating' => $request->rating,
            'part_id' => $id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('app.detail',['id' => $id]);
    }
}
